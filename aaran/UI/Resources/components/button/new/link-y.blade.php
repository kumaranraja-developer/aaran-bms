@props([
    'label' => 'Book a demo',
    'colour' => 'white',
])

@php
    $colours = [
        'red' => ['text' => 'text-red-500', 'bg' => 'bg-red-500', 'border' => 'border-red-500', 'hover' => 'text-white'],
        'green' => ['text' => 'text-green-500', 'bg' => 'bg-green-500', 'border' => 'border-green-500', 'hover' => 'text-white'],
        'orange' => ['text' => 'text-orange-500', 'bg' => 'bg-orange-500', 'border' => 'border-orange-500', 'hover' => 'text-white'],
        'white' => ['text' => 'text-white', 'bg' => 'bg-white', 'border' => 'border-white', 'hover' => 'text-black'],
        'purple' => ['text' => 'text-purple-500', 'bg' => 'bg-purple-500', 'border' => 'border-purple-500', 'hover' => 'text-white'],
    ];

    $color = $colours[$colour] ?? $colours['white'];
@endphp

<a {{ $attributes->merge([
    'class' => "relative inline-flex items-center justify-center p-4 px-6 py-3 overflow-hidden font-medium transition duration-300 ease-out border-2 cursor-pointer shadow-md group " .
               "{$color['text']} {$color['border']}"
]) }}>
    <span class="absolute inset-0 flex items-center justify-center w-full h-full {{ $color['hover'] }} duration-300 -translate-x-full {{ $color['bg'] }} group-hover:translate-x-0 ease">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
        </svg>
    </span>

    <span class="absolute flex items-center justify-center w-full h-full {{ $color['text'] }} transition-all duration-300 transform group-hover:translate-x-full ease">
        {{ $label }}
    </span>

    <span class="relative invisible">{{ $label }}</span>
</a>
