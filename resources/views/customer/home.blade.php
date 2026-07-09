@extends('customer.layouts.app')

@section('title', 'Katalog Pre-Order')

@section('content')

    <section id="home" class="relative overflow-hidden bg-brand-emerald-950 w-full min-h-screen flex items-center isolate">
        
        <div class="absolute inset-0 -z-10 pointer-events-none select-none">
            <div id="slide-layer-0" class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-100">
                <img src="{{ asset('img/bg/ayam-bakar-bg.webp') }}" alt="Background Ayam Bakar" class="w-full h-full object-cover opacity-65">
            </div>
            <div id="slide-layer-1" class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0">
                <img src="{{ asset('img/bg/dimsum-keju-moza.webp') }}" alt="Background Dimsum" class="w-full h-full object-cover opacity-65">
            </div>
            <div id="slide-layer-2" class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0">
                <img src="{{ asset('img/bg/ayam-pamersan.webp') }}" alt="Background Batagor" class="w-full h-full object-cover opacity-65">
            </div>
        </div>

        <div class="absolute inset-0 bg-gradient-to-r from-brand-emerald-950/95 via-brand-emerald-950/40 to-transparent -z-10 pointer-events-none"></div>

        <div class="max-w-6xl w-full mx-auto px-6 grid grid-cols-1 md:grid-cols-12 gap-8 items-center relative z-10 pt-[120px] pb-20">
            
            <div class="md:col-span-8 space-y-6 min-h-[420px] flex flex-col justify-center">
                
                <div class="relative w-full h-6 mb-2">
                    <div id="badge-content-0" class="absolute inset-0 transition-opacity duration-700 ease-in-out opacity-100 z-20">
                        <div class="inline-flex items-center gap-2 bg-white/20 text-[#ca9651] text-xs font-bold px-3 py-1 rounded-md border border-white/10">
                            <span>Welcome to Dapur Sejati An Authentic Homemade Food & Dessert</span>
                        </div>
                    </div>
                    <div id="badge-content-1" class="absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 z-10 pointer-events-none">
                        <div class="inline-flex items-center gap-2 bg-white/20 text-brand-velvet-800 text-xs font-bold px-3 py-1 rounded-md border border-white/10">
                            <span>🌶️ OPEN PO WEEKLY: SPICY CHICKEN RISOL ACTIVE</span>
                        </div>
                    </div>
                    <div id="badge-content-2" class="absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 z-10 pointer-events-none">
                        <div class="inline-flex items-center gap-2 bg-white/20 text-[#ca9651] text-xs font-bold px-3 py-1 rounded-md border border-white/10">
                            <span>🥟 OPEN PO WEEKLY: BATAGOR KUAH SPESIAL PAK NO</span>
                        </div>
                    </div>
                </div>
                
                <h1 class="text-4xl sm:text-6xl font-heading text-brand-pantone-gold-cream font-bold leading-tight select-none">
                    Kehangatan Rasa <br>
                    Dari Dapur Ke <span class="text-brand-pantone-gold-cream "><br>Meja Makanmu</span>
                </h1>

                <div class="relative w-full h-36">
                    
                    <div id="text-content-0" class="absolute inset-0 space-y-4 transition-opacity duration-700 ease-in-out opacity-100 z-20">
                        <p class="text-brand-pantone-white text-base sm:text-lg max-w-xl leading-relaxed opacity-90">
                            Hidangan pre-order pilihan yang diolah bersih dari bahan organik segar lokal. Dibuat eksklusif tanpa pengawet untuk menjaga kualitas rasa premium.
                        </p>
                        <div class="pt-2">
                            <a href="{{ route('menu') }}" class="bg-brand-pantone-gold-flake hover:bg-brand-pantone-gold-flake/90 text-white font-black py-3.5 px-8 rounded-full shadow-lg shadow-brand-pantone-gold-flake/30 text-sm tracking-wider uppercase inline-flex items-center gap-2">
                                Explore Menu PO 👇
                            </a>
                        </div>
                    </div>

                    <div id="text-content-1" class="absolute inset-0 space-y-4 transition-opacity duration-700 ease-in-out opacity-0 z-10 pointer-events-none">
                        <p class="text-brand-pantone-white text-base sm:text-lg max-w-xl leading-relaxed opacity-90">
                            Risol premium isi ayam suwir pedas melimpah, digoreng garing hangat. Slot terbatas minggu ini, amankan porsimu sekarang!
                        </p>
                        <div class="pt-2">
                            <a href="{{ route('menu') }}?item=risol" class="bg-brand-pantone-gold-flake hover:bg-brand-pantone-gold-flake/90 text-white font-black py-3.5 px-8 rounded-full shadow-lg shadow-brand-pantone-gold-flake/30 text-sm tracking-wider uppercase inline-flex items-center gap-2">
                                Order Risol PO Now 🍗
                            </a>
                        </div>
                    </div>

                    <div id="text-content-2" class="absolute inset-0 space-y-4 transition-opacity duration-700 ease-in-out opacity-0 z-10 pointer-events-none">
                        <p class="text-brand-pantone-white text-base sm:text-lg max-w-xl leading-relaxed opacity-90">
                            Batagor ikan tenggiri asli dengan kuah kaldu hangat khas Semarang. Segar, gurih, dan siap diantar langsung ke rumahmu.
                        </p>
                        <div class="pt-2">
                            <a href="{{ route('menu') }}?item=batagor" class="bg-brand-pantone-gold-flake hover:bg-brand-pantone-gold-flake/90 text-white font-black py-3.5 px-8 rounded-full shadow-lg shadow-brand-pantone-gold-flake/30 text-sm tracking-wider uppercase inline-flex items-center gap-2">
                                Order Batagor PO Now 🥣
                            </a>
                        </div>
                    </div>

                </div>

                <div class="flex gap-2 pt-6">
                    <span id="dot-0" class="w-2 h-2 rounded-full bg-white transition-all duration-300 cursor-pointer"></span>
                    <span id="dot-1" class="w-2 h-2 rounded-full bg-white/40 transition-all duration-300 cursor-pointer"></span>
                    <span id="dot-2" class="w-2 h-2 rounded-full bg-white/40 transition-all duration-300 cursor-pointer"></span>
                </div>
            </div>

        </div>
    </section>

    @include('customer.menu')
    
    <!-- =========================================================================
         📌 SECTION REVIEW DI HALAMAN HOME (PREVIEW)
         ========================================================================= -->
    <section class="bg-[#f4ebd0] pt-8 pb-20 text-slate-800 relative overflow-hidden">
        
        <!-- Garis Pemisah Konsisten dengan Menu -->
        <div class="max-w-5xl mx-auto border-t border-brand-emerald-950/15 relative z-10 mb-20"></div>

        <div class="max-w-5xl mx-auto px-6 relative z-10 space-y-12">
            
            <div class="text-center">
                <div class="inline-flex items-center gap-2 bg-brand-emerald-950/10 text-brand-emerald-950 text-[11px] font-black px-4 py-1.5 rounded-full uppercase tracking-widest mb-3">
                    💬 Customer Testimonials
                </div>
                <h2 class="text-3xl sm:text-4xl font-heading font-black text-brand-emerald-950 tracking-tight">Apa Kata Mereka?</h2>
            </div>

            <!-- Preview 3 Review Teratas -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-1 text-[#dfc365] mb-3 text-sm">⭐⭐⭐⭐⭐</div>
                        <p class="text-slate-600 text-xs leading-relaxed italic">"Risol ayam spicy-nya bener-bener juara mas! Isian ayam suwirnya melimpah banget dan pedasnya pas di lidah."</p>
                    </div>
                    <div class="flex items-center gap-3 mt-6 pt-4 border-t border-slate-50">
                        <div class="w-9 h-9 rounded-full bg-[#dfc365]/30 flex items-center justify-center font-bold text-brand-emerald-950 text-xs">LN</div>
                        <div>
                            <h4 class="text-xs font-bold text-slate-950 tracking-tight">Laurentius N.</h4>
                            <p class="text-[10px] text-slate-400">Pelanggan Setia Daily</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-1 text-[#dfc365] mb-3 text-sm">⭐⭐⭐⭐⭐</div>
                        <p class="text-slate-600 text-xs leading-relaxed italic">"Dua jempol buat Dimsum Mentai-nya! Sausnya creamy gurih tebel banget, daging aslinya berasa banget."</p>
                    </div>
                    <div class="flex items-center gap-3 mt-6 pt-4 border-t border-slate-50">
                        <div class="w-9 h-9 rounded-full bg-[#dfc365]/30 flex items-center justify-center font-bold text-brand-emerald-950 text-xs">VS</div>
                        <div>
                            <h4 class="text-xs font-bold text-slate-950 tracking-tight">Vincent S.</h4>
                            <p class="text-[10px] text-slate-400">Penikmat Weekend PO</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 flex flex-col justify-between hidden md:flex">
                    <div>
                        <div class="flex items-center gap-1 text-[#dfc365] mb-3 text-sm">⭐⭐⭐⭐⭐</div>
                        <p class="text-slate-600 text-xs leading-relaxed italic">"Request menu katering partai besar, pelayanannya ramah banget, pengiriman tepat waktu, dan makanannya masih hangat."</p>
                    </div>
                    <div class="flex items-center gap-3 mt-6 pt-4 border-t border-slate-50">
                        <div class="w-9 h-9 rounded-full bg-[#dfc365]/30 flex items-center justify-center font-bold text-brand-emerald-950 text-xs">ST</div>
                        <div>
                            <h4 class="text-xs font-bold text-slate-950 tracking-tight">Stefani T.</h4>
                            <p class="text-[10px] text-slate-400">Acara Custom Order</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol Redirect ke Halaman Review Penuh -->
            <div class="text-center mt-8">
                <a href="{{ route('review') }}" class="inline-flex items-center justify-center bg-[#dfc365] hover:bg-brand-emerald-950 text-brand-emerald-950 hover:text-white font-black py-3.5 px-10 rounded-full shadow-lg shadow-[#dfc365]/20 hover:scale-105 transition-all duration-200 text-xs tracking-widest uppercase cursor-pointer">
                    Lihat Semua Ulasan & Tulis Review ✍️
                </a>
            </div>

        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // 🛠️ DITAMBAHKAN KONTEKS WARNA HEX YANG PAS MENGIKUTI KEINDAHAN SETIAP FOTO
            const slides = [
                { color: '#0f2922' }, // Slide 0: Hijau Papan Kayu Ayam Bakar Terang (#0f2922)
                { color: '#1a100f' }, // Slide 1: Merah Velvet Marun Gelap Dimsum Keju (#1a100f)
                { color: '#073228' }  // Slide 2: Emerald Segar Alami Batagor/Parmesan (#073228)
            ];

            let currentIndex = 0;
            const totalSlides = 3;
            const mainNav = document.getElementById('main-nav');

            function changeSlide(nextIndex) {
                // UPDATE VARIABEL CSS DI NAVBAR UTAMA AGAR WARNA TERKUNCI MATI SECARA HALUS
                if (mainNav) {
                    mainNav.style.setProperty('--nav-bg', slides[nextIndex].color);
                    
                    // Jika saat ganti slide posisi user ada di paling atas (tidak sedang floating)
                    if (mainNav.dataset.floating !== "true") {
                        mainNav.style.backgroundColor = slides[nextIndex].color;
                    }
                }

                for (let i = 0; i < totalSlides; i++) {
                    const bgLayer = document.getElementById(`slide-layer-${i}`);
                    const badgeContent = document.getElementById(`badge-content-${i}`);
                    const textContent = document.getElementById(`text-content-${i}`);
                    const dot = document.getElementById(`dot-${i}`);
                    
                    if (i === nextIndex) {
                        bgLayer.classList.replace('opacity-0', 'opacity-100');
                        
                        badgeContent.classList.replace('opacity-0', 'opacity-100');
                        badgeContent.classList.remove('pointer-events-none');
                        badgeContent.classList.add('z-20');
                        
                        textContent.classList.replace('opacity-0', 'opacity-100');
                        textContent.classList.remove('pointer-events-none');
                        textContent.classList.add('z-20');
                        
                        dot.classList.remove('bg-white/40');
                        dot.classList.add('bg-white', 'w-4');
                    } else {
                        bgLayer.classList.replace('opacity-100', 'opacity-0');
                        
                        badgeContent.classList.replace('opacity-100', 'opacity-0');
                        badgeContent.classList.add('pointer-events-none');
                        badgeContent.classList.remove('z-20');
                        
                        textContent.classList.replace('opacity-100', 'opacity-0');
                        textContent.classList.add('pointer-events-none');
                        textContent.classList.remove('z-20');
                        
                        dot.classList.remove('bg-white', 'w-4');
                        dot.classList.add('bg-white/40');
                    }
                }
                currentIndex = nextIndex;
            }

            // Jalankan inisialisasi warna pertama kali saat load awal
            if (mainNav) {
                mainNav.style.setProperty('--nav-bg', slides[0].color);
                mainNav.style.backgroundColor = slides[0].color;
            }

            let slideInterval = setInterval(() => {
                let next = (currentIndex + 1) % totalSlides;
                changeSlide(next);
            }, 7000);

            for (let i = 0; i < totalSlides; i++) {
                document.getElementById(`dot-${i}`).addEventListener('click', () => {
                    clearInterval(slideInterval);
                    changeSlide(i);
                    slideInterval = setInterval(() => {
                        let next = (currentIndex + 1) % totalSlides;
                        changeSlide(next);
                    }, 7000);
                });
            }

            document.getElementById('dot-0').classList.add('w-4');

            // --- SCRIPT NAVBAR SCROLL ORIGINAL DEFAULUT ---
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('.nav-link');

            window.addEventListener('scroll', () => {
                let currentSectionId = 'home';
                
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    if (window.pageYOffset >= (sectionTop - 140)) {
                        currentSectionId = section.getAttribute('id');
                    }
                });

                navLinks.forEach(link => {
                    link.classList.remove('text-brand-light', 'border-b-2', 'border-brand-light');
                    link.classList.add('text-white/80');
                    
                    if (link.getAttribute('href') === `#${currentSectionId}`) {
                        link.classList.remove('text-white/80');
                        link.classList.add('text-brand-light', 'border-b-2', 'border-brand-light');
                    }
                });
            });
        });
    </script>
@endsection