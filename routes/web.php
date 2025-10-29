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
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ExtraChargeController;
use App\Http\Controllers\ServiceController;
// routes/web.php
use App\Http\Controllers\RolePermissionController;

 

Route::get('/', function () {
    return view('welcome');
});

 
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/roles', [RolePermissionController::class, 'index'])->name('roles.index');
    Route::post('/roles', [RolePermissionController::class, 'storeRole'])->name('roles.store');
    Route::post('/permissions', [RolePermissionController::class, 'storePermission'])->name('permissions.store');
    Route::post('/roles/{role}/assign', [RolePermissionController::class, 'assignPermission'])->name('roles.assign');
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

    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
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
    Route::resource('faqs', FaqController::class);  
    Route::resource('extra-charges', ExtraChargeController::class);
    Route::patch('extra-charges/{extraCharge}/toggle', [ExtraChargeController::class, 'toggle'])
        ->name('extra-charges.toggle'); 

    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/services/store', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');
});
require __DIR__.'/auth.php';
