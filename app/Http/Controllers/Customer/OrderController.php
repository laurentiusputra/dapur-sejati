<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Memproses transaksi pembelian dari customer.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'customer_name' => 'required|string|max:255',
            'shipping_address' => 'required|string',
        ]);

        // Menggunakan Database Transaction agar aman jika terjadi kegagalan jaringan cloud
        return DB::transaction(function () use ($request) {
            $product = Product::findOrFail($request->product_id);

            // Validasi apakah stok mencukupi
            if ($product->stock < $request->quantity) {
                return redirect()->back()->with('error', 'Maaf, stok produk tidak mencukupi.');
            }

            // Hitung total harga item belanjaan
            $totalPrice = $product->price * $request->quantity;

            // Membuat data order baru (Berhasil karena $guarded = [])
            Order::create([
                'product_id' => $product->id,
                'customer_name' => $request->customer_name,
                'quantity' => $request->quantity,
                'total_price' => $totalPrice,
                'shipping_address' => $request->shipping_address,
                'status' => 'pending',
            ]);

            // Potong stok produk otomatis dan simpan perubahan
            $product->decrement('stock', $request->quantity);

            return redirect()->route('catalog.index')->with('success', 'Pesanan Anda berhasil dibuat!');
        });
    }
}
