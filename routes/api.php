<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ComplicationController;
use App\Http\Controllers\Api\ComplicationRateController;
use App\Http\Controllers\Api\MoveTypeController;
use App\Http\Controllers\Api\PropertyTypeController;
use App\Http\Controllers\Api\RiderController;
use App\Http\Controllers\Api\ZoneController;
use App\Http\Controllers\Api\CategoryController;
use App\http\controller\Api\OrdersController;

Route::get('/variations', [ComplicationController::class, 'index']);

Route::get('/variations_rates', [ComplicationRateController::class, 'index']);
Route::get('/move-types', [MoveTypeController::class, 'index']);
Route::get('/property-types', [PropertyTypeController::class, 'index']);
Route::get('/riders', [RiderController::class, 'index']);
Route::get('/zones', [ZoneController::class, 'index']);
Route::get('/variations_rates', [ComplicationRateController::class, 'getRatesByType']);
Route::get('/categories-with-products', [CategoryController::class, 'getCategoriesWithProducts']);
Route::post('/submit-order', [CategoryController::class, 'store']);

//require __DIR__.'/auth.php';
