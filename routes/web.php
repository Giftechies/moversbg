<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ScouponController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PcatController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RiderController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\PaymentListController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ComplicationRateController;
use App\Http\Controllers\ComplicationController;
use App\Http\Controllers\MoveTypeController;
use App\Http\Controllers\PropertyTypeController;
use App\Http\Controllers\SettingController;


Route::get('/', function () {
    return view('welcome');
});

 
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy'); 
    Route::resource('subcategories', SubCategoryController::class);

    Route::get('/orders', [OrderController::class, 'orders'])->name('orders');
    Route::resource('codes', CodeController::class);  
    Route::resource('scoupons', ScouponController::class);
    Route::resource('managers', ManagerController::class); 
    Route::resource('zones', ZoneController::class);
    Route::resource('pages', PageController::class);
    Route::resource('pcats', PcatController::class);
    Route::resource('products', ProductController::class);
    Route::get('get-subcategories/{catId?}', [ProductController::class, 'getSubcategories'])->name('get.subcategories'); 
    Route::resource('riders', RiderController::class);
    Route::resource('vehicles', VehicleController::class);
    Route::resource('banners', BannerController::class); 
    Route::resource('paymentlists', PaymentListController::class);
    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update'); 
    Route::resource('variations_rates', ComplicationRateController::class)->parameters(['variations_rates' => 'complicationRate',]);
    Route::resource('variations', ComplicationController::class);    
    Route::resource('move_types', MoveTypeController::class);
    Route::resource('property_types', PropertyTypeController::class);
});
require __DIR__.'/auth.php';
