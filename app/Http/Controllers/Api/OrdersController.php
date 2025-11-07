<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Logistics;
use App\Models\DropPoint;
use App\Models\OrderReschedule; 
use App\Models\Complications; 
use Auth;
class OrdersController extends Controller
{
    
    public function index(Request $request)
    {
         
        $query = Order::with(['user', 'dropPoint']);

        // ✅ Filter by User (name, email, or mobile)
        if ($request->filled('user')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->user . '%')
                  ->orWhere('email', 'LIKE', '%' . $request->user . '%')
                  ->orWhere('mobile', 'LIKE', '%' . $request->user . '%');
            });
        }

        // ✅ Filter by Order Date
        if ($request->filled('odate')) {
            $query->whereDate('odate', $request->odate);
        }

        // ✅ Filter by Pickup Address (partial match)
        if ($request->filled('pick_address')) {
            $query->where('pick_address', 'LIKE', '%' . $request->pick_address . '%');
        }

        // ✅ Filter by Drop Address (from DropPoint relation)
        if ($request->filled('drop_address')) {
            $query->whereHas('dropPoint', function ($q) use ($request) {
                $q->where('drop_address', 'LIKE', '%' . $request->drop_address . '%');
            });
        }

        // ✅ Filter by Phone Number (pickup or drop mobile)
        if ($request->filled('phone')) {
            $query->where(function ($q) use ($request) {
                $q->where('pick_mobile', 'LIKE', '%' . $request->phone . '%')
                  ->orWhereHas('dropPoint', function ($subQ) use ($request) {
                      $subQ->where('drop_mobile', 'LIKE', '%' . $request->phone . '%');
                  });
            });
        }

        // ✅ Filter by Property Type (optional)
        if ($request->filled('property_type')) {
            $query->where('property_type', 'LIKE', '%' . $request->property_type . '%');
        }

        // ✅ Filter by Order Status
        if ($request->filled('o_status')) {
            $query->where('o_status', $request->o_status);
        }

        // ✅ Order by Latest First
        $query->orderBy('id', 'desc');

        // ✅ Paginate Results (default 10 per page)
        $orders = $query->paginate($request->get('per_page', 10));



        return response()->json([
            'status' => true, 
            'data' => $orders
        ]);
    }
 

    public function getUserOrders(Request $request, $uid = 0){

        if (Auth::check()) {
            // ✅ User is logged in
            $uid = Auth::id(); // Get user ID
            $user = Auth::user(); // Get full user object
        }
        $query = Order::with(['dropPoint']) // Eager load drop point
            ->where('uid', $uid)
            ->orderBy('id', 'desc'); // Latest first

        // ✅ Filter by Order Date
        if ($request->filled('odate')) {
            $query->whereDate('odate', $request->odate);
        }

        // ✅ Filter by Pickup Address
        if ($request->filled('pick_address')) {
            $query->where('pick_address', 'LIKE', '%' . $request->pick_address . '%');
        }

        // ✅ Filter by Drop Address (via dropPoint relation)
        if ($request->filled('drop_address')) {
            $query->whereHas('dropPoint', function ($q) use ($request) {
                $q->where('drop_address', 'LIKE', '%' . $request->drop_address . '%');
            });
        }

        // ✅ Filter by Phone (pickup or drop)
        if ($request->filled('phone')) {
            $query->where(function ($q) use ($request) {
                $q->where('pick_mobile', 'LIKE', '%' . $request->phone . '%')
                  ->orWhereHas('dropPoint', function ($subQ) use ($request) {
                      $subQ->where('drop_mobile', 'LIKE', '%' . $request->phone . '%');
                  });
            });
        }

        // ✅ Optional Filter by Property Type
        if ($request->filled('property_type')) {
            $query->where('property_type', 'LIKE', '%' . $request->property_type . '%');
        }

        // ✅ Optional Filter by Order Status
        if ($request->filled('o_status')) {
            $query->where('o_status', $request->o_status);
        }

        // ✅ Paginate results (default 10)
        $orders = $query->paginate($request->get('per_page', 10));

        return response()->json([
            'status' => true,
            'data' => $orders,
        ]);
    }


    public function cancelOrder(Request $request, $id)
    {

        if (Auth::check()) {
            // ✅ User is logged in
            $uid = Auth::id(); // Get user ID
            $user = Auth::user(); // Get full user object
        }
        $order = Order::where('id', $id)
            ->where('uid', $uid)
            ->first();
        
        if (!$order) {
            return response()->json([
                'status' => false,
                'message' => 'Order not found or unauthorized.'
            ], 404);
        }

        if ($order->status === 'cancelled') {
            return response()->json([
                'status' => false,
                'message' => 'This order is already cancelled.'
            ]);
        }
        $reason = $request->reason;
        $order->update(['status' => 'cancelled','cancel_reason' => $reason]);

        return response()->json([
            'status' => true,
            'message' => 'Order cancelled successfully.',
            'data' => $order
        ]);
    }

    public function rescheduleOrder(Request $request, $id)
    {
        $request->validate([
            'new_date' => 'required|date|after:today',
            'reason' => 'nullable|string|max:255',
        ]);

        if (Auth::check()) {
            // ✅ User is logged in
            $uid = Auth::id(); // Get user ID
            $user = Auth::user(); // Get full user object
        }

        $order = Order::where('id', $id)
            ->where('uid', $uid)
            ->first();

        if (!$order) {
            return response()->json([
                'status' => false,
                'message' => 'Order not found or unauthorized.'
            ], 404);
        }

        $oldDate = $order->odate;

        // ✅ Update order date
        $order->update([
            'odate' => $request->new_date,
            'status' => 'rescheduled',
        ]);

        // ✅ Log reschedule history
        OrderReschedule::create([
            'order_id' => $order->id,
            'uid' => $uid,
            'old_date' => $oldDate,
            'new_date' => $request->new_date,
            'reason' => $request->reason,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Order rescheduled successfully.',
            'data' => $order
        ]);
    }
    public function getRescheduleHistory($order_id)
    {
        $history = OrderReschedule::where('order_id', $order_id)
            ->orderBy('id', 'desc')
            ->get();

        return response()->json([
            'status' => true, 
            'data' => $history
        ]);
    }

    public function getOrderDetails($order_id)
    {
        // ✅ Fetch order with main relationships
        $order = Order::with(['user', 'dropPoint', 'logisticsProducts','RescheduleHistory'])
            ->where('id', $order_id)
            ->first();

        if (!$order) {
            return response()->json([
                'status' => false,
                'message' => 'Order not found.'
            ], 404);
        }

        return response()->json([
            'status' => true, 
            'data' =>   $order 
        ]);
    }

}
