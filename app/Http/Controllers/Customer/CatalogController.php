<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;

class CatalogController extends Controller
{
    public function index()
    {
        // Mengambil produk dari Supabase yang stoknya siap
        $products = Product::where('stock', '>', 0)->latest()->get();
        
        // PERBAIKAN: Arahkan ke customer.home sesuai struktur folder di foto Anda
        return view('customer.home', compact('products'));
    }


    /**
     * Menampilkan detail satu produk spesifik.
     */
    public function show(Product $product)
    {
        return view('customer.catalog.show', compact('product'));
    }
}
