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
                <h3 class="font-bold text-lg mb-3">1. Sistem Pre-Order (PO) & Pemesanan</h3>
                <p class="text-sm text-slate-600 mb-6 leading-relaxed">
                    Pemesanan produk kami pada kategori "Pre-Order Special Menu" mengikuti sistem *batch* (gelombang) mingguan. Kuota bersifat terbatas dan pemesanan hanya dianggap valid setelah proses pembayaran dan konfirmasi melalui admin kami selesai. Dapur Sejati berhak menutup *batch* PO lebih awal jika kuota penuh.
                </p>

                <h3 class="font-bold text-lg mb-3">2. Pengiriman & Pengambilan</h3>
                <p class="text-sm text-slate-600 mb-6 leading-relaxed">
                    Produk akan disiapkan dan dikirim (atau siap diambil di alamat dapur kami) pada hari dan jam yang telah disepakati bersama. Segala bentuk keterlambatan atau kerusakan yang disebabkan oleh layanan kurir pihak ketiga berada di luar tanggung jawab langsung Dapur Sejati, namun kami akan membantu proses mediasi sebaik mungkin.
                </p>

                <h3 class="font-bold text-lg mb-3">3. Pembatalan (Refund Policy)</h3>
                <p class="text-sm text-slate-600 mb-6 leading-relaxed">
                    Pembatalan pesanan untuk *Daily Menu* atau *PO* tidak dapat dilakukan jika proses produksi bahan baku (H-1) telah dimulai. Untuk "Special Custom Order" partai besar, kebijakan uang muka (*down payment*) dan pengembalian dana akan didiskusikan secara terpisah saat kesepakatan order dilakukan.
                </p>
            </div>
        </div>
    </section>
</body>
</html>