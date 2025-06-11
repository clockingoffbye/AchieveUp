<section class="relative section-padding bg-cover bg-center bg-no-repeat overflow-hidden animate-on-scroll"
    style="background-image: linear-gradient(135deg, rgba(96, 65, 206, 0.9), rgba(81, 60, 153, 0.9)), url('{{ asset('images/cta1.png') }}');">

    <!-- Animated background elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-10 left-10 w-20 h-20 bg-white/10 rounded-full animate-float"></div>
        <div class="absolute bottom-10 right-10 w-16 h-16 bg-white/10 rounded-full animate-float"
            style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 right-1/4 w-12 h-12 bg-white/10 rounded-full animate-float"
            style="animation-delay: 2s;"></div>
    </div>

    <div class="container-main relative z-10">
        <div
            class="flex flex-col lg:flex-row justify-between items-center text-center lg:text-left gap-8 max-w-6xl mx-auto">
            <div class="flex-1 max-w-2xl">
                <p class="text-white/80 text-lg font-medium mb-4">Ready to Transform?</p>
                <h2 class="text-4xl lg:text-5xl font-bold text-white leading-tight mb-6">
                    Siap menjadikan data prestasi sebagai dasar kemajuan kampus?
                </h2>
                <p class="text-xl text-white/90 leading-relaxed">
                    Bergabunglah dengan ribuan mahasiswa yang telah merasakan transformasi digital dalam pencatatan
                    prestasi akademik.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ url('/login') }}"
                    class="group flex items-center gap-3 px-8 py-4 bg-white text-purple-600 font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105 hover:bg-gray-50">
                    <span class="text-lg font-semibold">Login ke Sistem</span>
                    <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>

                <button
                    class="flex items-center gap-3 px-8 py-4 border-2 border-white text-white font-semibold rounded-full hover:bg-white hover:text-purple-600 transition-all duration-300 hover:scale-105">
                    <span class="text-lg font-semibold">Learn More</span>
                </button>
            </div>
        </div>
    </div>
</section>
