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


Route::get('/variations', [ComplicationController::class, 'index']);

//Route::get('/variations_rates', [ComplicationRateController::class, 'index']);
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


/*
Route::post('/token', function (Request $request) {
    $user = new \App\Models\User();
    $user->name = 'Guest';
    $user->email = 'guest@example.com';
    $token = $user->createToken('guest')->plainTextToken;
    return response()->json(['token' => $token]);
});*/
//require __DIR__.'/auth.php';
