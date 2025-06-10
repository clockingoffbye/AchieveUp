<header
    class="fixed top-0 left-0 right-0 z-50 flex w-full h-[80px] px-6 lg:px-[64px] py-[24px] justify-between items-center flex-shrink-0 glass-effect transition-all duration-300 ease-in-out">
    {{-- Logo --}}
    <div class="flex items-center gap-4 lg:gap-[56px] animate-fade-in-left">
        <img src="{{ asset('images/logo.png') }}" class="h-10 transition-transform duration-300 hover:scale-105"
            alt="Logo">
    </div>

    {{-- Menu --}}
    <div class="hidden lg:flex items-center gap-[56px] animate-fade-in-up delay-200">
        <a href="#section-id"
            class="text-[#949494] font-sora text-[16px] font-normal leading-[28px] cursor-pointer no-underline hover:text-[#03045E] transition-all duration-300 ease-in-out hover:scale-105 relative group">
            Home
            <span
                class="absolute bottom-0 left-0 w-0 h-0.5 bg-[#03045E] transition-all duration-300 group-hover:w-full"></span>
        </a>
        <a href="#section-id"
            class="text-[#949494] font-sora text-[16px] font-normal leading-[28px] cursor-pointer no-underline hover:text-[#03045E] transition-all duration-300 ease-in-out hover:scale-105 relative group">
            About
            <span
                class="absolute bottom-0 left-0 w-0 h-0.5 bg-[#03045E] transition-all duration-300 group-hover:w-full"></span>
        </a>
        <a href="#section-id"
            class="text-[#949494] font-sora text-[16px] font-normal leading-[28px] cursor-pointer no-underline hover:text-[#03045E] transition-all duration-300 ease-in-out hover:scale-105 relative group">
            Services
            <span
                class="absolute bottom-0 left-0 w-0 h-0.5 bg-[#03045E] transition-all duration-300 group-hover:w-full"></span>
        </a>
        <a href="#section-id"
            class="text-[#949494] font-sora text-[16px] font-normal leading-[28px] cursor-pointer no-underline hover:text-[#03045E] transition-all duration-300 ease-in-out hover:scale-105 relative group">
            Contact
            <span
                class="absolute bottom-0 left-0 w-0 h-0.5 bg-[#03045E] transition-all duration-300 group-hover:w-full"></span>
        </a>
    </div>

    {{-- Login Button --}}
    <div class="hidden lg:flex items-center gap-[24px] animate-fade-in-right delay-300">
        <a href="{{ url('/login') }}">
            <div
                class="button-primary flex items-center gap-2 px-6 py-3 rounded-full bg-gradient-to-r from-[#6041CE] to-[#513C99] text-white font-medium transition-all duration-300 hover:shadow-lg hover:scale-105 hover:shadow-purple-500/25">
                <p class="text-base font-semibold leading-[28px]">Login ke Sistem</p>
            </div>
        </a>
    </div>

    {{-- Mobile Button --}}
    <div class="lg:hidden animate-fade-in-right">
        <button id="mobile-menu-toggle"
            class="text-[#03045E] p-2 rounded-lg hover:bg-white/20 transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transition-all duration-300" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobile-menu"
        class="hidden absolute top-[80px] left-0 w-full glass-effect shadow-xl z-50 transition-all duration-300 transform -translate-y-full opacity-0">
        <div class="flex flex-col items-start gap-4 p-6">
            <a href="#section-id"
                class="text-[#949494] font-sora text-[16px] font-normal leading-[28px] cursor-pointer no-underline hover:text-[#03045E] transition-all duration-300 w-full py-2 px-4 rounded-lg hover:bg-white/10">
                Home
            </a>
            <a href="#section-id"
                class="text-[#949494] font-sora text-[16px] font-normal leading-[28px] cursor-pointer no-underline hover:text-[#03045E] transition-all duration-300 w-full py-2 px-4 rounded-lg hover:bg-white/10">
                About
            </a>
            <a href="#section-id"
                class="text-[#949494] font-sora text-[16px] font-normal leading-[28px] cursor-pointer no-underline hover:text-[#03045E] transition-all duration-300 w-full py-2 px-4 rounded-lg hover:bg-white/10">
                Services
            </a>
            <a href="#section-id"
                class="text-[#949494] font-sora text-[16px] font-normal leading-[28px] cursor-pointer no-underline hover:text-[#03045E] transition-all duration-300 w-full py-2 px-4 rounded-lg hover:bg-white/10">
                Contact
            </a>
            <div
                class="button-primary flex items-center gap-2 px-6 py-3 rounded-full bg-gradient-to-r from-[#6041CE] to-[#513C99] text-white font-medium transition-all duration-300 hover:shadow-lg hover:scale-105 mt-4">
                <p class="text-base font-semibold leading-[28px]">Login ke Sistem</p>
            </div>
        </div>
    </div>
</header>

<script>
    const toggleButton = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const toggleIcon = toggleButton.querySelector('svg');

    toggleButton.addEventListener('click', () => {
        if (mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.remove('hidden');
            setTimeout(() => {
                mobileMenu.classList.remove('-translate-y-full', 'opacity-0');
                mobileMenu.classList.add('translate-y-0', 'opacity-100');
            }, 10);

            toggleIcon.style.transform = 'rotate(90deg)';
        } else {
            mobileMenu.classList.add('-translate-y-full', 'opacity-0');
            mobileMenu.classList.remove('translate-y-0', 'opacity-100');
            setTimeout(() => {
                mobileMenu.classList.add('hidden');
            }, 300);

            toggleIcon.style.transform = 'rotate(0deg)';
        }
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth >= 1024) {
            mobileMenu.classList.add('hidden', '-translate-y-full', 'opacity-0');
            mobileMenu.classList.remove('translate-y-0', 'opacity-100');
            toggleIcon.style.transform = 'rotate(0deg)';
        }
    });

    // Header scroll effect
    window.addEventListener('scroll', () => {
        const header = document.querySelector('header');
        if (window.scrollY > 50) {
            header.classList.add('bg-white/90', 'shadow-lg');
        } else {
            header.classList.remove('bg-white/90', 'shadow-lg');
        }
    });
</script>
