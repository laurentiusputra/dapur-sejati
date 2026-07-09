
<section id="about" class="relative overflow-hidden bg-brand-pantone-dark-gold w-full py-24 text-emerald-950 min-h-screen flex items-center">
    
    <div class="max-w-6xl w-full mx-auto px-6 grid grid-cols-1 md:grid-cols-12 gap-12 items-center relative z-10">
        
        <div class="md:col-span-6 space-y-6">
            <div class="inline-flex items-center gap-2 bg-emerald-950/10 text-emerald-950 text-xs font-bold px-3 py-1 rounded-md border border-emerald-950/20">
                <span id="story-tag">Our Packaging Story</span>
            </div>
            <h2 class="text-4xl sm:text-5xl font-heading font-bold text-brand-matcha-950 leading-tight">
                Cerita <span class="underline decoration-brand-orange decoration-wavy">Dapur Sejati</span>
            </h2>
            
            <div class="relative h-40 overflow-hidden text-emerald-900/90 text-base sm:text-lg leading-relaxed">
                <p id="story-desc" class="absolute inset-0 transition-all duration-700 transform translate-y-0 opacity-100">
                    Berawal dari kecintaan menyajikan masakan rumah yang sehat dan higienis di Semarang, Dapur Sejati hadir dengan konsep sistem Pre-Order untuk memastikan setiap porsi makanan dimasak segar di hari yang sama.
                </p>
            </div>
        </div>

        <div class="md:col-span-6 flex justify-center items-center h-[450px] relative">
            
            <div id="card-packaging" class="absolute w-72 h-96 bg-white rounded-3xl shadow-2xl p-4 transition-all duration-1000 ease-in-out z-30 transform scale-100 translate-x-0 translate-y-0 rotate-0">
                <div class="w-full h-[82%] bg-slate-100 rounded-2xl overflow-hidden relative">
                    <img src="{{ asset('img/about/packaging.jpg') }}" alt="Premium Packaging" class="w-full h-full object-cover">
                    <div class="absolute bottom-2 left-2 bg-brand-orange text-white text-[10px] font-bold px-2 py-0.5 rounded">Eksklusif</div>
                </div>
                <div class="mt-4">
                    <h4 class="font-heading font-bold text-lg text-emerald-950">Premium Eco-Box</h4>
                    <p class="text-xs text-emerald-900/60">Packaging aman, rapi, dan menjaga makanan tetap hangat.</p>
                </div>
            </div>

            <div id="card-kitchen" class="absolute w-72 h-96 bg-white rounded-3xl shadow-xl p-4 transition-all duration-1000 ease-in-out z-20 transform scale-90 translate-x-12 -translate-y-6 rotate-3 opacity-90">
                <div class="w-full h-[82%] bg-slate-200 rounded-2xl overflow-hidden">
                    <img src="{{ asset('img/about/kitchen.jpg') }}" alt="Hygienic Kitchen" class="w-full h-full object-cover">
                </div>
                <div class="mt-4">
                    <h4 class="font-heading font-bold text-lg text-emerald-950">Dapur Higienis</h4>
                    <p class="text-xs text-emerald-900/60">Proses memasak bersih dengan standard sanitasi tinggi.</p>
                </div>
            </div>

            <div id="card-owner" class="absolute w-72 h-96 bg-white rounded-3xl shadow-lg p-4 transition-all duration-1000 ease-in-out z-10 transform scale-80 -translate-x-12 translate-y-6 -rotate-3 opacity-70">
                <div class="w-full h-[82%] bg-slate-300 rounded-2xl overflow-hidden">
                    <img src="{{ asset('img/about/owner.jpg') }}" alt="Our Passionate Cooks" class="w-full h-full object-cover">
                </div>
                <div class="mt-4">
                    <h4 class="font-heading font-bold text-lg text-emerald-950">Dibuat dengan Hati</h4>
                    <p class="text-xs text-emerald-900/60">Diracik langsung oleh tangan owner menjaga cita rasa otentik.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cardPackaging = document.getElementById('card-packaging');
        const cardKitchen = document.getElementById('card-kitchen');
        const cardOwner = document.getElementById('card-owner');
        
        const storyTag = document.getElementById('story-tag');
        const storyDesc = document.getElementById('story-desc');

        // Data teks detail pendukung perpindahan kartu
        const details = [
            {
                tag: "Our Packaging Story",
                desc: "Berawal dari kecintaan menyajikan masakan rumah yang sehat dan higienis di Semarang, Dapur Sejati hadir dengan konsep sistem Pre-Order untuk memastikan setiap porsi makanan dimasak segar di hari yang sama."
            },
            {
                tag: "Our Kitchen Standard",
                desc: "Setiap bumbu diracik murni tanpa pengawet buatan di dalam dapur yang selalu terjaga kebersihannya. Kami percaya dapur yang rapi melahirkan masakan yang membawa berkah kebaikan bagi yang menyantapnya."
            },
            {
                tag: "Our Passion & Love",
                desc: "Dapur Sejati bukan sekadar bisnis kuliner biasa, melainkan perwujudan resep legendaris keluarga yang dimasak penuh ketulusan hati demi menjaga standar rasa premium yang otentik di setiap suapan."
            }
        ];

        let currentStep = 0;

        function rotateCards() {
            currentStep = (currentStep + 1) % 3;

            // Efek transisi teks memudar halus (Cross-fade)
            storyDesc.classList.add('opacity-0', 'translate-y-4');
            setTimeout(() => {
                storyTag.innerText = details[currentStep].tag;
                storyDesc.innerText = details[currentStep].desc;
                storyDesc.classList.remove('opacity-0', 'translate-y-4');
            }, 500);

            // Pergeseran Gaya / Posisi CSS Layer secara Berputar (State Machine Animation)
            if (currentStep === 0) {
                // Packaging di depan
                setCardState(cardPackaging, "z-30 scale-100 translate-x-0 translate-y-0 rotate-0 opacity-100");
                setCardState(cardKitchen, "z-20 scale-90 translate-x-12 -translate-y-6 rotate-3 opacity-90");
                setCardState(cardOwner, "z-10 scale-80 -translate-x-12 translate-y-6 -rotate-3 opacity-70");
            } else if (currentStep === 1) {
                // Kitchen maju ke depan
                setCardState(cardKitchen, "z-30 scale-100 translate-x-0 translate-y-0 rotate-0 opacity-100");
                setCardState(cardOwner, "z-20 scale-90 translate-x-12 -translate-y-6 rotate-3 opacity-90");
                setCardState(cardPackaging, "z-10 scale-80 -translate-x-12 translate-y-6 -rotate-3 opacity-70");
            } else {
                // Owner maju ke depan
                setCardState(cardOwner, "z-30 scale-100 translate-x-0 translate-y-0 rotate-0 opacity-100");
                setCardState(cardPackaging, "z-20 scale-90 translate-x-12 -translate-y-6 rotate-3 opacity-90");
                setCardState(cardKitchen, "z-10 scale-80 -translate-x-12 translate-y-6 -rotate-3 opacity-70");
            }
        }

        function setCardState(element, classes) {
            // Hapus kelas animasi lama sebelum menimpanya dengan state posisi baru
            element.className = "absolute w-72 h-96 bg-white rounded-3xl p-4 transition-all duration-1000 ease-in-out " + classes;
        }

        // Set interval eksekusi animasi rotasi tepat setiap 10000 milidetik (10 Detik)
        setInterval(rotateCards, 10000);
    });
</script>