<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ComplicationController;
use App\Http\Controllers\Api\ComplicationRateController;
use App\Http\Controllers\Api\MoveTypeController;
use App\Http\Controllers\Api\PropertyTypeController;
use App\Http\Controllers\Api\RiderController;
use App\Http\Controllers\Api\ZoneController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrdersController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\ExtraChargeApiController;
use App\Http\Controllers\Api\PageApiController;
use App\Http\Controllers\Api\ServiceApiController; 
use App\Http\Controllers\Api\BusinessApiController; 

Route::get('/variations', [ComplicationController::class, 'index']); 
Route::get('/move-types', [MoveTypeController::class, 'index']);
Route::get('/property-types', [PropertyTypeController::class, 'index']);
Route::get('/riders', [RiderController::class, 'index']);
Route::get('/zones', [ZoneController::class, 'index']);
Route::get('/variations-rates/{type}', [ComplicationRateController::class, 'getRatesByType']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::post('/submit-order', [UserController::class, 'store']);
Route::get('/faqs', [FaqController::class, 'index']);
Route::get('/extra-charges', [ExtraChargeApiController::class, 'index']);
Route::get('/pages', [PageApiController::class, 'index']);
Route::get('/top-bar', [PageApiController::class, 'top_bar']);
Route::get('/pages/{slug}', [PageApiController::class, 'show']);
Route::get('/services', [ServiceApiController::class, 'index']); // existing route
Route::get('/services/{slug}', [ServiceApiController::class, 'show']); // 👈 new route
Route::post('/register-business', [BusinessApiController::class, 'registerManagerAndBusiness']);
Route::get('/orders', [OrdersController::class, 'index']); 
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/orders/user/{uid?}', [OrdersController::class, 'getUserOrders']);
    Route::post('/orders/{id}/cancel', [OrdersController::class, 'cancelOrder']);
    Route::post('/orders/{id}/reschedule', [OrdersController::class, 'rescheduleOrder']);
    Route::get('/orders/{id}/reschedule-history', [OrdersController::class, 'getRescheduleHistory']);
    Route::get('/order/{order_id}/details', [OrdersController::class, 'getOrderDetails']);
});
Route::post('/login', [UserController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [UserController::class, 'logout']);
/*
Route::post('/token', function (Request $request) {
    $user = new \App\Models\User();
    $user->name = 'Guest';
    $user->email = 'guest@example.com';
    $token = $user->createToken('guest')->plainTextToken;
    return response()->json(['token' => $token]);
});*/
//require __DIR__.'/auth.php';
