<div
    class="flex flex-col lg:flex-row w-full sm:w-[400px] lg:w-full px-4 sm:px-6 mx-16 py-8 items-center gap-6 rounded-3xl bg-gradient-to-r from-[#6041CE] via-[#6041CE] to-[#513C99] shadow-2xl backdrop-blur-sm border border-white/10 observe-animation">

    <div class="flex flex-col items-center gap-1 flex-1 group transition-all duration-300 hover:scale-105">
        <p class="w-full text-center text-2xl lg:text-3xl font-bold text-white counter" data-target="1000">0</p>
        <p class="w-full text-center text-sm lg:text-base font-normal text-white/90">Mahasiswa Berprestasi</p>
    </div>

    <span class="block lg:hidden w-full h-[2px] bg-white/30"></span>
    <span class="hidden lg:block w-[2px] h-[54px] bg-white/30"></span>

    <div class="flex flex-col items-center gap-1 flex-1 group transition-all duration-300 hover:scale-105">
        <p class="w-full text-center text-2xl lg:text-3xl font-bold text-white counter" data-target="250">0</p>
        <p class="w-full text-center text-sm lg:text-base font-normal text-white/90">Program Studi</p>
    </div>

    <span class="block lg:hidden w-full h-[2px] bg-white/30"></span>
    <span class="hidden lg:block w-[2px] h-[54px] bg-white/30"></span>

    <div class="flex flex-col items-center gap-1 flex-1 group transition-all duration-300 hover:scale-105">
        <p class="w-full text-center text-2xl lg:text-3xl font-bold text-white counter" data-target="500">0</p>
        <p class="w-full text-center text-sm lg:text-base font-normal text-white/90">Prestasi Tercatat</p>
    </div>

    <span class="block lg:hidden w-full h-[2px] bg-white/30"></span>
    <span class="hidden lg:block w-[2px] h-[54px] bg-white/30"></span>

    <div class="flex flex-col items-center gap-1 flex-1 group transition-all duration-300 hover:scale-105">
        <p class="w-full text-center text-2xl lg:text-3xl font-bold text-white counter" data-target="15">0</p>
        <p class="w-full text-center text-sm lg:text-base font-normal text-white/90">Fakultas</p>
    </div>
</div>

<script>
    // Counter animation
    function animateCounter(element) {
        const target = parseInt(element.getAttribute('data-target'));
        const duration = 2000; // 2 seconds
        const step = target / (duration / 16); // 60fps
        let current = 0;

        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current) + (target >= 1000 ? '+' : '');
        }, 16);
    }

    // Initialize counters when stats section is visible
    const statsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counters = entry.target.querySelectorAll('.counter');
                counters.forEach((counter, index) => {
                    setTimeout(() => {
                        animateCounter(counter);
                    }, index * 200);
                });
                statsObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.5
    });

    document.addEventListener('DOMContentLoaded', () => {
        const statsSection = document.querySelector('.observe-animation');
        if (statsSection) {
            statsObserver.observe(statsSection);
        }
    });
</script>
