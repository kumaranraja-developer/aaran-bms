@props([
    'model',           // Livewire model name as a string
    'oldImage' => null,
])

@php
    $modelBinding = \Illuminate\Support\Str::of($model)->contains('.') ? $model : 'wire:model="' . $model . '"';
@endphp

<div class="flex flex-col py-2">
    <label for="bg_image" class="w-full text-zinc-500 tracking-wide pb-4 px-2">
        Image
    </label>

    <div class="flex flex-wrap sm:gap-6 gap-2">
        {{-- Image Preview --}}
        <div class="flex-shrink-0">
            <div class="bg-blue-100 p-1 rounded-lg overflow-hidden flex items-center justify-center w-[156px] h-[89px]">
                @if ($attributes->wire('model')->value())
                    <img
                        class="w-full h-full object-cover rounded-lg hover:brightness-110 hover:scale-105 transition duration-300 ease-out"
                        src="{{ $attributes->wire('model')->value()->temporaryUrl() }}"
                        alt="Preview"
                    />
                @elseif ($oldImage)
                    <img
                        class="w-full h-full object-cover rounded-lg"
                        src="{{ Storage::url('images/' . $oldImage) }}"
                        alt="Old Image"
                    />
                @else
                    <div class="text-sm text-gray-400 text-center">No Image</div>
                @endif
            </div>
        </div>

        {{-- Upload UI --}}
        <div class="relative">
            <label
                for="bg_image"
                class="text-gray-500 font-semibold text-base rounded flex flex-col items-center
                       justify-center cursor-pointer border-2 border-gray-300 border-dashed p-4
                       mx-auto w-[160px] h-[96px] font-[sans-serif] hover:bg-gray-50 transition"
            >
{{--                <x-ui::icons.icon icon="cloud-upload" class="w-8 h-auto block text-gray-400" />--}}
                Upload Photo
                <input
                    type="file"
                    id="bg_image"
                    wire:model="{{ $model }}"
                    class="hidden"
                />
                <p class="text-xs font-light text-gray-400 mt-2">PNG or JPG</p>
            </label>

            {{-- Loader --}}
            <div wire:loading wire:target="{{ $model }}" class="absolute top-6 left-1/2 -translate-x-1/2 z-10">
                <div class="w-10 h-10 rounded-full animate-spin border-4 border-green-500 border-t-transparent border-dashed"></div>
            </div>
        </div>
    </div>
</div>
