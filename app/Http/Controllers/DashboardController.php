<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Zone;
use App\Models\Category;
use App\Models\Scoupon;
use App\Models\CountryCode;
use App\Models\Vehicle;
use App\Models\Rider;
use App\Models\User;
use App\Models\PaymentList;

class DashboardController extends Controller
{
    public function index()
    {
        $totalZones = Zone::count();
        $totalCategories = Category::count();
        $totalCoupons = Scoupon::count();
        $totalCountryCodes = 0;
        $totalVehicles = Vehicle::count();
        $totalRiders = Rider::count();
        $totalUsers = User::count();
        $totalPaymentGateways = PaymentList::count();
        $totalPendingOrders = Order::where('o_status', 'Pending')->count();
        $totalProcessOrders = Order::where('o_status', 'Processing')->count();
        $totalOnRouteOrders = Order::where('o_status', 'On Route')->count();
        $totalCompletedOrders = Order::where('o_status', 'Completed')->count();
        $totalCancelledOrders = Order::where('o_status', 'Cancelled')->count();
        $totalSales = Order::where('o_status', 'Completed')->sum('o_total');
        $totalEarnings = Order::where('o_status', 'Completed')->sum(\DB::raw('o_total * dcommission / 100'));

        return view('dashboard.index', compact(
            'totalZones',
            'totalCategories',
            'totalCoupons',
            'totalCountryCodes',
            'totalVehicles',
            'totalRiders',
            'totalUsers',
            'totalPaymentGateways',
            'totalPendingOrders',
            'totalProcessOrders',
            'totalOnRouteOrders',
            'totalCompletedOrders',
            'totalCancelledOrders',
            'totalSales',
            'totalEarnings',
        ));
    }
}
