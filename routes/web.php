<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CatalogController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\ReviewController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController; // [DITAMBAHKAN] Import Register Controller
use App\Http\Controllers\Customer\CartController; 
use App\Http\Controllers\Auth\GoogleAuthController; // [DITAMBAHKAN]
use App\Http\Controllers\Customer\ProfileController; // [BARU DITAMBAHKAN] Import Profile Controller

/*
|--------------------------------------------------------------------------
| Web Routes - Dapur Sejati (Premium Emerald & Gold Edition)
|--------------------------------------------------------------------------
*/

// --- HALAMAN UTAMA & KATALOG ---
Route::get('/', [CatalogController::class, 'index'])->name('home');

Route::get('/menu', function () {
    $products = \App\Models\Product::all(); 
    return view('customer.catalog.index', compact('products')); 
})->name('menu');


// --- FITUR KERANJANG BELANJA (CART) [BARU] ---
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/decrease', [CartController::class, 'decrease'])->name('cart.decrease'); 
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear'); 


// --- AUTH GOOGLE ---
Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('google.login');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);


// --- PROSES PESANAN / CHECKOUT (SINKRON DENGAN FILAMENT) ---
Route::post('/order', [OrderController::class, 'store'])
    ->middleware('throttle:3,1')
    ->name('order.store');

Route::post('/checkout', [OrderController::class, 'store'])->name('checkout');


// --- AUTENTIKASI AKSES INTERNAL ---
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// [BARU] ROUTE REGISTRASI AKUN BARU CUSTOMER
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


// --- [BARU] HALAMAN AKUN & PROFIL CUSTOMER ---
Route::get('/account', function () {
    return view('customer.account'); 
})->middleware('auth')->name('customer.account');

// [BARU DITAMBAHKAN] Rute Proses Update Data Foto Profil, Alamat, dan Biodata Customer
Route::post('/account/update', [ProfileController::class, 'update'])
    ->middleware('auth')
    ->name('customer.account.update');


// --- HALAMAN REVIEW & TESTIMONI ---
Route::get('/review', [ReviewController::class, 'index'])->name('review');
Route::post('/review', [ReviewController::class, 'store'])->name('review.store');


// --- HALAMAN LEGAL & ABOUT ---
Route::get('/privacy-policy', function () {
    return view('customer.privacy'); 
})->name('privacy');

Route::get('/terms-of-service', function () {
    return view('customer.terms'); 
})->name('terms');

Route::get('/about', function () {
    return view('customer.about'); 
})->name('about');


// --- ROUTE ALIRAN NAVBAR PENDUKUNG ---
Route::get('/contact', function () { return redirect()->route('home'); })->name('contact');
Route::get('/daily-menu', function () { return redirect()->route('home'); })->name('daily.menu');