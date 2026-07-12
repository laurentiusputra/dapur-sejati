@extends('customer.layouts.app')

@section('title', 'Katalog Menu - Dapur Sejati')

@section('content')
<section class="bg-[#f4ebd0] pt-48 pb-24 min-h-screen font-sans">
    <div class="max-w-6xl mx-auto px-6 relative z-10">
        
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-heading font-black text-brand-deep-forest tracking-tight">Katalog Menu Dapur Sejati</h1>
            <p class="text-brand-deep-forest/70 mt-3 text-lg">Pilih menu favoritmu, dari yang ready stock sampai pre-order.</p>
        </div>

        @if(session('success'))
            <div class="max-w-2xl mx-auto mb-10 bg-brand-matcha-100 border border-brand-matcha-300 text-brand-matcha-900 px-6 py-4 rounded-2xl text-center font-medium shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-center gap-3 sm:gap-4 mb-12 flex-wrap" id="filter-container">
            <button data-filter="all" class="filter-btn px-6 py-2 bg-brand-deep-forest text-white rounded-full text-sm font-bold shadow-sm transition-colors cursor-pointer">Semua Menu</button>
            <button data-filter="daily" class="filter-btn px-6 py-2 bg-white text-brand-deep-forest border border-slate-200 rounded-full text-sm font-bold hover:bg-slate-50 transition-colors cursor-pointer">Daily Special</button>
            <button data-filter="po" class="filter-btn px-6 py-2 bg-white text-brand-deep-forest border border-slate-200 rounded-full text-sm font-bold hover:bg-slate-50 transition-colors cursor-pointer">Pre-Order</button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="menu-grid">
            @forelse($products as $product)
                @php
                    $imageSrc = null;
                    $category = 'daily'; 
                    
                    if ($product->image_path) {
                        if (\Illuminate\Support\Str::startsWith($product->image_path, ['http://', 'https://'])) {
                            $imageSrc = $product->image_path;
                        } elseif (Storage::disk('public')->exists($product->image_path)) {
                            $imageSrc = asset('storage/' . $product->image_path);
                        } else {
                            $possiblePaths = [
                                $product->image_path,
                                'img/products/daily/' . $product->image_path,
                                'img/products/po/' . $product->image_path,
                                'img/products/special/' . $product->image_path,
                            ];
                            
                            foreach ($possiblePaths as $pp) {
                                if (file_exists(public_path($pp))) {
                                    $imageSrc = asset($pp);
                                    if (str_contains($pp, '/po/')) $category = 'po';
                                    elseif (str_contains($pp, '/daily/')) $category = 'daily';
                                    break;
                                }
                            }
                        }
                    }
                    
                    $isPO = ($category === 'po');
                    $isClosed = true; 
                @endphp

                <div data-category="{{ $category }}" class="menu-item bg-white rounded-3xl p-4 shadow-sm border border-slate-100 flex flex-col h-full transition-all duration-300 {{ $isPO && $isClosed ? 'opacity-75 grayscale-[0.5]' : 'hover:shadow-md' }}">
                    
                    <div class="relative w-full aspect-[4/3] mb-4 rounded-2xl overflow-hidden bg-slate-100">
                        @if($imageSrc)
                            <img src="{{ $imageSrc }}" 
                                 class="w-full h-full object-cover transition-transform duration-500 {{ $isPO && $isClosed ? 'grayscale opacity-70' : 'hover:scale-105' }}" 
                                 alt="{{ $product->name }}">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-slate-400 text-sm font-medium">
                                Tidak Ada Gambar
                            </div>
                        @endif

                        @if($isPO && $isClosed)
                            <div class="absolute inset-0 flex items-center justify-center z-10 bg-brand-pantone-ruined-smores/10">
                                <div class="bg-brand-pantone-ruined-smores/80 text-white text-[10px] font-bold px-3 py-1.5 rounded-full flex items-center gap-1.5 backdrop-blur-sm shadow-sm uppercase tracking-widest">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                    CLOSED
                                </div>
                            </div>
                        @endif

                        @if(!($isPO && $isClosed))
                            <div class="absolute top-3 left-3 bg-brand-pantone-white/95 px-3 py-1 rounded-full text-[10px] font-extrabold text-brand-deep-forest uppercase tracking-wider shadow-sm z-20">
                                Stok: {{ $product->stock }}
                            </div>
                        @endif
                    </div>

                    <div class="flex-1 flex flex-col relative z-20">
                        <h5 class="text-lg font-bold text-brand-deep-forest mb-1 leading-tight">{{ $product->name }}</h5>
                        
                        <p class="text-xs text-slate-500 mb-5 line-clamp-2 leading-relaxed">{{ Str::limit($product->description, 100) }}</p>
                        
                        <div class="mt-auto flex items-center justify-between pt-2 border-t border-slate-50">
                            <span class="font-bold text-brand-deep-forest text-lg">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            
                            @if($isPO && $isClosed)
                                <div class="w-8 h-8 flex items-center justify-center bg-slate-100 text-slate-400 rounded-full shadow-sm cursor-not-allowed" title="Slot PO Ditutup">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                            @else
                                <!-- 🛠️ UPDATE: Membungkus tombol kapsul plus-minus terintegrasi session di dalam katalog grid -->
                                <form action="{{ route('cart.add') }}" method="POST" class="m-0 p-0 relative z-20">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="id" value="{{ $product->id }}">

                                    @if(session('cart') && isset(session('cart')[$product->id]))
                                        <div class="flex items-center border border-slate-200 rounded-full bg-slate-50 overflow-hidden h-8 shadow-sm relative z-20 font-bold text-slate-400 text-sm">
                                            <button type="submit" formaction="{{ route('cart.decrease') }}" class="w-8 h-8 flex items-center justify-center hover:text-brand-emerald-950 hover:bg-slate-200 transition-colors cursor-pointer">-</button>
                                            <span class="w-8 text-center text-xs font-black text-brand-emerald-950 select-none">{{ session('cart')[$product->id]['quantity'] }}</span>
                                            <button type="submit" formaction="{{ route('cart.add') }}" class="w-8 h-8 flex items-center justify-center hover:text-brand-emerald-950 hover:bg-slate-200 transition-colors cursor-pointer">+</button>
                                        </div>
                                    @else
                                        <button type="submit" class="w-8 h-8 flex items-center justify-center bg-brand-pantone-gold-cream hover:bg-brand-pantone-dark-gold text-white rounded-full transition-colors shadow-sm cursor-pointer" title="Tambah ke Keranjang">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                                            </svg>
                                        </button>
                                    @endif
                                </form>
                            @endif
                            
                        </div>
                    </div>

                </div>
            @empty
                <div class="col-span-full flex flex-col items-center justify-center py-16 text-center">
                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-sm mb-4">
                        <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-brand-deep-forest">Menu Belum Tersedia</h3>
                    <p class="text-slate-500 mt-2">Belum ada produk kuliner yang ditambahkan ke dalam katalog.</p>
                </div>
            @endforelse
        </div>

    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const filterBtns = document.querySelectorAll('.filter-btn');
        const items = document.querySelectorAll('.menu-item');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                filterBtns.forEach(b => {
                    b.classList.remove('bg-brand-deep-forest', 'text-white');
                    b.classList.add('bg-white', 'text-brand-deep-forest');
                });
                
                btn.classList.remove('bg-white', 'text-brand-deep-forest');
                btn.classList.add('bg-brand-deep-forest', 'text-white');

                const filter = btn.dataset.filter;

                items.forEach(item => {
                    if (filter === 'all' || item.dataset.category === filter) {
                        item.style.display = 'flex'; 
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
@endsection