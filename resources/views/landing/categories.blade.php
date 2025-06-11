<section id="categories"
    class="relative section-padding-lg bg-gradient-to-br from-purple-50/50 to-blue-50/50 overflow-hidden">
    <!-- Background Decorations -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-20 left-20 w-32 h-32 bg-purple-300 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-20 w-40 h-40 bg-blue-300 rounded-full blur-3xl"></div>
    </div>

    <img src="{{ asset('images/absolute1.png') }}" class="absolute left-0 lg:left-96 w-32 opacity-20 animate-float"
        alt="decoration">

    <div class="container-main relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-16 animate-on-scroll">
            <p class="text-purple-600 text-sm lg:text-base font-medium mb-4">Explore Our Platform</p>
            <h2 class="text-4xl lg:text-5xl font-bold mb-6">
                <span class="text-gradient">Top Categories</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Discover various learning categories that will help you achieve your academic and professional goals
            </p>
        </div>

        <!-- Categories Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-7xl mx-auto">
            @php
                $categories = [
                    [
                        'name' => 'Academic',
                        'count' => '125',
                        'color' => 'from-purple-500 to-purple-600',
                        'icon' => 'academic',
                    ],
                    ['name' => 'Sports', 'count' => '89', 'color' => 'from-red-500 to-pink-500', 'icon' => 'sports'],
                    [
                        'name' => 'Technology',
                        'count' => '203',
                        'color' => 'from-teal-500 to-green-500',
                        'icon' => 'tech',
                    ],
                    ['name' => 'Arts', 'count' => '67', 'color' => 'from-pink-500 to-rose-500', 'icon' => 'arts'],
                    [
                        'name' => 'Leadership',
                        'count' => '45',
                        'color' => 'from-blue-500 to-indigo-500',
                        'icon' => 'leadership',
                    ],
                    [
                        'name' => 'Programming',
                        'count' => '156',
                        'color' => 'from-indigo-500 to-purple-500',
                        'icon' => 'programming',
                    ],
                    [
                        'name' => 'Research',
                        'count' => '78',
                        'color' => 'from-orange-500 to-red-500',
                        'icon' => 'research',
                    ],
                    [
                        'name' => 'Business',
                        'count' => '92',
                        'color' => 'from-violet-500 to-purple-500',
                        'icon' => 'business',
                    ],
                ];
            @endphp

            @foreach ($categories as $index => $category)
                <div class="group card-modern p-6 cursor-pointer animate-on-scroll"
                    style="animation-delay: {{ ($index + 1) * 0.1 }}s;">
                    <div class="flex items-center gap-4">
                        <div
                            class="flex-shrink-0 w-16 h-16 bg-gradient-to-br {{ $category['color'] }} rounded-xl flex items-center justify-center text-white shadow-lg group-hover:rotate-12 transition-all duration-300">
                            @switch($category['icon'])
                                @case('academic')
                                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                @break

                                @case('sports')
                                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z" />
                                    </svg>
                                @break

                                @case('tech')
                                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
                                    </svg>
                                @break

                                @case('arts')
                                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                                    </svg>
                                @break

                                @case('leadership')
                                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @break

                                @case('programming')
                                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @break

                                @case('research')
                                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z" />
                                    </svg>
                                @break

                                @case('business')
                                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @break
                            @endswitch
                        </div>
                        <div class="flex-1">
                            <h3
                                class="text-lg lg:text-xl font-semibold text-gray-800 group-hover:text-purple-600 transition-colors duration-300">
                                {{ $category['name'] }}
                            </h3>
                            <p class="text-sm lg:text-base text-gray-500">{{ $category['count'] }} Uploads</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
