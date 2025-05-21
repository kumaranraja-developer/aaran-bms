<div class="bg-white dark:bg-dark">
    <x-slot name="header">Job Manager</x-slot>

    <!-- Top Controls --------------------------------------------------------------------------------------------->
    <x-Ui::forms.top-controls :show-filters="$showFilters"/>

    <!-- Table Caption -------------------------------------------------------------------------------------------->
    <x-Ui::table.caption :caption="'Job Manager'">
        {{$list->count()}}
    </x-Ui::table.caption>

    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-5 gap-5 p-5">
        @foreach($list as $card)
            @php
                $link = route('task-managers',[$card->id])
            @endphp
            <div class="bg-white border border-gray-50 dark:border-gray-500 dark:bg-dark-4 dark:text-dark-9 text-black p-6 flex flex-col h-full rounded-lg gap-3 hover:scale-103 shadow-lg hover:shadow-xl transition duration-300">
                <div class="flex-grow flex flex-col gap-y-2">
                    <div class="flex justify-between items-center">
                        <a class="font-bold text-xl break-words line-clamp-1" href="{{$link}}">
                            {{ $card->title }}
                        </a>
                        <x-Ui::button.edit :id="$card->id" class="text-blue-500" wire:click="edit({{$card->id}})"/>

                    </div>
                    <a href="{{$link}}" class="text-justify break-words line-clamp-3 text-sm dark:text-dark-8">
                        {!! $card->content !!}
                    </a>
                </div>

                <div class="pt-2 flex flex-col gap-y-4">
                    <img src="{{ asset('images/home/wp1.webp') }}" alt="Card Image" class="w-[200px]" />
                    <div class="flex justify-between items-center">
                        <div class="inline-flex items-center px-3 py-1 rounded-xl gap-x-2 @if($card->active===1)bg-emerald-100/60 @else bg-red-100/60 @endif ">

                            <span class="h-1.5 w-1.5  rounded-full @if($card->active===1) bg-emerald-500 @else bg-red-500 @endif"></span>

                            <h2 class=" font-normal @if($card->active===1) text-emerald-500 @else text-red-500 @endif">@if($card->active===1)
                                    Active
                                @else
                                    In-Active
                                @endif
                            </h2>
                        </div>

                        <x-Ui::button.delete wire:click="confirmDelete({{$card->id}})" class="text-red-500"/>
                    </div>

                </div>
            </div>
        @endforeach

    </div>

    <!-- Delete Modal --------------------------------------------------------------------------------------------->
    <x-Ui::modal.confirm-delete/>

    <div class="pt-5">{{ $list->links() }}</div>

    <!-- Create/ Edit Popup --------------------------------------------------------------------------------------->

    <x-Ui::forms.create :id="$vid">
        <div class="flex flex-col gap-5">

            <div>
                <x-Ui::input.floating wire:model="title" label="Job title"/>
                <x-Ui::input.error-text wire:model="title"/>
            </div>

            <div>
                <x-Ui::input.rich-text wire:model="content" label="Job Description"/>
                <x-Ui::input.error-text wire:model="content"/>
            </div>


            {{--                <div>--}}
            {{--                    <x-Ui::input.floating wire:model="status" label="Status"/>--}}
            {{--                    <x-Ui::input.error-text wire:model="status"/>--}}
            {{--                </div>--}}

        </div>

    </x-Ui::forms.create>
</div>
