<div class="bg-white dark:bg-dark">
    <x-slot name="header">Job Manager</x-slot>

    <!-- Top Controls --------------------------------------------------------------------------------------------->
    <x-Ui::forms.top-controls :show-filters="$showFilters"/>

    <!-- Table Caption -------------------------------------------------------------------------------------------->
    <x-Ui::table.caption :caption="'Job Manager'">
        {{$list->count()}}
    </x-Ui::table.caption>

    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-5 gap-5 p-5 ">

        @foreach($list as $card)
            @php
                $link = route('task-managers',[$card->id])
            @endphp

            <div
                class="bg-white border border-gray-50 dark:border-gray-500 dark:bg-dark-4 dark:text-dark-9 text-black p-6 flex flex-col h-full rounded-lg gap-3 hover:scale-103 shadow-lg hover:shadow-xl transition duration-300">
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

                <div class="pt-2 flex flex-col gap-y-4 items-center">

                    <img class="h-24 w-full"
                         src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$card->image))}}"
                         alt="">

                    <div class="flex justify-between w-full gap-3 items-center">

                        <div
                            class="inline-flex items-center w-full px-3 py-1 rounded-xl gap-x-2 {{$card->active_id===1 ? 'bg-emerald-100/60' : 'bg-red-100/60' }} ">

                            <span
                                class="h-1.5 w-1.5  rounded-full {{$card->active_id===1 ? 'bg-emerald-500' : 'bg-red-500' }}"></span>

                            <h2 class="font-normal">
                                {{$card->active_id===1 ? 'Active' : 'In-Active' }}
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

            <div class="flex flex-col py-2">
                <label for="bg_image"
                       class="w-full text-zinc-500 tracking-wide pb-4 px-2">Image</label>

                <div class="flex flex-wrap sm:gap-6 gap-2">
                    <div class="flex-shrink-0">
                        <div>
                            @if($image)
                                <div
                                    class=" flex-shrink-0 bg-blue-100 p-1 rounded-lg overflow-hidden">
                                    <img
                                        class="w-[156px] h-[89px] rounded-lg hover:brightness-110 hover:scale-105 duration-300 transition-all ease-out"
                                        src="{{ $image->temporaryUrl() }}"
                                        alt="{{$image?:''}}"/>
                                </div>
                            @endif

                            @if(!$image && isset($image))
                                <img class="h-24 w-full"
                                     src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$old_image))}}"
                                     alt="">
                            @endif
                        </div>
                    </div>

                    <div class="relative">
                        <div>
                            <label for="bg_image"
                                   class="text-gray-500 font-semibold text-base rounded flex flex-col items-center
                                   justify-center cursor-pointer border-2 border-gray-300 border-dashed p-2
                                   mx-auto font-[sans-serif]">
                                <x-Ui::icons.icon icon="cloud-upload" class="w-8 h-auto block text-gray-400"/>
                                Upload Photo
                                <input type="file" id='bg_image' wire:model="image" class="hidden"/>
                                <p class="text-xs font-light text-gray-400 mt-2">PNG and JPG are
                                    Allowed.</p>
                            </label>
                        </div>

                        <div wire:loading wire:target="image" class="z-10 absolute top-6 left-12">
                            <div class="w-14 h-14 rounded-full animate-spin
                                                        border-y-4 border-dashed border-green-500 border-t-transparent"></div>
                        </div>
                    </div>

                </div>
            </div>


        </div>

    </x-Ui::forms.create>
</div>
