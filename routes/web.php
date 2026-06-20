<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Models\Category;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    $categories = Category::all();

    $bestSellers = Product::orderByDesc('sold')
        ->take(8)
        ->get();

    $latestProducts = Product::latest()
        ->take(8)
        ->get();

    $totalProducts = Product::count();

    return view('welcome', compact(
        'categories',
        'bestSellers',
        'latestProducts',
        'totalProducts'
    ));
});

/*
|--------------------------------------------------------------------------
| SHOP / PRODUCTS
|--------------------------------------------------------------------------
*/

Route::get('/products', [ShopController::class, 'index'])
    ->name('shop.index');

Route::get('/products/{id}', [ShopController::class, 'show'])
    ->name('products.show');

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| PROFILE (FIX CLEAN - NO DUPLICATE)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // PASSWORD
    Route::get('/profile/password', function () {
        return view('profile.password');
    })->name('profile.password');

    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])
        ->name('profile.password.update');

    // ADDRESS
    Route::get('/profile/address', function () {
        return view('profile.address');
    })->name('profile.address');

    Route::post('/profile/address', [ProfileController::class, 'updateAddress'])
        ->name('profile.address.store');
});

/*
|--------------------------------------------------------------------------
| CART
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::post('/cart/add/{id}', [CartController::class, 'add'])
        ->name('cart.add');

    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/cart/update/{id}', [CartController::class, 'update'])
        ->name('cart.update');

    Route::delete('/cart/delete/{id}', [CartController::class, 'delete'])
        ->name('cart.delete');

    Route::get('/cart/clear', [CartController::class, 'clear'])
        ->name('cart.clear');
});

/*
|--------------------------------------------------------------------------
| CHECKOUT
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::post('/checkout', [CheckoutController::class, 'checkout'])
        ->name('checkout');
});

/*
|--------------------------------------------------------------------------
| ORDERS
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/orders', [OrderController::class, 'index'])
        ->name('orders.index');

    Route::get('/orders/{id}', [OrderController::class, 'show'])
        ->name('orders.show');

    Route::get('/orders/{id}/tracking', [OrderController::class, 'tracking'])
        ->name('orders.tracking');

        Route::delete('/orders/{id}', [AdminOrderController::class, 'destroy'])
    ->name('admin.orders.destroy');
});


Route::get('/kategori/{jenis}', [CategoryController::class, 'show'])
    ->name('kategori.show');
/*
|--------------------------------------------------------------------------
| PAYMENT
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/payment/{order}', [PaymentController::class, 'index'])
        ->name('payment.index');

    Route::post('/payment/{order}', [PaymentController::class, 'upload'])
        ->name('payment.upload');

    Route::get('/payment/success/{order}', [PaymentController::class, 'success'])
        ->name('payment.success');
});

/*
|--------------------------------------------------------------------------
| ADMIN (ROLE ADMIN)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('admin.dashboard');

        Route::resource('categories', CategoryController::class);
        Route::resource('suppliers', SupplierController::class);
        Route::resource('brands', BrandController::class);
        Route::resource('products', ProductController::class);

        Route::get('/orders', [AdminOrderController::class, 'index'])
            ->name('admin.orders.index');

        Route::get('/orders/{id}', [AdminOrderController::class, 'show'])
            ->name('admin.orders.show');

        Route::post('/orders/{id}/status', [AdminOrderController::class, 'updateStatus'])
            ->name('admin.orders.updateStatus');

        Route::post('/orders/{id}/payment-status', [AdminOrderController::class, 'updatePaymentStatus'])
            ->name('admin.orders.paymentStatus');

        Route::post('/orders/{id}/shipping', [AdminOrderController::class, 'updateShipping'])
            ->name('admin.orders.shipping');
    });

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';