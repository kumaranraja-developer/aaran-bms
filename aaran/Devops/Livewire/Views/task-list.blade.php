<div>
    <x-slot name="header">Task Manager</x-slot>
    <x-Ui::forms.m-panel>
        <x-Ui::alerts.notification/>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-Ui::forms.top-controls :show-filters="$showFilters"/>

        <!-- Table Caption -------------------------------------------------------------------------------------------->
        <x-Ui::table.caption :caption="'Task Manager'">
            {{$list->count()}}
        </x-Ui::table.caption>

        <!-- Table Data ----------------------------------------------------------------------------------------------->

        <x-Ui::table.form>
            <x-slot:table_header>
                <x-Ui::table.header-serial/>

                <x-Ui::table.header-text wire:click.prevent="sortBy('id')" sortIcon="{{$sortAsc}}" :left="true">
                    Title
                </x-Ui::table.header-text>

                <x-Ui::table.header-text wire:click.prevent="sortBy('id')" sortIcon="{{$sortAsc}}" :left="true">
                    Content
                </x-Ui::table.header-text>

                {{-- <x-Ui::table.header-text sortIcon="none">Start Time</x-Ui::table.header-text>--}}

                <x-Ui::table.header-text sortIcon="none">Due date</x-Ui::table.header-text>

                <x-Ui::table.header-text sortIcon="none">Assigned</x-Ui::table.header-text>

                {{-- <x-Ui::table.header-text sortIcon="none">Job Id</x-Ui::table.header-text>--}}

                <x-Ui::table.header-text sortIcon="none">Priority</x-Ui::table.header-text>

                <x-Ui::table.header-status/>

                <x-Ui::table.header-action/>
            </x-slot:table_header>

            <x-slot:table_body>
                @foreach($list as $index=>$row)
                    @php
                        $link = route('task-shows',[$row->id])
                    @endphp
                    <x-Ui::table.row>

                        <x-Ui::table.cell-link :href="$link">{{$index+1}}</x-Ui::table.cell-link>

                        <x-Ui::table.cell-link :href="$link" left>
                            {{$row->title}}
                        </x-Ui::table.cell-link>

                        <x-Ui::table.cell-link :href="$link" left>
                            {!! \Illuminate\Support\Str::limit($row->body,50) !!}
                        </x-Ui::table.cell-link>

                        <x-Ui::table.cell-link :href="$link">
                            {{ date('d-m-Y', strtotime( $row->due_date))}}
                        </x-Ui::table.cell-link>

                        <x-Ui::table.cell-link :href="$link">
                            {{\Aaran\Core\User\Models\User::getName($row->assigned_id)}}
                        </x-Ui::table.cell-link>

                        <x-Ui::table.cell-link :href="$link">
                            <div class="{{ \Aaran\Assets\Enums\Priority::tryFrom($row->priority_id)->getStyle() }}">
                                {{\Aaran\Assets\Enums\Priority::tryFrom($row->priority_id)->getName()}}
                            </div>
                        </x-Ui::table.cell-link>

                        <x-Ui::table.cell-link :href="$link">
                            <div class="{{ \Aaran\Assets\Enums\Status::tryFrom($row->status_id)->getStyle() }}">
                            {{\Aaran\Assets\Enums\Status::tryFrom($row->status_id)->getName()}}
                            </div>
                        </x-Ui::table.cell-link>

                        <x-Ui::table.cell-action id="{{$row->id}}"/>

                    </x-Ui::table.row>
                @endforeach
            </x-slot:table_body>
        </x-Ui::table.form>

        <!-- Delete Modal --------------------------------------------------------------------------------------------->
        <x-Ui::modal.confirm-delete/>

        <div class="pt-5">{{ $list->links() }}</div>

        <!-- Create/ Edit Popup --------------------------------------------------------------------------------------->

        <x-Ui::forms.create :id="$vid">
            <div class="flex flex-col gap-5">
                <div>
                    <x-Ui::input.floating wire:model="title" label="Title"/>
                    <x-Ui::input.error-text wire:model="title"/>
                </div>

                <div>
                    <x-Ui::input.rich-text placeholder="Content goes here" wire:model="body" label="Content"/>
                    <x-Ui::input.error-text wire:model="body"/>
                </div>

                <div>
                    <x-Ui::input.model-date wire:model="due_date" label="Due Date"/>
                    <x-Ui::input.error-text wire:model="due_date"/>
                </div>

                <div>
                    <x-Ui::input.floating-dropdown
                        wire:model="assigned_id"
                        label="Assign to"
                        id="assigned_id"
                        :options="$users"
                        placeholder="Choose a .."
                    />
                    <x-Ui::input.error-text wire:model="plan_id"/>
                </div>


                <div>
                    <!-- Image  ---------------------------------------------------------------------------------------->

                    <label class="w-[10rem] text-zinc-500 tracking-wide py-2"></label>

                    <div class="flex flex-row flex-shrink-0 h-46 w-full gap-2">
                        Photo Preview:
                        @if($images)
                            @foreach($images as $index => $image)
                                <div class="flex gap-3">
                                    <img class="lg:max-h-32 w-auto bg-cover"
                                         src="{{$isUploaded? $image->temporaryUrl() : URL(\Illuminate\Support\Facades\Storage::url('images/'.$image)) }}"
                                         alt="{{$image}}">
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="relative">
                        <div>
                            <label for="bg_image"
                                   class="text-gray-500 font-semibold text-base rounded flex flex-col items-center
                                   justify-center cursor-pointer border-2 border-gray-300 border-dashed p-2
                                   mx-auto font-[sans-serif]">
                                <x-Ui::icons.icon icon="cloud-upload" class="w-8 h-auto block text-gray-400"/>
                                Upload Photo
                                <input type="file" id='bg_image' wire:model="images" multiple wire:change.debounce="taskImage()" class="hidden"/>
                                <p class="text-xs font-light text-gray-400 mt-2">PNG and JPG are
                                    Allowed.</p>
                            </label>
                        </div>

                        <div wire:loading wire:target="images" class="z-10 absolute top-6 left-12">
                            <div class="w-14 h-14 rounded-full animate-spin
                                                        border-y-4 border-dashed border-green-500 border-t-transparent"></div>
                        </div>
                    </div>

{{--                    <div>--}}
{{--                        <input type="file" wire:model="images" multiple wire:change.debounce="taskImage()">--}}
{{--                        <button wire:click.prevent="saveImage"></button>--}}
{{--                    </div>--}}
                </div>

                <div class="flex flex-row justify-between z-10 gap-5">
                    <div class="w-full">
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
                    </div>

                    <div class="w-full ">
                        <div>
                            <x-Ui::input.floating-dropdown
                                wire:model="status_id"
                                label="Status"
                                id="status_id"
                                :options="$statuses"
                                placeholder=""
                            />
                            <x-Ui::input.error-text wire:model="status_id"/>
                        </div>
                    </div>
                </div>
            </div>
        </x-Ui::forms.create>

    </x-Ui::forms.m-panel>
</div>
