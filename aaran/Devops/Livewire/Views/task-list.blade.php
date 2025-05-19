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
                        $link = route('task-comments',[$row->id])
                    @endphp
                    <x-Ui::table.row>

                        <x-Ui::table.cell-link :href="$link">{{$index+1}}</x-Ui::table.cell-link>

                        <x-Ui::table.cell-link :href="$link" left>
                            {{$row->title}}
                        </x-Ui::table.cell-link>

                        <x-Ui::table.cell-link :href="$link" left>
                            {!! \Illuminate\Support\Str::limit($row->body,50) !!}
                        </x-Ui::table.cell-link>

                        <x-Ui::table.cell-link :href="$link">{{$row->due_date}}</x-Ui::table.cell-link>

                        <x-Ui::table.cell-link :href="$link">{{$row->assigned_id}}</x-Ui::table.cell-link>

                        <x-Ui::table.cell-link :href="$link">
                            {{\Aaran\Assets\Enums\Priority::tryFrom($row->priority_id)->getName()}}
                        </x-Ui::table.cell-link>

                        <x-Ui::table.cell-link :href="$link">
                            {{\Aaran\Assets\Enums\Status::tryFrom($row->status_id)->getName()}}
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

                <div class="flex flex-row justify-between gap-5">
                    <div class="w-full">
                        <div>
                            <x-Ui::input.floating-dropdown
                                wire:model="priority_id"
                                label="Priority"
                                id="priority_id"
                                :options="$priorities"
                                placeholder="Choose a .."
                            />
                            <x-Ui::input.error-text wire:model="priority_id"/>
                        </div>
                    </div>

                    <div class="w-full">
                        <div>
                            <x-Ui::input.floating-dropdown
                                wire:model="status_id"
                                label="Status"
                                id="status_id"
                                :options="$statuses"
                                placeholder="Choose a .."
                            />
                            <x-Ui::input.error-text wire:model="status_id"/>
                        </div>
                    </div>
                </div>
            </div>
        </x-Ui::forms.create>

    </x-Ui::forms.m-panel>
</div>
