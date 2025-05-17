@props(['image' => null, 'alt' => '', 'thumbSize' => 'h-20 w-auto'])

@php
    $componentId = 'lightbox-' . uniqid();
@endphp

<div
    x-data="{ show: false }"
    x-trap.inert.noscroll="show"
    @keydown.escape.window="show = false"
    class="inline-block"
>
    <!-- Thumbnail Image -->
    @if($image && $image !== 'no_image')
        <img
            src="{{ Storage::url('images/' . $image) }}"
            alt="{{ $alt }}"
            class="cursor-pointer rounded shadow hover:brightness-90 transition {{$thumbSize}}"
            @click="show = true; $nextTick(() => $refs.lightboxImg.src = $el.src)"
        />
    @else
        <x-Ui::image.no-image-placeholder class="h-15 w-auto block"/>
    @endif

    <!-- Lightbox Overlay -->
    <div
        id="{{ $componentId }}"
        x-show="show"
        @click="show = false"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-black/80  flex justify-center items-center z-50"
        style="display: none;"
    >
        <img
            x-ref="lightboxImg"
            src=""
            alt="{{ $alt }}"
            class="max-w-[90vw] max-h-[90vh] rounded-lg shadow-lg transform scale-95 transition-transform duration-300"
            x-bind:class="{ 'scale-100': show, 'scale-95': !show }"
            @click.stop
        />
    </div>
</div>
