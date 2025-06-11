<section id="home" class="relative w-full min-h-screen gradient-soft overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-20 h-20 bg-purple-200/50 rounded-full animate-float"></div>
        <div class="absolute bottom-20 right-10 w-16 h-16 bg-blue-200/50 rounded-full animate-float"
            style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/4 w-12 h-12 bg-pink-200/50 rounded-full animate-float"
            style="animation-delay: 2s;"></div>
    </div>

    <div class="container-main flex flex-col-reverse lg:flex-row items-center min-h-screen pt-24 pb-16 gap-12 lg:gap-20">
        <!-- Content -->
        <div class="flex-1 flex flex-col items-start gap-6 text-center lg:text-left animate-on-scroll max-w-2xl">
            <p class="text-purple-600 text-sm lg:text-base font-medium">Welcome to AchieveUp</p>

            <h1 class="text-4xl lg:text-6xl font-bold leading-tight">
                <span class="text-gradient">Empowering</span>
                <span class="text-gray-900">Your Future</span><br>
                <span class="text-gradient">Through</span>
                <span class="text-gray-900">Learning</span>
            </h1>

            <div class="flex w-full justify-center lg:justify-start items-center gap-4">
                <div class="w-2 h-2 rounded-full bg-purple-600"></div>
                <div class="w-12 h-2 rounded-full bg-purple-300"></div>
            </div>

            <p class="text-lg lg:text-xl text-gray-600 leading-relaxed">
                Making learning easier with modern tools and interactive online experiences that transform education.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 w-full justify-center lg:justify-start">
                <button class="btn-primary">Get Started</button>
                <button class="btn-secondary">Learn More</button>
            </div>
        </div>

        <!-- Image -->
        <div class="flex-1 flex justify-center items-center animate-on-scroll max-w-2xl" style="animation-delay: 0.2s;">
            <div class="relative">
                <img src="{{ asset('images/head_mobile.png') }}" alt="Hero Image"
                    class="max-w-full h-80 sm:hidden animate-float">
                <img src="{{ asset('images/head.png') }}" alt="Hero Image"
                    class="w-full max-w-xl h-auto hidden sm:block animate-float drop-shadow-2xl">

                <!-- Floating decorative elements -->
                <div class="absolute -top-4 -left-4 w-8 h-8 bg-yellow-400 rounded-full animate-float opacity-80"></div>
                <div class="absolute -bottom-4 -right-4 w-6 h-6 bg-green-400 rounded-full animate-float opacity-80"
                    style="animation-delay: 1.5s;"></div>
                <div class="absolute top-1/4 -right-8 w-4 h-4 bg-red-400 rounded-full animate-float opacity-80"
                    style="animation-delay: 0.5s;"></div>
            </div>
        </div>
    </div>
</section>
