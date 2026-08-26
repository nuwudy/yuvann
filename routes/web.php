<?php

use App\Http\Controllers\Admin\MediaApiController;
use App\Livewire\Admin\CategoryManager;
use App\Livewire\Admin\Login;
use App\Livewire\Admin\MediaLibrary;
use App\Livewire\Admin\OrderList;
use App\Livewire\Admin\ProductManager;
use App\Livewire\Admin\ReviewManager;
use App\Livewire\Checkout;
use App\Livewire\Home;
use App\Livewire\ProductDetail;
use App\Livewire\ProductList;
use App\Livewire\ShopProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/* -------------------------------------------------------------------------- */
/* Web Routes                                                                */
/* -------------------------------------------------------------------------- */

// Customer Storefront Routes
Route::get('/', Home::class);
Route::get('/products', ProductList::class);
Route::get('/products/{slug}', ProductDetail::class)->name('product.detail');
Route::get('/shops/{slug}', ShopProfile::class)->name('shop.profile');
Route::get('/checkout', Checkout::class);
Route::get('/order-success/{order_number}', function ($order_number) {
    $order = \App\Models\Order::where('order_number', $order_number)->firstOrFail();
    return view('pages.order-success', compact('order'));
})->name('order.success');

// Sitemap XML route
Route::get('/sitemap.xml', function () {
    $urls = collect();
    $static = ['/', '/products', '/contact', '/terms', '/privacy', '/refund', '/shipping'];
    foreach ($static as $uri) {
        $urls->push(url($uri));
    }
    $products = \App\Models\Product::where('is_active', true)->get();
    foreach ($products as $product) {
        $urls->push(route('product.detail', $product->slug));
    }
    $content = view('sitemap', ['urls' => $urls])->render();
    return response($content, 200)->header('Content-Type', 'application/xml');
});

// Legal & Profile Pages
Route::view('/terms', 'pages.terms')->name('terms');
Route::view('/privacy', 'pages.privacy')->name('privacy');
Route::view('/refund', 'pages.refund')->name('refund');
Route::view('/shipping', 'pages.shipping')->name('shipping');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/dr-sajeev-dev', 'pages.dr-sajeev-dev')->name('dr-sajeev-dev');

// Admin Authentication Routes
Route::get('/admin/login', Login::class)->name('login');
Route::post('/admin/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
});

// Protected Admin Panel Routes
Route::middleware(['auth'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/products', ProductManager::class);
        Route::get('/shops', \App\Livewire\Admin\ShopManager::class);
        Route::get('/categories', CategoryManager::class);
        Route::get('/orders', OrderList::class);
        Route::get('/media', MediaLibrary::class);
        Route::get('/reviews', ReviewManager::class);
        Route::get('/settings', \App\Livewire\Admin\SettingsManager::class);
        Route::get('/api/media', [MediaApiController::class, 'index']);
    });

// Fallback for broken storage symlinks on cPanel
Route::get('/storage/{path}', function (string $path) {
    $fullPath = storage_path('app/public/' . $path);
    if (!file_exists($fullPath)) {
        abort(404);
    }
    $mime = mime_content_type($fullPath);
    return response()->file($fullPath, [
        'Content-Type' => $mime,
        'Cache-Control' => 'public, max-age=31536000'
    ]);
})->where('path', '.*');
