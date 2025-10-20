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
        $data = User::join('tbl_order', 'tbl_user.id', '=', 'tbl_order.uid')
        ->join('tbl_drop_points', 'tbl_order.id', '=', 'tbl_drop_points.order_id')
        ->join('tbl_logistics_product', 'tbl_order.id', '=', 'tbl_logistics_product.order_id') 
        ->select(
            'users.name',
            'users.email',
            'users.mobile',
            'orders.pick_address',
            'orders.odate',
            'orders.property_type',
            'drop_points.drop_address',
            'tbl_logistics_product.*'
        )
        ->paginate($pageSize);
        return view('orders.index', compact('categories'));
    } 
}