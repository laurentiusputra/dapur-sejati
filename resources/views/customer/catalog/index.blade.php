<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Dapur Sejati</title>
    <!-- Menggunakan Bootstrap 5 CDN untuk tampilan cepat -->
    <link href="https://jsdelivr.net" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <h1 class="text-center mb-5 fw-bold text-dark">Katalog Menu Dapur Sejati</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse($products as $product)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        
                        <!-- MENGAMBIL GAMBAR LIVE DARI SUPABASE STORAGE -->
                        @if($product->image_path)
                            <img src="{{ Storage::disk('s3')->url($product->image_path) }}" 
                                 class="card-img-top object-cover" 
                                 alt="{{ $product->name }}" 
                                 style="height: 230px; object-fit: cover;">
                        @else
                            <div class="bg-secondary text-white text-center d-flex align-items-center justify-content-center" style="height: 230px;">
                                Tidak Ada Gambar
                            </div>
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-dark">{{ $product->name }}</h5>
                            <p class="card-text text-muted flex-grow-1">{{ Str::limit($product->description, 100) }}</p>
                            
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="text-danger fw-bold fs-5">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                <span class="badge bg-success">Stok: {{ $product->stock }}</span>
                            </div>
                        </div>
                        
                        <div class="card-footer bg-white border-top-0 pb-3">
                            <form action="{{ route('order.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="customer_name" value="Pembeli Contoh"> <!-- Ganti sesuai auth user nanti -->
                                <input type="hidden" name="shipping_address" value="Alamat Pengiriman Contoh">
                                <button type="submit" class="btn btn-primary w-100 fw-bold">Pesan Sekarang</button>
                            </form>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted fs-5">Belum ada produk kuliner yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>

</body>
</html>
