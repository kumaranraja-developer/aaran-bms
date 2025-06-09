{{--<div>--}}
{{--    <x-slot name="header">Templates</x-slot>--}}

{{--    <div class="grid grid-cols-3 gap-6 p-6">--}}
{{--        @foreach($components as $component)--}}
{{--            <a href="{{ route('ui.show', ['slug' => $component['slug']]) }}">--}}
{{--                <div class="border p-4 rounded hover:shadow">--}}
{{--                    <div class="h-32 bg-gray-100 mb-2">--}}
{{--                        <!-- placeholder for image -->--}}
{{--                        <img src="{{$component['image']}}"--}}
{{--                             alt="{{ $component['title'] }} image"--}}
{{--                             class="object-cover w-full h-full">--}}


{{--                    </div>--}}
{{--                    <h3 class="text-lg font-bold">{{ $component['title'] }}</h3>--}}
{{--                    <p class="text-sm text-gray-600">{{ $component['description'] }}</p>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--        @endforeach--}}
{{--    </div>--}}

{{--</div>--}}

<div>
    <x-slot name="header">Templates</x-slot>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 p-6">
        @foreach($components as $component)
            <a href="{{ route('ui.show', ['slug' => $component['slug']]) }}" class="transform transition duration-300 hover:scale-105">
                <div class="border border-gray-200 p-4 rounded-xl shadow-sm hover:shadow-md bg-white transition duration-300">
                    <div class="aspect-w-16 aspect-h-9 bg-gray-100 rounded-lg overflow-hidden mb-4">
                        <img src="{{ $component['image'] }}"
                             alt="{{ $component['title'] }} image"
                             class="object-cover w-full h-full" />
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $component['title'] }}</h3>
                    <p class="text-sm text-gray-600">{{ $component['description'] }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>
