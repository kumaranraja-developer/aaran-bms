<div>
    <x-slot name="header">Task</x-slot>
    {{--    {{dd($taskData)}}--}}

    <!-- Top Control ------------------------------------------------------------------------------------------------>

    <x-Ui::forms.m-panel>
        <div class="max-w-7xl mx-auto space-y-5 font-lex ">

            <div class="inline-flex 1space-x-2 font-merri">
                <div class="text-5xl text-gray-700">{{$taskData->id}}.</div>
                <div class="text-5xl font-bold tracking-wider capitalize text-gray-700">{{$taskData->title}}</div>
            </div>


            <div class="hidden lg:flex justify-between">
                <div class="flex flex-row my-1 gap-5">
                    <a href="{{route('task-shows',$taskData->id)}}"
                       class="text-sm text-gray-600 gap-x-3 inline-flex items-center font-semibold hover:underline hover:decoration-blue-600 hover:text-blue-600 transition-all duration-300 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                            <path fill-rule="evenodd"
                                  d="M4.72 9.47a.75.75 0 0 0 0 1.06l4.25 4.25a.75.75 0 1 0 1.06-1.06L6.31 10l3.72-3.72a.75.75 0 1 0-1.06-1.06L4.72 9.47Zm9.25-4.25L9.72 9.47a.75.75 0 0 0 0 1.06l4.25 4.25a.75.75 0 1 0 1.06-1.06L11.31 10l3.72-3.72a.75.75 0 0 0-1.06-1.06Z"
                                  clip-rule="evenodd"/>
                        </svg>
                        Back to Task
                    </a>
                    <div class="flex flex-row gap-2 text-md capitalize">
                        <div
                            class="text-gray-600 my-0.5">Job :
                            <span
                                class="text-blue-500">{{ \Aaran\Core\User\Models\User::getName($taskData->job_id)}}</span>
                            &nbsp;|
                        </div>

                        <div
                            class="text-gray-600 my-0.5">
                            Module :
                            <span
                                class="text-blue-500">{{ $taskData->module->vname }}</span>
                        </div>
                    </div>
                </div>

                <div>
                    <x-Ui::button.edit wire:click="editTask"/>
                </div>
            </div>

            <div class="w-full shadow-md shadow-gray-700 rounded-lg overflow-hidden">
                @if($taskImage)

                    <div class="w-full h-[40rem] md:h-[40rem] overflow-hidden ">
                        <div x-data="{
            slides: [
                @foreach($taskImage as $row)
                                {
                                    imgSrc: '{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$row['image']))}}',
                                    imgAlt: '{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$row['image']))}}',
                                },
                 @endforeach
                                ],
                                currentSlideIndex: 1,
                                previous() {
                                    if (this.currentSlideIndex > 1) {
                                        this.currentSlideIndex = this.currentSlideIndex - 1
                                    } else {
                                        // If it's the first slide, go to the last slide
                                        this.currentSlideIndex = this.slides.length
                                    }
                                },
                                next() {
                                    if (this.currentSlideIndex < this.slides.length) {
                                        this.currentSlideIndex = this.currentSlideIndex + 1
                                    } else {
                                        // If it's the last slide, go to the first slide
                                        this.currentSlideIndex = 1
                                    }
                                },
                            }" class="relative w-full overflow-hidden ">

                            <!-- previous button -->
                            <button type="button"
                                    class="absolute left-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-slate-700 transition hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 active:outline-offset-0 dark:bg-slate-900/40 dark:text-slate-300 dark:hover:bg-slate-900/60 dark:focus-visible:outline-blue-600"
                                    aria-label="previous slide" x-on:click="previous()">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor"
                                     fill="none" stroke-width="3" class="size-5 md:size-6 pr-0.5" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15.75 19.5 8.25 12l7.5-7.5"/>
                                </svg>
                            </button>

                            <!-- next button -->
                            <button type="button"
                                    class="absolute right-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-slate-700 transition hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 active:outline-offset-0 dark:bg-slate-900/40 dark:text-slate-300 dark:hover:bg-slate-900/60 dark:focus-visible:outline-blue-600"
                                    aria-label="next slide" x-on:click="next()">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor"
                                     fill="none" stroke-width="3" class="size-5 md:size-6 pl-0.5" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                                </svg>
                            </button>

                            <!-- slides -->
                            <div class="relative h-[40rem] md:h-[40rem] w-full overflow-hidden ">
                                <template x-for="(slide, index) in slides" class="">
                                    <div x-cloak x-show="currentSlideIndex == index + 1" class="absolute inset-0"
                                         x-transition.opacity.duration.300ms>
                                        <img
                                            class="absolute w-full h-full inset-0 text-slate-700 dark:text-slate-300 "
                                            x-bind:src="slide.imgSrc" x-bind:alt="slide.imgAlt"/>
                                    </div>
                                </template>
                            </div>

                        </div>
                    </div>

                @else
                    <img
                        src="https://grcviewpoint.com/wp-content/uploads/2022/11/Time-to-Correct-A-Long-standing-Curriculum-Coding-Error-Say-Experts-GRCviewpoint.jpg"
                        class="w-full h-[45rem] object-cover rounded-lg"
                        alt="view of a coastal Mediterranean village on a hillside, with small boats in the water."/>
                @endif
            </div>

            <!--User Data ------------------------------------------------------------------------------------------------>

            <div class="flex  items-center font-semibold text-sm font-lex gap-x-5">
                <div>Created By : <span
                        class="text-red-600">{{ \Aaran\Core\User\Models\User::getName($taskData->reporter_id)}}</span>
                </div>
                <div class="border-l-2 h-5 border-gray-400"></div>

                <div class="text-gray-600">  {{$taskData->created_at->diffForHumans()}}</div>
                <div class="border-l-2 h-5 border-gray-400"></div>
                <div> Allocated To : <span
                        class="text-indigo-600">{{ \Aaran\Core\User\Models\User::getName($taskData->allocated_id)}}</span>
                </div>
                <div class="border-l-2  h-5 border-gray-400"></div>

                <div> Priority To :</div>
                <div
                    class="text-xs px-2 rounded-full py-0.5
                    {{ \Aaran\Assets\Enums\Priority::tryFrom($taskData->priority_id)->getStyle() }}">
                    {{ \Aaran\Assets\Enums\Priority::tryFrom($taskData->priority_id)->getName() }}</div>
                <div class="border-l-2 h-5 border-gray-400"></div>

                <div> Status :</div>
                <div
                    class="text-xs px-2 rounded-full py-0.5
                    {{ \Aaran\Assets\Enums\Status::tryFrom($taskData->status_id)->getStyle()}}">
                    {{ \Aaran\Assets\Enums\Status::tryFrom($taskData->status_id)->getName() }}</div>
            </div>

            <div class="text-sm text-justify leading-loose ">{!! $taskData->body !!}</div>
            <div class="border-b-2 border-gray-600">&nbsp;</div>

            <!-- Activity ----------------------------------------------------------------------------------------->

            <div class="w-full space-y-4 font-lex pr-2">
                @forelse($list as $index=>$row)
                    <div class=" border border-gray-200 rounded-lg">
                        <div class="flex justify-between items-center p-3 border-b bg-gray-50 ">
                            <div class="flex flex-col items-center">
                                <div class="flex justify-center gap-x-2">
                                    <div
                                        class="text-xs px-2 py-1 rounded-full mx-1
                                        {{ \Aaran\Assets\Enums\Status::tryFrom($row->status_id)->getStyle() }}">
                                        {{  \Aaran\Assets\Enums\Status::tryFrom($row->status_id)->getName() }}</div>


                                    <div class="flex-row flex text-sm space-x-2 mt-0.5">
                                        <div class="text-indigo-600">{{$row->user->name}}</div> &nbsp;&nbsp;|
                                        <div
                                            class="text-gray-600 text-xs my-0.5"> {{$row->created_at->diffForHumans()}}  </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-center items-center gap-3 self-center">
                                <x-Ui::button.edit wire:click="editActivity({{$row->id}})"/>
                                <x-Ui::button.danger-x wire:click="getDelete({{$row->id}})"/>
                            </div>
                        </div>

                        <div class="flex flex-row p-3 text-justify ml-8 gap-x-3">
                            <div class="w-6 h-6 rounded-full overflow-hidden">
                                <img src="{{$row->user->profile_photo_url}}" alt="">
                            </div>
                            <div
                                class="text-slate-700 text-sm bg-white capitalize"> {!! $row->vname !!} </div>
                        </div>
                    </div>
                @empty
                    <div class="flex-col flex justify-start items-center border rounded-md">
                        <div class="w-full bg-gray-100 p-2 ">No Activities yet</div>
                        <div class="w-full px-2 py-4">Empty Remarks</div>
                    </div>
                @endforelse
            </div>

            <!-- Create Activity -------------------------------------------------------------------------------------->

            <div class="w-full space-y-5 pt-8">
                <span class="my-2">Activity</span>

                <div class="bg-gray-200 p-1 rounded-md">
                    <x-Ui::input.textarea :label="'comments'" type="textarea" wire:model="common.vname"/>
                </div>

                <div class="w-full flex justify-between gap-4">
                    <x-Ui::input.floating wire:model="start_on" :label="'Start_On'" type="date"/>

                    <x-Ui::input.floating wire:model="end_on" :label="'End_On'" type="date"/>
                </div>


                {{--                <x-tabs.tab-panel>--}}
                {{--                    <x-slot name="tabs">--}}
                {{--                        <x-tabs.tab>Activity</x-tabs.tab>--}}
                {{--                        <x-tabs.tab>Duration</x-tabs.tab>--}}
                {{--                        <x-tabs.tab>Remarks</x-tabs.tab>--}}
                {{--                    </x-slot>--}}

                {{--                    <x-slot name="content">--}}
                {{--                        <x-tabs.content>--}}
                {{--                            <x-input.model-date wire:model="cdate" :label="'Date'"/>--}}

                {{--                            <x-input.rich-text wire:model="common.vname" :placeholder="'Write your comments'"/>--}}

                {{--                          --}}
                {{--                        </x-tabs.content>--}}

                {{--                        <x-tabs.content>--}}
                {{--                            <x-input.floating wire:model="estimated" :label="'Estimate'"/>--}}

                {{--                            <x-input.floating wire:model="duration" :label="'Duration'"/>--}}

                {{--                          --}}
                {{--                        </x-tabs.content>--}}

                {{--                        <x-tabs.content>--}}

                {{--                            <x-input.rich-text wire:model="remarks" :placeholder="'Write your remarks'"/>--}}
                {{--                        </x-tabs.content>--}}

                {{--                    </x-slot>--}}
                {{--                </x-tabs.tab-panel>--}}

                <div class="w-full items-center justify-between">
                    <div class="w-3/12">
{{--                        <x-Ui::input.model-select wire:model="status_id" :label="'Status'">--}}
{{--                            <option value="">Choose...</option>--}}
{{--                            @foreach( \Aaran\Assets\Enums\Status::cases() as $status)--}}
{{--                                <option value="{{$status->value}}">{{$status->getName()}}</option>--}}
{{--                            @endforeach--}}
{{--                        </x-Ui::input.model-select>--}}
                    </div>

                    <div class="w-full flex items-center justify-end ">
                        <button wire:click.prevent="getSaveActivity"
                                class="bg-green-600 text-white px-4 py-2 rounded-md">
                            Post Activity
                        </button>
                    </div>

                </div>

            </div>
        </div>
        <x-Ui::modal.confirm-delete/>

        <!-- Edit Model ----------------------------------------------------------------------------------------------->


    </x-Ui::forms.m-panel>
</div>
