<?php

use App\Http\Controllers\Admin\MediaApiController;
use App\Livewire\Admin\CategoryManager;
use App\Livewire\Admin\Login;
use App\Livewire\Admin\MediaLibrary;
use App\Livewire\Admin\OrderList;
use App\Livewire\Admin\ProductManager;
use App\Livewire\Checkout;
use App\Livewire\Home;
use App\Livewire\ProductDetail;
use App\Livewire\ProductList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Customer Storefront Routes
Route::get('/', Home::class);
Route::get('/products', ProductList::class);
Route::get('/products/{slug}', ProductDetail::class);
Route::get('/checkout', Checkout::class);
Route::get('/order-success/{order_number}', function ($order_number) {
    $order = \App\Models\Order::where('order_number', $order_number)->firstOrFail();
    return view('pages.order-success', compact('order'));
})->name('order.success');
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
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/products', ProductManager::class);
    Route::get('/categories', CategoryManager::class);
    Route::get('/orders', OrderList::class);
    Route::get('/media', MediaLibrary::class);
    Route::get('/api/media', [MediaApiController::class, 'index']); // JSON API for the client-side media picker

    // Force fix storage link via browser
    Route::get('/fix-storage', function () {
        try {
            \Illuminate\Support\Facades\Artisan::call('optimize:clear');
            $output = "Caches cleared.<br>";
            
            $publicStorage = public_path('storage');
            $target = storage_path('app/public');
            
            if (is_link($publicStorage)) {
                unlink($publicStorage);
                $output .= "Old symlink removed.<br>";
            } elseif (is_dir($publicStorage)) {
                \Illuminate\Support\Facades\File::deleteDirectory($publicStorage);
                $output .= "Old storage directory removed.<br>";
            } elseif (file_exists($publicStorage)) {
                unlink($publicStorage);
            }
            
            if (function_exists('symlink')) {
                app('files')->link($target, $publicStorage);
                $output .= "Storage link fixed successfully! Target: $target -> Link: $publicStorage.<br>";
            } else {
                $output .= "The symlink() function is disabled on your server. However, the fallback route is now active and will serve your images!<br>";
            }
            
            return $output . "<br><a href='/admin/media'>Go back to Media Library</a>";
        } catch (\Exception $e) {
            return "An error occurred: " . $e->getMessage() . "<br><br>The fallback route has been activated anyway. <a href='/admin/media'>Go back to Media Library</a>";
        }
    });
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
