<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminReviewController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderSummaryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\FavoriteController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LandingPageController::class, 'index']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/menu', [MenuController::class, 'index'])->middleware('auth')->name('menu');
Route::get('/menu/category/{categoryName}', [MenuController::class, 'index'])->middleware('auth')->name('menu.category');
Route::get('/menu/{id}', [MenuController::class, 'show'])->middleware('auth')->name('menu.show');
Route::post('/menu/{id}/review', [MenuController::class, 'storeReview'])->middleware('auth')->name('menu.review');

// Admin routes
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function() {
    Route::get('/dashboard', [\App\Http\Controllers\AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Product management
    Route::resource('products', AdminProductController::class);
    
    // Review management
    Route::get('reviews', [AdminReviewController::class, 'index'])->name('reviews.index');
    Route::delete('reviews/{id}', [AdminReviewController::class, 'destroy'])->name('reviews.destroy');
    
    // Order management
    Route::resource('orders', \App\Http\Controllers\AdminOrderController::class);
    Route::post('orders/{id}/update-status', [\App\Http\Controllers\AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');
    
    // User management
    Route::resource('users', \App\Http\Controllers\AdminUserController::class);
    
    // Additional admin routes can be added here
});

Route::middleware('auth')->group(function() {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{food_id}', [CartController::class, 'add'])->name('cart.add');
    Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::post('/logout', function() {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'create'])->name('checkout.create');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('/order-summary', [OrderSummaryController::class, 'index'])->name('order.summary');
    Route::get('/payment', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');
    Route::post('/order/store', [OrderSummaryController::class, 'store'])->name('order.store');

    // Favorite Routes
    Route::post('/favorites/{food}/add', [FavoriteController::class, 'addFavorite'])->name('favorites.add');
    Route::post('/favorites/{food}/remove', [FavoriteController::class, 'removeFavorite'])->name('favorites.remove');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::get('/favorites/{food}/check-status', [FavoriteController::class, 'checkFavoriteStatus'])->name('favorites.checkStatus');
});
