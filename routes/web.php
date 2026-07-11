<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CatalogController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\ReviewController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes - Dapur Sejati (Premium Emerald & Gold Edition)
|--------------------------------------------------------------------------
*/

// --- HALAMAN UTAMA & KATALOG ---
// Menampilkan halaman Beranda Utama (customer/home.blade.php) lewat Controller
Route::get('/', [CatalogController::class, 'index'])->name('home');

// Menampilkan halaman Menu Standalone (customer/menu.blade.php)
Route::get('/menu', function () {
    return view('customer.menu'); 
})->name('menu');


// --- PROSES PESANAN / CHECKOUT (SINKRON DENGAN FILAMENT) ---
// Memproses form pemesanan belanjaan customer dari halaman depan
Route::post('/order', [OrderController::class, 'store'])
    ->middleware('throttle:3,1')
    ->name('order.store');

// Sinkronisasi alias untuk rute checkout agar tombol form lama tidak rusak
Route::post('/checkout', [OrderController::class, 'store'])->name('checkout');


// --- AUTENTIKASI AKSES INTERNAL (Owner, Admin, Merchant) ---
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// --- HALAMAN REVIEW & TESTIMONI ---
Route::get('/review', [ReviewController::class, 'index'])->name('review');
Route::post('/review', [ReviewController::class, 'store'])->name('review.store');


// --- HALAMAN LEGAL & ABOUT (Disesuaikan ke Sub-Folder customer.) ---
Route::get('/privacy-policy', function () {
    return view('customer.privacy'); 
})->name('privacy');

Route::get('/terms-of-service', function () {
    return view('customer.terms'); 
})->name('terms');

Route::get('/about', function () {
    return view('customer.about'); 
})->name('about');


// --- ROUTE ALIRAN NAVBAR PENDUKUNG (PENGALIHAN) ---
Route::get('/cart', function () { return redirect()->route('home'); })->name('cart');
Route::get('/contact', function () { return redirect()->route('home'); })->name('contact');
Route::get('/daily-menu', function () { return redirect()->route('home'); })->name('daily.menu');
