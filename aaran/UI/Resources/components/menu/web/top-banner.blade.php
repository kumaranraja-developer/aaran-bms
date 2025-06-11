@props([
// 'title' => 'home',
 'description' => 'description',
 'slogan' => 'slogan',
 'bg_colour'=>'bg-stone-100'
])

<div class="relative w-full pt-30 pb-10 px-6 bg-center bg-repeat {{$bg_colour}} text-center dark:bg-gray-900 dark:text-white text-black"
{{--     style="background-image: url('{{ asset('images/web/texture/bg-texture-light.png') }}');"--}}
>
    <div class="max-w-3xl mx-auto cursor-default">
        {{--        <h1 class="text-4xl md:text-5xl font-bold tracking-tight">{{ $title }}</h1>--}}
        <p class="mt-4 text-xl tracking-widest md:text-xl">{{ $description }}</p>
        <p class="mt-4 text-sm italic  tracking-widest text-primary">{{ $slogan }}</p>
    </div>
    <div class="h-10">&nbsp;</div>
</div>
