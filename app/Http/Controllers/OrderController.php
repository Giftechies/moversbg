<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Order;
use App\Models\Bid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Auth;
use App\Helpers\EncryptHelper;
class OrderController extends Controller
{
    
    public function index(Request $request)
    {
        $pageSize = 10;
        $search = $request->input('search');
        $orders = Order::LeftJoin('tbl_user', 'tbl_user.id', '=', 'tbl_order.uid')
            ->LeftJoin('tbl_drop_points', 'tbl_order.id', '=', 'tbl_drop_points.order_id') 
            ->select(
                'tbl_user.name',
                'tbl_user.email',
                'tbl_user.mobile',
                'tbl_order.id',
                'tbl_order.pick_address', 
                'tbl_order.property_type',
                'tbl_drop_points.drop_address' 
            )
            ->when($search, function ($query, $search) {
                return $query->where('tbl_user.name', 'like', '%' . $search . '%')
                    ->orWhere('tbl_user.email', 'like', '%' . $search . '%')
                    ->orWhere('tbl_order.pick_address', 'like', '%' . $search . '%')
                    ->orWhere('tbl_drop_points.drop_address', 'like', '%' . $search . '%');
            })
            ->orderBy('tbl_order.id', 'desc')->paginate($pageSize);

        return view('orders.index', compact('orders', 'search'));
    }
    public function show($order)
    {
        $id = EncryptHelper::dec($order);
        // Eager load relationships        
        $removalist = Auth::user()->hasRole('removalist');
        $vendorId = Auth::id(); 
        $order = Order::with('user', 'dropPoint', 'logisticsProducts','OrderReschedule')->where("tbl_order.id", $id)->first();            
        if(!empty($removalist)){
            $order['Bid'] = Bid::where('vendor_id', $vendorId)->where('order_id', $id)->first();
        } 
        // Return the view with the order data
        return view('orders.show', compact('order','removalist'));
    }

    // Upcoming orders – Pending + Processing
    public function upcoming(Request $request)
    {
        $orders = Order::where('vendor_id', 0)
            ->where('o_status', 'Pending')
            ->where('from_date', '>', now()) 
            ->orderBy('from_date', 'desc')
            ->get();

        return view('orders.list', [
            'orders' => $orders,
            'title'  => 'Upcoming Orders',
        ]);
    }

    // In‑process orders – On Route
    public function inprocess(Request $request)
    {
        $vendorId = Auth::user()->id;
        $orders = Order::where('vendor_id', $vendorId) 
            ->whereIn('o_status', ['On Route', 'Processing'])
            ->orderBy('from_date', 'desc')
            ->get();

        return view('orders.list', [
            'orders' => $orders,
            'title'  => 'In Process Orders',
        ]);
    }

    // Completed orders – Completed
    public function completed(Request $request)
    {
        $vendorId = Auth::user()->id;
        $orders = Order::where('vendor_id', $vendorId)
            ->where('o_status', 'Completed')
            ->orderBy('from_date', 'desc')
            ->get();

        return view('orders.list', [
            'orders' => $orders,
            'title'  => 'Completed Orders',
        ]);
    }

}