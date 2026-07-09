@extends('customer.layouts.app')

@section('title', 'Ulasan Pelanggan')

@section('content')
<!-- =========================================================================
     📌 SECTION UTAMA HALAMAN REVIEW (Warna Selaras Dengan Katalog Menu)
     ========================================================================= -->
<section class="bg-[#f4ebd0] py-24 text-slate-800 relative overflow-hidden min-h-screen">
    
    <!-- =========================================================================
         🧂 DEKORASI CANVAS UTUH (Berada di Belakang Card - Tanpa Animasi / Anti-Lag)
         ========================================================================= -->
    <div class="hidden xl:block absolute inset-0 pointer-events-none select-none z-0">
        <!-- 🧄 Bawang Putih (Kiri Atas) -->
        <div class="absolute top-[8%] left-[5%] text-brand-emerald-950/[0.05] scale-110 rotate-12">
            <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2s-1 .5-2 2.5C9 3 7.5 3 6.5 4.5 5.5 5.5 5 7 5.5 9c-1 1-1.5 2.5-1.5 4 0 4 3.5 7 8 7s8-3 8-7c0-1.5-.5-3-1.5-4 .5-2 0-3.5-1-4.5C16.5 3 15 3 14 4.5 13 2.5 12 2zM9.5 8c.5-1 1.5-2 2.5-2s2 1 2.5 2v4h-5V8z"/>
            </svg>
        </div>
        <!-- 🌿 Daun Rosemary (Kanan Atas) -->
        <div class="absolute top-[12%] right-[6%] text-brand-emerald-950/[0.05] scale-95 -rotate-45">
            <svg class="w-14 h-14" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v18M12 7c2-1 4-1 5-3M12 11c2-1 4 0 6 2M12 15c3-1 5 1 5 3M12 9c-2-1-4-1-5-3M12 13c-2-1-4 0-6 2M12 17c-3-1-5 1-5 3"/>
            </svg>
        </div>
        <!-- 🌶️ Cabai Rawit (Kiri Tengah Bawah) -->
        <div class="absolute top-[55%] left-[4%] text-brand-emerald-950/[0.05] scale-105 -rotate-12">
            <svg class="w-14 h-14" fill="currentColor" viewBox="0 0 24 24">
                <path d="M18.3 4.2c-.4-.5-1.2-.5-1.6 0l-1.4 1.4C12.5 4.3 9 4.8 6.6 7c-3.3 3-3.7 8.2-1 11.7.5.6 1.4.5 1.8-.1l1.1-1.4c-.9-1.5-.7-3.4.5-4.8 1.4-1.5 3.8-1.5 5.2-.1l1.4-1.4c.5-.4.5-1.2 0-1.6l1.4-1.4s1.2-.4 1.8-1.2c.5-.7.5-1.7-.5-2.6z"/>
            </svg>
        </div>
        <!-- 🍅 Potongan Tomat (Kanan Tengah Bawah) -->
        <div class="absolute top-[60%] right-[5%] text-brand-emerald-950/[0.05] scale-100 rotate-45">
            <svg class="w-14 h-14" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="9" stroke-linecap="round"/>
                <path stroke-linecap="round" d="M12 3v18M3 12h18M7.5 7.5l9 9M16.5 7.5l-9 9"/>
            </svg>
        </div>
    </div>

    <!-- Container Utama (Dipaksa z-10 Agar Berada di Depan Ornamen Hiasan) -->
    <div class="max-w-5xl mx-auto px-6 relative z-10 space-y-16">
        
        <!-- Header Judul -->
        <div class="text-center">
            <div class="inline-flex items-center gap-2 bg-brand-emerald-950/10 text-brand-emerald-950 text-[11px] font-black px-4 py-1.5 rounded-full uppercase tracking-widest mb-3">
                💬 Customer Testimonials
            </div>
            <h2 class="text-3xl sm:text-4xl font-heading font-black text-brand-emerald-950 tracking-tight">Apa Kata Mereka?</h2>
            <p class="text-emerald-950/70 mt-2 text-sm sm:text-base max-w-md mx-auto">Ulasan jujur dari para penikmat hidangan premium Pre-Order Dapur Sejati.</p>
        </div>

        <!-- =========================================================================
             ⭐ GRID CARD REVIEW (Layout Rapih, Sejajar, & Bebas Overlapping)
             ========================================================================= -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Review 1 -->
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 flex flex-col justify-between relative z-10">
                <div>
                    <div class="flex items-center gap-1 text-[#dfc365] mb-3 text-sm">
                        ⭐⭐⭐⭐⭐
                    </div>
                    <p class="text-slate-600 text-xs leading-relaxed italic">"Risol ayam spicy-nya bener-bener juara mas! Isian ayam suwirnya melimpah banget dan pedasnya pas di lidah, gak bikin serak. Kulitnya juga krispi tahan lama."</p>
                </div>
                <div class="flex items-center gap-3 mt-6 pt-4 border-t border-slate-50">
                    <div class="w-9 h-9 rounded-full bg-[#dfc365]/30 flex items-center justify-center font-bold text-brand-emerald-950 text-xs">
                        LN
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-slate-950 tracking-tight">Laurentius N.</h4>
                        <p class="text-[10px] text-slate-400">Pelanggan Setia Daily</p>
                    </div>
                </div>
            </div>

            <!-- Review 2 -->
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 flex flex-col justify-between relative z-10">
                <div>
                    <div class="flex items-center gap-1 text-[#dfc365] mb-3 text-sm">
                        ⭐⭐⭐⭐⭐
                    </div>
                    <p class="text-slate-600 text-xs leading-relaxed italic">"Dua jempol buat Dimsum Mentai-nya! Sausnya creamy gurih tebel banget, terus pas dimakan dimsumnya berasa banget daging aslinya, bukan tepung doang. Fix bakal langganan terus sih."</p>
                </div>
                <div class="flex items-center gap-3 mt-6 pt-4 border-t border-slate-50">
                    <div class="w-9 h-9 rounded-full bg-[#dfc365]/30 flex items-center justify-center font-bold text-brand-emerald-950 text-xs">
                        VS
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-slate-950 tracking-tight">Vincent S.</h4>
                        <p class="text-[10px] text-slate-400">Penikmat Weekend PO</p>
                    </div>
                </div>
            </div>

            <!-- Review 3 -->
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 flex flex-col justify-between relative z-10">
                <div>
                    <div class="flex items-center gap-1 text-[#dfc365] mb-3 text-sm">
                        ⭐⭐⭐⭐⭐
                    </div>
                    <p class="text-slate-600 text-xs leading-relaxed italic">"Kemarin nyobain request menu katering partai besar buat acara syukuran keluarga, pelayanannya ramah banget, pengiriman tepat waktu, dan makanannya masih hangat pas sampai rumah."</p>
                </div>
                <div class="flex items-center gap-3 mt-6 pt-4 border-t border-slate-50">
                    <div class="w-9 h-9 rounded-full bg-[#dfc365]/30 flex items-center justify-center font-bold text-brand-emerald-950 text-xs">
                        ST
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-slate-950 tracking-tight">Stefani T.</h4>
                        <p class="text-[10px] text-slate-400">Acara Custom Order</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Form Singkat Kirim Kritik/Saran (Opsional Biar Lebih Interaktif) -->
        <div class="max-w-xl mx-auto bg-white rounded-3xl p-6 shadow-sm border border-slate-100 relative z-10">
            <h3 class="text-sm font-bold text-slate-950 tracking-tight mb-1 text-center">Punya Masukan Bagus?</h3>
            <p class="text-[11px] text-slate-400 text-center mb-4">Kritik dan saran lo bener-bener berharga banget buat ningkatikin kualitas masakan dapur kami.</p>
            
            <form action="#" method="POST" class="space-y-3" onsubmit="event.preventDefault();">
                <div>
                    <input type="text" placeholder="Nama Lengkap Anda" class="w-full text-xs px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:outline-none focus:border-[#dfc365] transition-colors">
                </div>
                <div>
                    <textarea rows="3" placeholder="Tulis ulasan masakan Anda disini..." class="w-full text-xs px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:outline-none focus:border-[#dfc365] transition-colors resize-none"></vtextarea>
                </div>
                <button type="button" class="w-full bg-[#dfc365] hover:bg-brand-emerald-950 text-brand-emerald-950 hover:text-white font-black py-2.5 rounded-xl text-[11px] tracking-widest uppercase transition-colors cursor-pointer">
                    Kirim Ulasan 🚀
                </button>
            </form>
        </div>

    </div>
</section>
@endsection