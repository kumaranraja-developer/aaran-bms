@php
    // Dynamic color configuration
    $colorOptions = [
        'orange' => [
            'text' => 'text-orange-500',
            'hover-text' => 'hover:text-orange-600',
            'bg' => 'bg-orange-500',
            'hover-bg' => 'hover:bg-orange-600',
            'border' => 'border-orange-500',
            'fill' => 'fill-orange-500',
        ],
        'blue' => [
            'text' => 'text-blue-500',
            'hover-text' => 'hover:text-blue-600',
            'bg' => 'bg-blue-500',
            'hover-bg' => 'hover:bg-blue-600',
            'border' => 'border-blue-500',
            'fill' => 'fill-blue-500',
        ],
        // Add more color options as needed
    ];

    $color = $colorOptions['orange']; // Default to primary color

    // Full width option
    $fullWidth = true; // Set to false if you don't want full width

    $menuItems = [
        'home' => ['label' => 'Home', 'route' => 'home'],
        'abouts' => ['label' => 'About', 'route' => 'abouts'],
        'products' => [
            'label' => 'Products',
            'items' => [
                [
                    'name' => 'Product 1',
                    'route' => '#',
                    'image' => asset('images/teams/arunesh.jpg'),
                    'description' => 'Product 1 description'
                ],
                [
                    'name' => 'Product 2',
                    'route' => '#',
                    'image' => asset('images/teams/arunesh.jpg'),
                    'description' => 'Product 2 description'
                ],
                [
                    'name' => 'Product 3',
                    'route' => '#',
                    'image' => asset('images/teams/arunesh.jpg'),
                    'description' => 'Product 3 description'
                ]
            ]
        ],
        'web-contacts' => ['label' => 'Contact', 'route' => 'web-contacts'],
    ];
@endphp

<nav x-data="{ mobileMenuOpen: false }" class="bg-white shadow-lg {{ $fullWidth ? 'w-full' : '' }}">
    <div class="{{ $fullWidth ? 'w-full' : 'max-w-7xl' }} mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}"
                   class="flex items-center gap-2 transition duration-300 transform hover:scale-105">
                    <x-Ui::logo.cxlogo :icon="'orange'" class="w-5 h-auto {{ $color['fill'] }}"/>
                    <span class="font-semibold {{ $color['text'] }} text-2xl transition duration-300">
                      CODEX<span class="text-body-color dark:text-dark-9">SUN</span>
                    </span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:block">
                <div class="flex items-center space-x-8">
                    @foreach($menuItems as $key => $item)
                        @if(isset($item['items']))
                            <div x-data="{ dropdownOpen: false }" class="relative">
                                <button
                                    @mouseenter="dropdownOpen = true"
                                    @mouseleave="dropdownOpen = false"
                                    class="flex items-center text-gray-600 {{ $color['hover-text'] }} transition duration-300 group cursor-pointer"
                                >
                                    <span
                                        class="absolute bottom-0 left-0 w-0 h-0.5 {{ $color['bg'] }} transition-all duration-300 group-hover:w-full"></span>
                                    {{--                                    <span class="group-hover:translate-x-0.5 transition-transform duration-300">--}}
                                    {{ $item['label'] }}
                                    {{--                                    </span>--}}
                                    {{--                                    <svg class="w-4 h-4 ml-1 transform group-hover:rotate-180 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
                                    {{--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>--}}
                                    {{--                                    </svg>--}}
                                </button>

                                <!-- Enhanced Dropdown with images and descriptions -->
                                <div
                                    x-show="dropdownOpen"
                                    @mouseenter="dropdownOpen = true"
                                    @mouseleave="dropdownOpen = false"
                                    class="absolute z-20 mt-2 w-72 bg-white rounded-md shadow-xl overflow-hidden border border-gray-100"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 scale-95"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-95"
                                >
                                    @foreach($item['items'] as $product)
                                        <a
                                            href="{{ $product['route'] }}"
                                            class="flex items-start px-4 py-3 hover:{{ $color['bg'] }} hover:bg-opacity-10 transition-all duration-300 group"
                                        >
                                            <div class="flex-shrink-0">
                                                <img
                                                    src="{{ $product['image'] }}"
                                                    alt="{{ $product['name'] }}"
                                                    class="w-12 h-12 object-cover rounded-lg transition duration-300 group-hover:scale-110"
                                                >
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-900 group-hover:{{ $color['text'] }} transition duration-300">
                                                    {{ $product['name'] }}
                                                </p>
                                                <p class="text-sm text-gray-500 group-hover:text-gray-700 transition duration-300">
                                                    {{ $product['description'] }}
                                                </p>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <a
                                href="{{ route($item['route']) }}"
                                class="relative text-gray-600 {{ $color['hover-text'] }} transition duration-300 group"
                            >
                                {{ $item['label'] }}
                                <span
                                    class="absolute bottom-0 left-0 w-0 h-0.5 {{ $color['bg'] }} transition-all duration-300 group-hover:w-full"></span>
                                @if(request()->routeIs($item['route']))
                                    <span class="absolute bottom-0 left-0 w-full h-0.5 {{ $color['bg'] }}"></span>
                                @endif
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Auth Links - Desktop -->
            <div class="hidden md:flex items-center space-x-4">
                @guest

                    <a
                        href="{{ route('login') }}"
                        class="relative text-gray-600 {{ $color['hover-text'] }} transition duration-300 group"
                    >
                        Sign Up
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 {{ $color['bg'] }} transition-all duration-300 group-hover:w-full"></span>
                        @if(request()->routeIs('login'))
                            <span class="absolute bottom-0 left-0 w-full h-0.5 {{ $color['bg'] }}"></span>
                        @endif
                    </a>

                    <a href="{{ route('login') }}"
                       class="px-4 py-2 {{ $color['bg'] }} text-white rounded-lg hover:{{ $color['hover-bg'] }} transition duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                        Login
                    </a>
                @else
                    <a
                        href="{{ route('dashboard') }}"
                        class="relative text-gray-600 {{ $color['hover-text'] }} transition duration-300 group"
                    >
                        Dashboard
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 {{ $color['bg'] }} transition-all duration-300 group-hover:w-full"></span>
                        @if(request()->routeIs('dashboard'))
                            <span class="absolute bottom-0 left-0 w-full h-0.5 {{ $color['bg'] }}"></span>
                        @endif
                    </a>


                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="text-gray-600 {{ $color['hover-text'] }} transition duration-300 hover:underline hover:underline-offset-4 cursor-pointer">
                            Logout
                        </button>
                    </form>
                @endguest
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    class="text-gray-500 {{ $color['hover-text'] }} focus:outline-none transition duration-300"
                >
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              :d="mobileMenuOpen ? 'M6 18L18 6M6 6l12 12' : 'M4 6h16M4 12h16M4 18h16'" d=""></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu with enhanced animations -->
    <div x-show="mobileMenuOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-full"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-full"
         class="fixed inset-0 z-40 md:hidden flex items-center justify-center pointer-events-none"
         @click.away="mobileMenuOpen = false"
         x-cloak
         x-trap.noscroll.inert="mobileMenuOpen" {{-- Trap focus and prevent scrolling --}}
    >
        {{-- Overlay Background --}}
        <div class="absolute inset-0 bg-black/70" @click="mobileMenuOpen = false"></div>

        {{-- Mobile Menu Content Container --}}
        <div
            class="relative bg-white rounded-lg shadow-xl max-w-md w-full mx-4 my-8 overflow-hidden pointer-events-auto border {{ $color['border'] }}"
            @click.stop {{-- Stop click propagation to prevent @click.away on the parent from closing it --}}>
            <div class="px-4 pt-5 pb-4">
                <div class="absolute top-4 right-4">
                    <button @click="mobileMenuOpen = false"
                            class="text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-{{ str_replace('text-', '', $color['text']) }}">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <div class="mt-4 space-y-4"> {{-- Added mt-4 for spacing below close button --}}
                    @foreach($menuItems as $key => $item)
                        @if(isset($item['items']))
                            <div x-data="{ mobileDropdownOpen: false }" class="relative">
                                <button
                                    @click="mobileDropdownOpen = !mobileDropdownOpen"
                                    class="w-full flex justify-between items-center px-3 py-2 text-gray-700 {{ $color['hover-text'] }} rounded-md transition duration-300"
                                >
                                    <span>{{ $item['label'] }}</span>
                                    <svg class="w-4 h-4 transform transition duration-300"
                                         :class="{'rotate-180': mobileDropdownOpen}" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>

                                <div x-show="mobileDropdownOpen"
                                     x-collapse
                                     class="pl-4 space-y-2 mt-1 transition-all duration-300 origin-top">

                                    @foreach($item['items'] as $product)
                                        <a
                                            href="{{ $product['route'] }}"
                                            @click="mobileMenuOpen = false"
                                            {{-- Close mobile menu when product link is clicked --}}
                                            class="block px-3 py-2 text-gray-600 {{ $color['hover-text'] }} rounded-md transition duration-300 transform hover:translate-x-1"
                                        >
                                            <div class="flex items-center">
                                                <img
                                                    src="{{ $product['image'] }}"
                                                    alt="{{ $product['name'] }}"
                                                    class="w-8 h-8 object-cover rounded mr-2 transition duration-300 hover:scale-110"
                                                >
                                                <div>
                                                    <div>{{ $product['name'] }}</div>
                                                    <div
                                                        class="text-xs text-gray-500">{{ $product['description'] }}</div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <a
                                href="{{ route($item['route']) }}"
                                @click="mobileMenuOpen = false"
                                {{-- Close mobile menu when main link is clicked --}}
                                class="block px-3 py-2 text-gray-700 {{ $color['hover-text'] }} rounded-md transition duration-300 transform hover:translate-x-1 {{ request()->routeIs($item['route']) ? $color['text'] : '' }}"
                            >
                                {{ $item['label'] }}
                            </a>
                        @endif
                    @endforeach
                </div>

                <div class="mt-6 pt-4 border-t border-gray-200">
                    @guest
                        <a href="{{ route('login') }}" @click="mobileMenuOpen = false"
                           class="block px-3 py-2 text-gray-600 {{ $color['hover-text'] }} rounded-md transition duration-300 transform hover:translate-x-1">
                            Log In
                        </a>
                        <a href="{{ route('login') }}" @click="mobileMenuOpen = false"
                           class="block px-3 py-2 mt-1 {{ $color['bg'] }} text-white rounded-md transition duration-300 transform hover:scale-105">
                            Sign Up
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" @click="mobileMenuOpen = false"
                           class="block px-3 py-2 text-gray-600 {{ $color['hover-text'] }} rounded-md transition duration-300 transform hover:translate-x-1">
                            Dashboard
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" @click="mobileMenuOpen = false"
                                    class="block w-full text-left px-3 py-2 text-gray-600 {{ $color['hover-text'] }} rounded-md transition duration-300 transform hover:translate-x-1">
                                Logout
                            </button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</nav>
