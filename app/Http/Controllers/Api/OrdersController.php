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

class OrdersController extends Controller
{
    
    public function index(Request $request)
    {
        $query = Order::query();

        // ✅ Filter by date (e.g. ?date=2025-10-31)
        if ($request->has('date') && !empty($request->date)) {
            $query->whereDate('odate', $request->date);
        }

        // ✅ Filter by pickup address (partial match)
        if ($request->has('pick_address') && !empty($request->pick_address)) {
            $query->where('pick_address', 'LIKE', '%' . $request->pick_address . '%');
        }

        // ✅ Filter by drop address (partial match)
        if ($request->has('drop_address') && !empty($request->drop_address)) {
            $query->where('drop_address', 'LIKE', '%' . $request->drop_address . '%');
        }

        // ✅ Order by latest first
        $query->orderBy('id', 'desc');

        // ✅ Paginate results (default 10 per page)
        $orders = $query->paginate($request->get('per_page', 10));

        return response()->json([
            'status' => true,
            'message' => 'Orders fetched successfully.',
            'data' => $orders
        ]);
    }

    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    
        $validated = $request->validate(
            [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'phone' => 'nullable|string|max:20',
            'user_id'=>'required',
            'email' => 'required|email|unique:users,email',
            'password'=>'required',
            // 'order_id'=>'required',
            // 'category_id'=>'required',
            'pickup_address'=>'required',
            'Deliver_time'=>'required',
            'Pickup_mobileno'=>'required',
            'pick_name'=>'required',
            // 'vechile_id'=>'required',
            // 'rider_id'=>'required',
            'category_name'=>'required',
            'variation_name'=>'required',
            'variation_meter'=>'required',
            'drop_mobileno'=>'required',
            'drop_name'=>'required',
            'drop_address'=>'required',
            'logistic_date'=>'required',
            'category_name'=>'required'
        ]);
      


         $arrUser=[
                'name'=>$validated['name'],
                'email'=>$validated['e-mail'],
                'mobile'=>$validated['phone'],
                'password'=>$validated['password']
            ];
        $user = User::create($arrUser); 
        $arrOrder=[
               'uid'=> $user->id,
                // 'cat_id' => $validated['category_id'], 
               'pick_address' => $validated['pickup_address'],
              'pick_mobile' => $validated['Pickup_mobileno'],
              'delivertime'=>$validated['Deliver_time'],
              // 'rid'=>$validated['rider_id'],
              'pick_name'=>$validated['pick_name']];
        $order = Order::create($arrOrder); 
        $arrCategory=[
             'cat_name'=>$validated['category_name']
               ];
        $category = Category::create($arrCategory); 
 
        $arrComp=[
            'name'=>$validated['variation_name'],
            'meter'=>$validated['variation_meter']
             ];
        $complications = Complications::create($arrComp); 
         $arrDp=[  
              'uid'=> $user->id,
              'order_id'=> $order->id,
              'drop_address'=>$validated['drop_address'],
              'drop_name'=>$validated['drop_name'],
               'drop_mobile'=>$validated['drop_mobileno'],
                //   'order_id'=>$validated['order_id']
                ];
        $drop_point = DropPoint::create($arrDp); 
         $arrLogistic=[
             'uid'=> $user->id,
             'drop_address'=>$validated['drop_address'],
              'pick_address' => $validated['pickup_address'],
              'delivertime'=>$validated['Deliver_time'],
               //    'vechileid'=>$validated['vechile_id'],
              'logistic_date'=>$validated['logistic_date']
            ];      
        $logistic = Logistic::create($arrLogistic);
      
     
       

        return response()->json([
            'success' => true,
            'message' => 'Order created successfully',
            'data' => $order
        ], 201);

    }


    public function getUserOrders(Request $request, $uid)
{
    $query = Order::with('dropPoint') // 👈 Eager load drop point details
        ->where('uid', $uid)
        ->orderBy('id', 'desc'); // latest first

    // ✅ Optional filters
    if ($request->filled('date')) {
        $query->whereDate('odate', $request->date);
    }

    if ($request->filled('pick_address')) {
        $query->where('pick_address', 'LIKE', '%' . $request->pick_address . '%');
    }

    if ($request->filled('drop_address')) {
        // You can filter by main order drop address OR related drop point address
        $query->where(function ($q) use ($request) {
            $q->where('drop_address', 'LIKE', '%' . $request->drop_address . '%')
              ->orWhereHas('dropPoint', function ($sub) use ($request) {
                  $sub->where('drop_address', 'LIKE', '%' . $request->drop_address . '%');
              });
        });
    }

    // ✅ Paginate (default 10)
    $orders = $query->paginate($request->get('per_page', 10));

    return response()->json([
        'status' => true, 
        'data' => $orders
    ]);
}

    public function cancelOrder(Request $request, $id)
    {
        $order = Order::where('id', $id)
            ->where('uid', $request->user()->id)
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

        $order->update(['status' => 'cancelled']);

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

        $order = Order::where('id', $id)
            ->where('uid', $request->user()->id)
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
            'uid' => $request->user()->id,
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
        $order = Order::with(['user', 'dropPoint', 'logistic'])
            ->where('id', $order_id)
            ->first();

        if (!$order) {
            return response()->json([
                'status' => false,
                'message' => 'Order not found.'
            ], 404);
        }

        // ✅ Fetch related entities (if not directly linked in orders table)
       // $category = Category::where('uid', $order->uid)->latest()->first();
      //  $complication = Complications::where('uid', $order->uid)->latest()->first();
        $order = Order::with(['category', 'complication', 'logistic', 'dropPoint', 'user'])->find($order_id);

        return response()->json([
            'status' => true, 
            'data' =>   $order 
        ]);
    }

}
