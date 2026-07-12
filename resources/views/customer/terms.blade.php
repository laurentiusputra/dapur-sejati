<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms of Service - Dapur Sejati</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f4ebd0] text-slate-800 min-h-screen font-sans antialiased">
    <section class="py-12 sm:py-16">
        <div class="max-w-4xl mx-auto px-6 relative z-10">
            
            <!-- Tombol Kembali ke Beranda -->
            <a href="{{ url('/') }}" class="inline-flex items-center text-brand-deep-forest/60 hover:text-brand-deep-forest transition-colors mb-10 text-sm font-medium">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Home Page
            </a>

            <!-- Header Judul -->
            <div class="mb-10">
                <h1 class="text-3xl sm:text-4xl font-heading font-black text-brand-deep-forest tracking-tight">Terms of Service.</h1>
                <p class="text-brand-deep-forest/70 mt-2 text-sm sm:text-base">Syarat dan Ketentuan Layanan Dapur Sejati</p>
            </div>

            <!-- Konten -->
            <div class="bg-white rounded-3xl p-8 sm:p-12 shadow-sm border border-slate-100 prose prose-slate max-w-none prose-headings:text-brand-deep-forest prose-a:text-brand-pantone-gold-cream">
                <h3 class="font-bold text-lg mb-3">1. Regulasi Operasional Tiga Klasifikasi Menu Pemesanan</h3>
                <p class="text-sm text-slate-600 mb-6 leading-relaxed">
                    Sistem pemesanan makanan katering Dapur Sejati dibagi menjadi tiga kategori utama dengan ketentuan mengikat sebagai berikut:
                    <br>• <strong>Daily Special Menu:</strong> Merupakan hidangan harian siap saji yang diproduksi setiap hari. Dapat dipesan secara instan tanpa perlu mengikuti sistem antrean gelombang.
                    <br>• <strong>Weekend Pre-Order (PO):</strong> Merupakan hidangan batch mingguan eksklusif. Alokasi kuota bersifat terbatas dan sistem backend berhak mengubah status produk menjadi terkunci ("CLOSED") sewaktu-waktu secara otomatis jika kapasitas dapur internal telah terpenuhi.
                    <br>• <strong>Special Custom Order:</strong> Ditujukan untuk keperluan acara berskala besar (partai besar 1000 hingga 3000 porsi) atau permintaan menu kustom di luar jadwal rutin, di mana validitas pesanan baru dianggap sah setelah melalui kesepakatan tertulis bersama manajemen via WhatsApp Business resmi kami.
                </p>

                <h3 class="font-bold text-lg mb-3">2. Kebijakan Keamanan Panel & Larangan Akses Ilegal (Stealth Security)</h3>
                <p class="text-sm text-slate-600 mb-6 leading-relaxed">
                    Area dashboard manajemen internal toko telah dilindungi oleh gerbang keamanan berlapis khusus (Stealth Security Middleware) dan diisolasi sepenuhnya dari akses publik. Pengguna umum, tamu (guest), atau pelanggan retail biasa tidak memiliki hak atau wewenang untuk membuka area tersebut. Segala bentuk tindakan manipulasi URL, pencobaan bypass rute login, atau eksploitasi otorisasi tanpa verifikasi hak akses admin resmi (role superadmin) akan memicu pemblokiran otomatis oleh sistem keselamatan server (403 Forbidden Response) atau dialihkan secara paksa ke halaman beranda utama.
                </p>

                <h3 class="font-bold text-lg mb-3">3. Sistem Pembatalan, Pengiriman, & Pengembalian Dana (Refund)</h3>
                <p class="text-sm text-slate-600 mb-6 leading-relaxed">
                    Semua pesanan yang telah dikonfirmasi dan masuk ke dalam antrean produksi aktif (Daily Menu maupun Batch PO yang sedang berjalan) bersifat final dan tidak dapat dibatalkan atau dikembalikan dananya (Non-Refundable). Untuk kategori Special Custom Order partai besar, aturan uang muka (down payment) diatur terpisah saat nota transaksi diterbitkan. Tanggung jawab fisik atas kualitas hidangan berpindah sepenuhnya kepada pembeli terhitung sejak makanan diserahterimakan kepada pihak kurir logistik pengirim pihak ketiga.
                </p>
            </div>
        </div>
    </section>
</body>
</html>