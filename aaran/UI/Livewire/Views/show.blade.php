<div class="p-6 space-y-8">
    <x-slot name="header">Templates</x-slot>

    <h2 class="text-3xl font-bold text-gray-800 capitalize mb-6">{{ $slug }}</h2>

    @if($slug === 'accordion')
        <div class="space-y-10">

            {{-- Plus Accordion --}}
            <div class="space-y-4">
                <h3 class="text-xl font-semibold text-gray-700 border-b pb-2">Plus</h3>
                <x-Ui::accordion.type-1 :items="$items" type="plus" />

            </div>

            {{-- Cross Accordion --}}
            <div class="space-y-4">
                <h3 class="text-xl font-semibold text-gray-700 border-b pb-2">Cross</h3>
                <x-Ui::accordion.type-1 :items="$items" type="cross" />
            </div>

            {{-- Chevron Accordion --}}
            <div class="space-y-4">
                <h3 class="text-xl font-semibold text-gray-700 border-b pb-2">Chevron</h3>
                <x-Ui::accordion.type-1 :items="$items" type="chevron" />
            </div>

        </div>
    @endif


        {{-- Banner --}}

    @if($slug === 'banner')
        <div class="space-y-4 w-full">
            <button wire:click="showBanner('calltoaction')" class="mx-4 px-4 py-2 bg-blue-600 text-white rounded">Call to Action</button>
            <button wire:click="showBanner('bottom')" class="mx-4 px-4 py-2 bg-black text-white rounded">Bottom Banner</button>
            <button wire:click="showBanner('cookie')" class="mx-4 px-4 py-2 bg-gray-400 text-black rounded">Cookie Banner</button>
        </div>

        @if($bannerVisible)
            <x-Ui::banner.banners :type="$bannerType" />
        @endif
    @endif






</div>
