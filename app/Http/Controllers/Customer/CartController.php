<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // 1. Menampilkan Halaman Keranjang
    public function index()
    {
        $cart = session()->get('cart', []);
        
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        return view('customer.cart', compact('cart', 'totalPrice'));
    }

    // 2. Menambah Produk ke Keranjang
    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $cart = session()->get('cart', []);

        // Jika produk sudah ada di keranjang, tambah jumlahnya
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            // Jika belum ada, masukkan data baru
            $cart[$product->id] = [
                "id" => $product->id,
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image_path,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', $product->name . ' berhasil ditambahkan ke keranjang!');
    }

    // [BARU] Mengurangi Produk dari Keranjang (-)
    public function decrease(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                // Jika jumlahnya lebih dari 1, kurangi 1
                if($cart[$request->id]['quantity'] > 1) {
                    $cart[$request->id]['quantity']--;
                    session()->put('cart', $cart);
                } else {
                    // Jika jumlahnya 1 dan diklik minus lagi, maka hapus itemnya
                    unset($cart[$request->id]);
                    session()->put('cart', $cart);
                }
            }
            // 🛠️ FIX: Mengubah redirect statis menjadi back() agar user tidak terlempar ke halaman cart saat klik dari homepage menu
            return redirect()->back();
        }
    }

    // 3. Menghapus Produk dari Keranjang (Satu per satu)
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->route('cart.index')->with('success', 'Produk dihapus dari keranjang.');
        }
    }

    // 4. Menghapus SEMUA Produk dari Keranjang (Bersihkan)
    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Keranjang belanja berhasil dibersihkan!');
    }
}