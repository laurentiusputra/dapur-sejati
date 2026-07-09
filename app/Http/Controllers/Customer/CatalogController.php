<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product; 

class CatalogController extends Controller
{
    public function index()
    {
        // Ambil menu PO yang kuotanya ada, DAN ambil semua menu Daily/Special tanpa batasan kuota
        $products = Product::where('quota', '>', 0)
            ->orWhereIn('category', ['daily', 'special'])
            ->get();

        // Lempar data ke halaman view katalog pembeli
        return view('customer.home', compact('products'));
    }
}