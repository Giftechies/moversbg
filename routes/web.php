<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ScouponController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PcatController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RiderController;
use App\Http\Controllers\VehicleTypesController;
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
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleDocumentController;
use App\Http\Controllers\BusinessDocController;

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
    Route::put('/profile', [ProfileController::class, 'profile_update'])->name('profileupdate');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy'); 
    Route::resource('subcategories', SubCategoryController::class);
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::resource('codes', CodeController::class);  
    Route::resource('scoupons', ScouponController::class);
    Route::resource('business', BusinessController::class); 
    Route::resource('zones', ZoneController::class);
    Route::resource('pages', PageController::class);
    Route::resource('pcats', PcatController::class);
    Route::resource('products', ProductController::class);
    Route::get('get-subcategories/{catId?}', [ProductController::class, 'getSubcategories'])->name('get.subcategories'); 
    Route::resource('riders', RiderController::class);
    Route::resource('vehicleTypes', VehicleTypesController::class);
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
    Route::patch('extra-charges/{extraCharge}/toggle', [ExtraChargeController::class, 'toggle'])->name('extra-charges.toggle'); 
    Route::resource('vehicles', VehicleController::class)->except(['show']);          
    // we only need index, create, store, edit, update, destroy
    // Optional: API endpoint to fetch types for dropdown
    Route::get('vehicle-types', [VehicleController::class, 'types'])->name('vehicles.types');
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/services/store', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy'); 

    
    Route::resource('business-docs', BusinessDocController::class)->except(['index']);
    // Convenience route to show the “add more” page for a business
    Route::get('business/{business}/docs/create', [BusinessDocController::class, 'create'])->name('business.docs.create');
    Route::prefix('vehicle-documents')->name('vehicle-documents.')->group(function () {
        // /vehicle-documents               → all documents
        // /vehicle-documents/{id}           → documents for a specific vehicle
        Route::get('{id?}',    [VehicleDocumentController::class, 'index'])->name('index');

        // /vehicle-documents/create               → normal create form
        // /vehicle-documents/create/{vehicle_id}  → pre‑fill the vehicle_id
        Route::get('create/{vehicle_id?}', [VehicleDocumentController::class, 'create'])->name('create');
        Route::post('/',                   [VehicleDocumentController::class, 'store'])->name('store');
        Route::get('{id}',                 [VehicleDocumentController::class, 'show'])->name('show');
        Route::get('{id}/edit',            [VehicleDocumentController::class, 'edit'])->name('edit');
        Route::put('{id}',                 [VehicleDocumentController::class, 'update'])->name('update');
        Route::patch('{id}',               [VehicleDocumentController::class, 'update']);
        Route::delete('{id}',              [VehicleDocumentController::class, 'destroy'])->name('destroy');
    });

});
require __DIR__.'/auth.php'; 
