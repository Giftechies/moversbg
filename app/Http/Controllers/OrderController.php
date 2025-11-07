<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OrderController extends Controller
{
    public function index()
    {
        $pageSize = 10;
        $orders  = User::join('tbl_order', 'tbl_user.id', '=', 'tbl_order.uid')
        ->join('tbl_drop_points', 'tbl_order.id', '=', 'tbl_drop_points.order_id')
        ->join('tbl_logistics_product', 'tbl_order.id', '=', 'tbl_logistics_product.oid') 
        ->select(
            'tbl_user.name',
            'tbl_user.email',
            'tbl_user.mobile',
            'tbl_order.pick_address',
            'tbl_order.odate',
            'tbl_order.property_type',
            'tbl_drop_points.drop_address',
            'tbl_logistics_product.*'
        )
        ->paginate($pageSize);
        return view('orders.index', compact('orders'));
    } 
    public function show(Order $order)
    {
        // Eager load relationships
        $order->load('user', 'dropPoint', 'logisticsProducts');

        // Return the view with the order data
        return view('orders.show', compact('order'));
    }
}