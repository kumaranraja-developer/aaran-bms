<div>
    <x-slot name="header">Templates</x-slot>

    with plus
    <x-Ui::accordion.type-1  :items="$accordions"  type="plus" />

    with cross
    <x-Ui::accordion.type-1  :items="$accordions"   type="cross" />
    <x-Ui::accordion.type-1  :items="$accordions"  />
    <x-Ui::accordion.type-1  :items="$accordions"  />

{{--    <div content="mt-12 mb-12">--}}
{{--        @if($bannerVisible)--}}
{{--            true--}}
{{--        @else--}}
{{--            false--}}
{{--        @endif--}}
{{--    </div>--}}

{{--    <button wire:click="setShowBanner" class="px-2 py-2 bg-yellow-300">click</button>--}}


    <div class="px-10 py-20 text-red-400">
        {{$date}}
    </div>

    <x-Ui::datepicker.date wire:model="date" format="YYYY-MM-DD" />



    <x-Ui::banner.call-to-action
        title="{{$date}}"
        content="i am here"
    />

</div>

