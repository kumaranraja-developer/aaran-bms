@props([
    'title' => '',
    'links' => [],
])

<div class="my-3 flex flex-col shrink-0">
    <a class="sm:text-white text-red-500 lg:text-2xl text-lg lg:my-2 my-1 cursor-pointer hover:text-red-500">{{ $title }}</a>

    @foreach ($links as $link)
        <a href="{{ $link['href'] }}"
           class="text-white lg:text-sm text-xs tracking-widest my-2.5 cursor-pointer hover:text-yellow-500">
            {{ $link['label'] }}
        </a>
    @endforeach
</div>
