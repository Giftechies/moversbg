<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OrderController extends Controller
{
    
public function index(Request $request)
{
    $pageSize = 10;
    $search = $request->input('search');

    $orders = User::join('tbl_order', 'tbl_user.id', '=', 'tbl_order.uid')
        ->join('tbl_drop_points', 'tbl_order.id', '=', 'tbl_drop_points.order_id')
        ->join('tbl_logistics_product', 'tbl_order.id', '=', 'tbl_logistics_product.oid')
        ->select(
            'tbl_user.name',
            'tbl_user.email',
            'tbl_user.mobile',
            'tbl_order.id',
            'tbl_order.pick_address',
            'tbl_order.odate',
            'tbl_order.property_type',
            'tbl_drop_points.drop_address',
            'tbl_logistics_product.*'
        )
        ->when($search, function ($query, $search) {
            return $query->where('tbl_user.name', 'like', '%' . $search . '%')
                ->orWhere('tbl_user.email', 'like', '%' . $search . '%')
                ->orWhere('tbl_order.pick_address', 'like', '%' . $search . '%')
                ->orWhere('tbl_drop_points.drop_address', 'like', '%' . $search . '%');
        })
        ->paginate($pageSize);

    return view('orders.index', compact('orders', 'search'));
}
    public function show($order)
    {
        // Eager load relationships
        $order = Order::with('user', 'dropPoint', 'logisticsProducts','OrderReschedule')->where("tbl_order.id", $order)->first(); 

        // Return the view with the order data
        return view('orders.show', compact('order'));
    }
}