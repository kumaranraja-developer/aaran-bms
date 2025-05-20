<div class="bg-white dark:bg-dark">
    <x-slot name="header">Job Manager</x-slot>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2 ">
        @foreach($list as $card)
            @php
                $link = route('task-managers',[$card->id])
            @endphp
            <div class="bg-gray-300 text-black px-4 py-4 flex flex-col h-full rounded">
                <div class="flex-grow flex flex-col gap-y-2">
                    <a class="font-bold text-2xl" href="{{$link}}">
                        {{ $card->title }}
                    </a>

                    <a href="{{$link}}" class="text-justify">
                        {!! $card->content !!}
                    </a>
                </div>

                <div class="pt-2 flex flex-col gap-y-2">
                    <img src="{{ asset('images/home/wp1.webp') }}" alt="Card Image" class="w-full object-cover rounded" />
                    <x-Ui::table.cell-status active="{{ $card->active_id }}" />
                </div>
            </div>
        @endforeach

    </div>
</div>
