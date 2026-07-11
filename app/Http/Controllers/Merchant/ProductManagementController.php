<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductManagementController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('merchant.products.index', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0', // Validasi harga wajib angka positif
            'stock' => 'required|integer|min:0', // Validasi stok wajib angka bulat
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products-gallery', 's3');
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,       // Sinkron dengan fillable baru
            'stock' => $request->stock,       // Sinkron dengan fillable baru
            'image_path' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $product->image_path;
        if ($request->hasFile('image')) {
            if ($product->image_path && Storage::disk('s3')->exists($product->image_path)) {
                Storage::disk('s3')->delete($product->image_path);
            }
            $imagePath = $request->file('image')->store('products-gallery', 's3');
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image_path' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        if ($product->image_path && Storage::disk('s3')->exists($product->image_path)) {
            Storage::disk('s3')->delete($product->image_path);
        }
        $product->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus!');
    }
}
