<div x-show="sidebarOpen" x-transition.opacity.duration.600ms @click="sidebarOpen = false"
     class="fixed inset-0 bg-black/60 z-20 "></div>
<nav x-cloak
     class="fixed inset-0 transform duration-500 z-30 w-80 bg-gray-900 text-white h-auto print:hidden"
     :class="{'translate-x-0 ease-in opacity-100':open === true, '-translate-x-full ease-out opacity-0': sidebarOpen === false}">
    <div class="flex justify-between px-5 py-6">
        <a href="{{route('dashboard')}}" class="flex gap-3">

            <x-Ui::logo.cxlogo :icon="'dark'" class="h-10 w-auto block"/>

            <span class="font-bold text-2xl sm:text-3xl tracking-widest">Codexsun</span>
        </a>
        {{-- {{config('app.name')}} --}}
        <button
            class="focus:outline-none focus:bg-gray-700 hover:bg-gray-800  rounded-md group"
            @click="sidebarOpen = false"
        >
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-7 w-7 text-gray-500 group-hover:text-white"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>
    </div>

    <div class=" bg-gray-900 text-white h-full overflow-y-scroll">
        <ul class="flex flex-col py-6 space-y-1"
            x-data="{selected:null}">

            <li {{ $attributes->class(['bottom-0 left-0 bg-gray-900 cursor-pointer']) }}>
                <a href="{{ route('logout') }}"
                   class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-700 text-gray-500 hover:text-gray-200 border-l-4 border-transparent hover:border-blue-500 pr-6">
                                <span class="inline-flex justify-center items-center ml-4 text-red-400">
                                </span>
                    <span class="ml-2 font-semibold text-sm tracking-wide truncate font-sans">
                        {{ __('General') }}
                    </span>
                </a>
            </li>
            <li {{ $attributes->class(['bottom-0 left-0 bg-gray-900 cursor-pointer']) }}>
                <a href="{{ route('logout') }}"
                   class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-700 text-gray-500 hover:text-gray-200 border-l-4 border-transparent hover:border-blue-500 pr-6">
                                <span class="inline-flex justify-center items-center ml-4 text-red-400">
                                </span>
                    <span class="ml-2 font-semibold text-sm tracking-wide truncate font-sans">
                        {{ __('Transaction') }}
                    </span>
                </a>
            </li>
            <li {{ $attributes->class(['bottom-0 left-0 bg-gray-900 cursor-pointer']) }}>
                <a href="{{ route('logout') }}"
                   class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-700 text-gray-500 hover:text-gray-200 border-l-4 border-transparent hover:border-blue-500 pr-6">
                                <span class="inline-flex justify-center items-center ml-4 text-red-400">
                                </span>
                    <span class="ml-2 font-semibold text-sm tracking-wide truncate font-sans">
                        {{ __('Print') }}
                    </span>
                </a>
            </li>
            <li {{ $attributes->class(['bottom-0 left-0 bg-gray-900 cursor-pointer']) }}>
                <a href="{{ route('logout') }}"
                   class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-700 text-gray-500 hover:text-gray-200 border-l-4 border-transparent hover:border-blue-500 pr-6">
                                <span class="inline-flex justify-center items-center ml-4 text-red-400">
                                </span>
                    <span class="ml-2 font-semibold text-sm tracking-wide truncate font-sans">
                        {{ __('Taxes and GST') }}
                    </span>
                </a>
            </li>
            <li {{ $attributes->class(['bottom-0 left-0 bg-gray-900 cursor-pointer']) }}>
                <a href="{{ route('logout') }}"
                   class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-700 text-gray-500 hover:text-gray-200 border-l-4 border-transparent hover:border-blue-500 pr-6">
                                <span class="inline-flex justify-center items-center ml-4 text-red-400">
                                </span>
                    <span class="ml-2 font-semibold text-sm tracking-wide truncate font-sans">
                        {{ __('Party') }}
                    </span>
                </a>
            </li>

            <li {{ $attributes->class(['bottom-0 left-0 bg-gray-900 cursor-pointer']) }}>
                <a href="{{ route('logout') }}"
                   class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-700 text-gray-500 hover:text-gray-200 border-l-4 border-transparent hover:border-blue-500 pr-6">
                                <span class="inline-flex justify-center items-center ml-4 text-red-400">
                                </span>
                    <span class="ml-2 font-semibold text-sm tracking-wide truncate font-sans">
                        {{ __('Items') }}
                    </span>
                </a>
            </li>
            <li {{ $attributes->class(['bottom-0 left-0 bg-gray-900 cursor-pointer']) }}>
                <a href="{{ route('logout') }}"
                   class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-700 text-gray-500 hover:text-gray-200 border-l-4 border-transparent hover:border-blue-500 pr-6">
                                <span class="inline-flex justify-center items-center ml-4 text-red-400">
                                </span>
                    <span class="ml-2 font-semibold text-sm tracking-wide truncate font-sans">
                        {{ __('Service Reminder') }}
                    </span>
                </a>
            </li>

            <li {{ $attributes->class(['bottom-0 left-0 bg-gray-900 cursor-pointer']) }}>
                <a href="{{ route('logout') }}"
                   class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-700 text-gray-500 hover:text-gray-200 border-l-4 border-transparent hover:border-blue-500 pr-6">
                                <span class="inline-flex justify-center items-center ml-4 text-red-400">
                                </span>
                    <span class="ml-2 font-semibold text-sm tracking-wide truncate font-sans">
                        {{ __('Accounting') }}
                    </span>
                </a>
            </li>
            <li {{ $attributes->class(['bottom-0 left-0 bg-gray-900 cursor-pointer']) }}>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); this.closest('form').submit();"
                       class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-700 text-gray-500 hover:text-gray-200 border-l-4 border-transparent hover:border-red-500 pr-6">
                                <span class="inline-flex justify-center items-center ml-4 text-red-400">
                                </span>
                        <span class="ml-2 font-semibold text-sm tracking-wide truncate font-sans">
                {{ __('Log Out') }}
            </span>
                    </a>
                </form>
            </li>

        </ul>
    </div>
</nav>
