<div class="px-5 sm:px-10 lg:px-40">
    <x-slot name="header">Activity</x-slot>

    <x-Ui::forms.m-panel>

        <div class="max-w-7xl mx-auto space-y-5 font-lex ">

            <div class="inline-flex 1space-x-2 font-merri">
                <div class="text-5xl text-gray-700 dark:text-dark-9">{{$task->task_id}}.</div>

                <div class="text-5xl font-bold tracking-wider capitalize text-gray-700 dark:text-dark-9">
                    {{$task->title}}
                </div>
            </div>

            <div class="hidden lg:flex justify-between">
                <div class="flex flex-row my-1 gap-5">
                    <a href="{{route('task-managers',$task->job_id)}}"
                       class="text-sm text-gray-600 gap-x-3 inline-flex items-center font-semibold hover:underline
                       hover:decoration-blue-600 hover:text-blue-600 transition-all duration-300 ease-in-out">

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
                                class="text-blue-500">{{ $task ->title}}</span>
                        </div>

                        <div
                            class="text-gray-600 my-0.5">
                            Module :
                            <span
                                class="text-blue-500">
                                {{ $task->module_name }}
                            </span>
                        </div>
                    </div>
                </div>

                <div>
                    <x-Ui::button.edit wire:click="editTask"/>
                </div>
            </div>

            <div>
                <x-Ui::slider.carousel-light-box :images="$taskImage"/>
            </div>

            <!--User Data ------------------------------------------------------------------------------------------------>

            <div
                class="flex flex-col sm:grid grid-cols-3 gap-y-3 lg:grid-cols-5 font-semibold text-sm font-lex gap-x-5">
                <div class="w-[80%] flex justify-between items-center">
                    <span>Created By:</span>
                    <span class="text-red-600">{{ \Aaran\Core\User\Models\User::getName($task->reporter_id) }}</span>
                </div>

                <div class="text-gray-600">  {{$task->created_at}}</div>

                <div class="w-[80%] flex justify-between items-center">
                    <span>Allocated To :</span>
                    <span
                        class="text-indigo-600">{{ \Aaran\Core\User\Models\User::getName($task->allocated_id)}}</span>
                </div>

                <div class="w-[80%] flex justify-between items-center">
                    <div> Priority To :</div>

                    <div
                        class="text-xs px-4 h-max w-max block my-auto rounded-full py-1
                    {{ \Aaran\Assets\Enums\Priority::tryFrom($task->priority_id)->getStyle() }}">
                        {{ \Aaran\Assets\Enums\Priority::tryFrom($task->priority_id)->getName() }}</div>
                </div>

                <div class="w-[80%] flex justify-between items-center">
                    <div> Status :</div>
                    <div
                        class="text-xs px-4 w-max rounded-full py-1
                    {{ \Aaran\Assets\Enums\Status::tryFrom($task->status_id)->getStyle()}}">
                        {{ \Aaran\Assets\Enums\Status::tryFrom($task->status_id)->getName() }}</div>
                </div>
            </div>

            <div class="text-sm text-justify leading-loose ">{!! $task->body !!}</div>
            <div class="border-b-2 border-gray-600">&nbsp;</div>

        </div>


        <!-- Activity ----------------------------------------------------------------------------------------->

        <div class="w-full space-y-4 font-lex pr-2">
            @forelse($activities as $index=>$row)
                <div class=" border border-gray-200 rounded-lg dark:bg-dark-4 dark:text-dark-9">
                    <div>
                        <div
                            class="text-slate-700 text-sm bg-white capitalize rounded-lg dark:bg-dark-4 p-3 dark:text-dark-9">
                            {!! $row->vname !!}
                        </div>

                        <div class="flex justify-between items-center p-3 rounded-lg dark:bg-dark-4 dark:text-dark-9">
                            <div class="flex flex-col items-center">
                                <div class="flex justify-center gap-x-2">
                                    <div
                                        class="text-xs px-2 py-1 rounded-full mx-1
                                        {{ \Aaran\Assets\Enums\Status::tryFrom($row->status_id)->getStyle() }}">
                                        {{  \Aaran\Assets\Enums\Status::tryFrom($row->status_id)->getName() }}</div>


                                    <div class="flex-row flex text-sm space-x-2 mt-0.5">
                                        <div class="text-indigo-600">
                                            {{\Aaran\Core\User\Models\User::getName($row->user_id)}}</div> &nbsp;&nbsp;|&nbsp;&nbsp;
                                        <div
                                            class="text-gray-600 text-xs my-0.5 dark:text-dark-9"> {{ \Carbon\Carbon::parse($row->created_at)->diffForHumans() }}  </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-center items-center gap-3 self-center ">
                                <x-Ui::button.edit wire:click="editActivity({{$row->id}})" class="text-blue-500"/>
                                <x-Ui::button.delete wire:click="confirmDelete({{$row->id}})" class="text-red-500"/>

                            </div>
                        </div>
                    </div>

                </div>
            @empty
                <div class="flex-col flex justify-start items-center border rounded-md">
                    <div class="w-full bg-gray-100 p-2 dark:bg-dark-4 dark:text-dark-9 rounded-md">No Activities yet
                    </div>
                    <div class="w-full px-2 py-4">Empty Remarks</div>
                </div>
            @endforelse
        </div>

        <x-Ui::modal.confirm-delete/>

        <!-- Create Activity -------------------------------------------------------------------------------------->

        <div class="w-full space-y-5 pt-8">
            <span class="my-2">Activity</span>

            <div class="bg-gray-200 rounded-lg border border-gray-700  dark:text-dark-9">
                <x-Ui::input.textarea :label="'comments'" type="textarea" wire:model="vname"/>
            </div>

            <div class="w-full flex sm:flex-row flex-col justify-between gap-4">
                <x-Ui::input.floating wire:model="start_on" :label="'Start_On'" type="date"/>
                <x-Ui::input.floating wire:model="end_on" :label="'End_On'" type="date"/>
            </div>


            <div class="w-full items-center justify-between">
                <div class="w-full">

                    <x-Ui::input.floating-dropdown
                        wire:model="status_id"
                        label="Status"
                        id="status_id"
                        :options="$statuses"
                        placeholder=""
                    />

                </div>

                <div class="w-full mt-4 flex items-center justify-end ">
                    <button wire:click.prevent="getSaveActivity"
                            class="bg-green-600 text-white px-4 py-2 rounded-md">
                        Post Activity
                    </button>
                </div>

            </div>

        </div>


    </x-Ui::forms.m-panel>


    <!--Create Record ------------------------------------------------------------------------------------------------->

    <x-Ui::forms.create :id="$vid" :max-width="'6xl'">

        <!--Left Side ------------------------------------------------------------------------------------------------->
        <div class="flex flex-col sm:flex-row gap-y-3 space-x-5 w-full">
            <div class="flex flex-col space-y-5 w-full">

                <div>
                    <x-Ui::input.floating wire:model="title" :label="'Title'"/>
                    @error('title')
                    <div class="text-xs text-red-500">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div>
                    <x-Ui::input.rich-text wire:model="body" :placeholder="'Content'"/>
                    @error('body')
                    <div class="text-xs text-red-500 mt-2">
                        {{$message}}
                    </div>
                    @enderror
                </div>

            </div>

            <!--Right Side -------------------------------------------------------------------------------------------->

            <div class="flex flex-col space-y-5 w-full">

                @livewire('devops::module-lookup')

                <div>
                    <x-Ui::input.floating-dropdown
                        wire:model="allocated_id"
                        label="Allocated to"
                        id="allocated_id"
                        :options="$users"
                        placeholder="Choose a .."
                    />
                    <x-Ui::input.error-text wire:model="plan_id"/>
                </div>

                <div>
                    <x-Ui::input.floating-dropdown
                        wire:model="priority_id"
                        label="Priority"
                        id="priority_id"
                        :options="$priorities"
                        placeholder=""
                    />
                    <x-Ui::input.error-text wire:model="priority_id"/>
                </div>

                <!-- Image  ----------------------------------------------------------------------------------------------->

                <div class="flex flex-col py-2">
                    <label for="bg_image"
                           class="w-full text-zinc-500 tracking-wide pb-4 px-2">Image</label>

                    <div class="flex flex-wrap gap-2">

                        <div class="relative">
                            <div>
                                <label for="bg_image"
                                       class="text-gray-500 font-semibold text-base rounded flex flex-col items-center
                                   justify-center cursor-pointer border-2 border-gray-300 border-dashed p-2
                                   mx-auto font-[sans-serif]">
                                    <x-Ui::icons.icon icon="cloud-upload" class="w-8 h-auto block text-gray-400"/>
                                    Upload Photo
                                    <input type="file" id='bg_image' wire:model="images" class="hidden" multiple/>
                                    <p class="text-xs font-light text-gray-400 mt-2">PNG and JPG are
                                        Allowed.</p>
                                </label>
                            </div>

                            <div wire:loading wire:target="images" class="z-10 absolute top-6 left-12">
                                <div class="w-14 h-14 rounded-full animate-spin
                                                        border-y-4 border-dashed border-green-500 border-t-transparent"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-shrink-0 mt-4 w-full overflow-auto">
            <div>
                @if($images)
                    <div class="flex gap-5">
                        @foreach($images as $image)
                            <div
                                class=" flex-shrink-0 border-2 border-dashed border-gray-300 p-1 rounded-lg overflow-auto">
                                <img
                                    class="w-[156px] h-[89px] rounded-lg hover:brightness-110 hover:scale-105 duration-300 transition-all ease-out"
                                    src="{{ $image->temporaryUrl() }}"
                                    alt="{{$image?:''}}"/>
                            </div>
                        @endforeach
                    </div>
                @endif

                @if(isset($old_images))
                    <div class="flex gap-5 mt-10">
                        @foreach($old_images as $old_image)

                            <div
                                class=" flex-shrink-0 border-2 border-dashed border-gray-300 p-1 rounded-lg overflow-hidden">
                                <img
                                    class="w-[156px] h-[89px] rounded-lg hover:brightness-110 hover:scale-105 duration-300 transition-all ease-out"
                                    src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$old_image['image']))}}"
                                    alt="">
                                <div class="flex justify-center items-center">
                                    <x-Ui::button.delete
                                        wire:click="DeleteImage({{$old_image['id']}})"
                                    />
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <x-Ui::icons.icon :icon="'logo'" class="w-auto h-auto block "/>
                @endif
            </div>
        </div>
    </x-Ui::forms.create>

</div>
