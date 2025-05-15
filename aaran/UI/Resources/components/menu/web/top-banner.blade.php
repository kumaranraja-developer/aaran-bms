@props([
// 'title' => 'home',
 'description' => 'description',
 'slogan' => 'slogan',
 'bg_colour'=>'bg-stone-50'
])

<div class="relative w-full pt-20 py-4 px-6 bg-center bg-repeat {{$bg_colour}} text-center text-black"
     style="background-image: url('{{ asset('images/bg-geometry.png') }}');"
>
    <div class="max-w-3xl mx-auto">
        {{--        <h1 class="text-4xl md:text-5xl font-bold tracking-tight">{{ $title }}</h1>--}}
        <p class="mt-4 text-lg md:text-xl">{{ $description }}</p>
        <p class="mt-2 text-sm italic text-orange-500">{{ $slogan }}</p>
    </div>
</div>
