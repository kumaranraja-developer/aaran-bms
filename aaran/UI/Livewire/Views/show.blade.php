{{--<div class="p-6">--}}
{{--    <x-slot name="header">Templates</x-slot>--}}
{{--    <h2 class="text-2xl font-bold capitalize mb-4">{{ $slug }} Variants</h2>--}}

{{--    @if($slug === 'accordion')--}}
{{--        <x-Ui::accordion.type-1 :items="$items" type="plus" />--}}
{{--        <x-Ui::accordion.type-1 :items="$items" type="cross" />--}}
{{--        <x-Ui::accordion.type-1 :items="$items" type="chevron" />--}}


{{--    @endif--}}
{{--</div>--}}
<div class="p-6 space-y-8">
    <x-slot name="header">Templates</x-slot>

    <h2 class="text-3xl font-bold text-gray-800 capitalize mb-6">{{ $slug }} Variants</h2>

    @if($slug === 'accordion')
        <div class="space-y-10">

            {{-- Plus Accordion --}}
            <div class="space-y-4">
                <h3 class="text-xl font-semibold text-gray-700 border-b pb-2">Plus Accordion</h3>
                <x-Ui::accordion.type-1 :items="$items" type="plus" />
            </div>

            {{-- Cross Accordion --}}
            <div class="space-y-4">
                <h3 class="text-xl font-semibold text-gray-700 border-b pb-2">Cross Accordion</h3>
                <x-Ui::accordion.type-1 :items="$items" type="cross" />
            </div>

            {{-- Chevron Accordion --}}
            <div class="space-y-4">
                <h3 class="text-xl font-semibold text-gray-700 border-b pb-2">Chevron Accordion</h3>
                <x-Ui::accordion.type-1 :items="$items" type="chevron" />
            </div>

        </div>
    @endif
</div>
