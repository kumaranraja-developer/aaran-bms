@php
    $menuItems = [
        'home' => 'Home',
        'abouts' => 'About',
//        'blogs' => 'Blog',
        'web-projects' => 'Products',
        'web-contacts' => 'Contact',
    ];
@endphp

<nav x-data="{ mobileMenuIsOpen: false }" @click.away="mobileMenuIsOpen = false" id="navBar"
     class="sm:fixed sm:z-40 h-18 sm:w-full flex items-center justify-between border-b border-neutral-300 px-6 py-4 dark:border-neutral-700 dark:bg-dark-4 dark:text-dark-9 text-black
     {{ Route::currentRouteNamed('home') ? 'transition-colors' : 'bg-white' }}  duration-300">

    <!-- Logo -->
    <a href="#" class="text-3xl flex items-center hover:scale-105 transition duration-500">
        <h1 class="hover:tracking-wide text-primary hover:font-semibold">
            CODEX<span class="text-body-color dark:text-dark-9">SUN</span>
        </h1>
    </a>

    <!-- Desktop Menu -->
    <ul class="hidden md:flex items-center gap-16 dark:bg-dark-4">
        @foreach ($menuItems as $route => $label)
            <li class="hover:tracking-wide hover:font-bold transition duration-500 ">
                <a href="{{ route($route) }}" class="menu-text dark:text-dark-9 dark:hover:text-dark-9"
                >{{ $label }}</a>
            </li>
        @endforeach

    </ul>

    <div>

        @auth

            <div class="md:flex items-center hidden ">
                <!-- Settings Dropdown -->
                <div class="ml-3 relative ">
                    <x-Ui::jet.dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @auth
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                            class="inline-flex items-center sm:px-3 px-1 sm:py-2 py-1 border border-gray-300 sm:text-sm text-xs
                                            leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition dark:text-dark-9 dark:bg-dark-4 dark:hover:text-primary">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
     class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round"
        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
</svg>


                                    </button>
                                </span>
                            @endauth
                        </x-slot>


                        <x-slot name="content">

                            <div class="flex flex-col gap-1">
                                <a href="{{ route('dashboard') }}" role="button"
                                   class="menu-text hover:tracking-wide hover:font-bold transition hover:bg-orange-200 text-black p-2 cursor-pointer duration-500">Dashboard</a>

                                <a href="{{ route('logout') }}" role="button"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                   class="menu-text hover:tracking-wide hover:font-bold transition  hover:bg-orange-200 text-black p-2
                                       cursor-pointer duration-500 px-3 py-2 rounded-lg">Logout</a>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  class="hidden">@csrf</form>
                        </x-slot>
                    </x-Ui::jet.dropdown>
                </div>
            </div>

        @else
            <div class="hover:tracking-wide hover:font-bold transition duration-500 hidden md:block">
                <a href="{{ route('login') }}" class="menu-text border border-primary hover:bg-primary
                px-3 py-2 rounded-lg text-primary hover:text-white">Login</a>
            </div>
        @endauth
    </div>

    <!-- Mobile Menu Button -->
    <button @click="mobileMenuIsOpen = !mobileMenuIsOpen" :aria-expanded="mobileMenuIsOpen"
            :class="mobileMenuIsOpen ? 'fixed top-6 right-6 z-50' : null" type="button"
            class="flex  text-neutral-600 dark:text-dark-9 md:hidden" aria-label="mobile menu">
        <svg x-cloak x-show="!mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
        </svg>
        <svg x-cloak x-show="mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6 dark:text-white">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M6 18 18 6M6 6l12 12"/>
        </svg>
    </button>

    <!-- Mobile Menu -->
    <ul x-cloak x-show="mobileMenuIsOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="-translate-y-full"
        x-transition:enter-end="translate-y-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="translate-y-0"
        x-transition:leave-end="-translate-y-full"
        id="mobileMenu"
        class="absolute w-[300px] h-[100vh] justify-evenly right-0 top-0 z-20 flex flex-col divide-y divide-neutral-300 border-b border-neutral-300 bg-neutral-50 px-6 pb-6 pt-10 dark:divide-dark-7 dark:border-dark-8 dark:bg-dark-4 dark:text-dark-9 md:hidden">

        @foreach ($menuItems as $route => $label)
            <li class="py-2">
                <a href="{{ route($route) }}" class="menu-text-mobile dark:bg-dark-4 dark:text-dark-9">{{ $label }}</a>
            </li>
        @endforeach

        @auth
            <li class="py-2 dark:text-dark-9"><a href="{{ route('dashboard') }}"
                                                 class="menu-text-mobile Customize Toolbar…">Dashboard</a>
            </li>
            <li class="py-2">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="menu-text-mobile dark:text-dark-9">Logout</a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                  class="hidden Customize Toolbar…">@csrf</form>
        @else
            <li class="py-2 dark:text-dark-9"><a href="{{ route('login') }}" class="menu-text-mobile">Login</a></li>
        @endauth
    </ul>
</nav>


<!-- Scroll Effect Script -->
<script>
    window.onscroll = () => {
        const navBar = document.getElementById("navBar");
        const menuText = document.querySelectorAll(".menu-text");
        if (document.documentElement.scrollTop > 100) {
            navBar.classList.add("sticky-header");
            menuText.forEach(el => el.classList.add("text-black", "scroll-text-color"));
        } else {
            navBar.classList.remove("sticky-header");
            menuText.forEach(el => el.classList.remove("text-black"));
        }
    };
</script>

<!-- Styles -->
<style>
    .sticky-header {
        background-color: white !important;
        color: black !important;
        transition: background-color 0.3s ease-out, color 0.3s ease-out;
    }

    /* Dark mode overrides for sticky-header */
    @media (prefers-color-scheme: dark) {
        .sticky-header {
            background-color: #464646 !important; /* dark:bg-dark-4 */
            color: #faf9f9 !important; /* dark:text-dark-9 */
        }

        .scroll-text-color {
            color: white;
        }
    }

    .menu-text {
        @apply dark:text-neutral-300 dark:hover:text-white hover:tracking-wide hover:font-bold transition duration-500;
    }

    .menu-text-mobile {
        @apply text-sm font-medium text-neutral-600 dark:text-neutral-300 focus:underline;
    }
</style>
