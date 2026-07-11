<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\HeroSlide; // 1. Tambahan: Import model HeroSlide untuk Banner

class CatalogController extends Controller
{
    public function index()
    {
        // Mengambil produk dari Supabase yang stoknya siap (Tetap utuh tidak diubah)
        $products = Product::where('stock', '>', 0)->latest()->get();
        
        // 2. Tambahan: Mengambil data slide aktif dari Supabase dan diurutkan
        $slides = HeroSlide::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        
        // PERBAIKAN: Arahkan ke customer.home sesuai struktur folder di foto Anda
        // 3. Tambahan: Selipkan 'slides' ke dalam compact agar bisa di-loop di home.blade.php
        return view('customer.home', compact('products', 'slides'));
    }


    /**
         * Menampilkan detail satu produk spesifik.
         */
    public function show(Product $product)
    {
        return view('customer.catalog.show', compact('product'));
    }
}