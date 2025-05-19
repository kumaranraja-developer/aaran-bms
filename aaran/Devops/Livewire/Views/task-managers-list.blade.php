<div>
    <x-slot name="header">TaskManager</x-slot>
    <x-Ui::forms.m-panel>
        <x-Ui::alerts.notification/>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-Ui::forms.top-controls :show-filters="$showFilters"/>

        <!-- Table Caption -------------------------------------------------------------------------------------------->
        <x-Ui::table.caption :caption="'TaskManager'">
            {{$list->count()}}
        </x-Ui::table.caption>

        <!-- Table Data ----------------------------------------------------------------------------------------------->

        <x-Ui::table.form>
            <x-slot:table_header>
                <x-Ui::table.header-serial/>
                <x-Ui::table.header-text wire:click.prevent="sortBy('id')" sortIcon="{{$sortAsc}}" :left="true">
                    title
                </x-Ui::table.header-text>
                <x-Ui::table.header-text wire:click.prevent="sortBy('id')" sortIcon="{{$sortAsc}}" :left="true">
                    Content
                </x-Ui::table.header-text>
                <x-Ui::table.header-text>
                    Start Time
                </x-Ui::table.header-text>
                <x-Ui::table.header-text>
                    Due Time
                </x-Ui::table.header-text>
                <x-Ui::table.header-text>
                    Assigned
                </x-Ui::table.header-text>
                <x-Ui::table.header-text>
                    Job Id
                </x-Ui::table.header-text>
                <x-Ui::table.header-text>
                    Priority
                </x-Ui::table.header-text>
                <x-Ui::table.header-text>
                    Status
                </x-Ui::table.header-text>
                <x-Ui::table.header-status/>
                <x-Ui::table.header-action/>
            </x-slot:table_header>

            <x-slot:table_body>
                @foreach($list as $index=>$row)
                    <x-Ui::table.row>
                        <x-Ui::table.cell-text>{{$index+1}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->title}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->content}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->start_time}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->due_time}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->assigned}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->job_id}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->priority}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->status}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-status active="{{$row->active_id}}"/>
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
            <x-Ui::input.floating wire:model="title" label="Title"/>
            <x-Ui::input.error-text wire:model="title"/>
            <x-Ui::input.floating wire:model="content" label="Content"/>
            <x-Ui::input.error-text wire:model="content"/>
            <x-Ui::input.floating wire:model="start_time" label="Start Time"/>
            <x-Ui::input.error-text wire:model="start_time"/>
            <x-Ui::input.floating wire:model="due_time" label="Due Time"/>
            <x-Ui::input.error-text wire:model="due_time"/>
            <x-Ui::input.floating wire:model="assigned" label="Assigned"/>
            <x-Ui::input.error-text wire:model="assigned"/>
            <x-Ui::input.floating wire:model="job_id" label="Job Id"/>
            <x-Ui::input.error-text wire:model="job_id"/>
            <x-Ui::input.floating wire:model="priority" label="Priority"/>
            <x-Ui::input.error-text wire:model="priority"/>
            <x-Ui::input.floating wire:model="status" label="Priority"/>
            <x-Ui::input.error-text wire:model="status"/>
        </x-Ui::forms.create>

    </x-Ui::forms.m-panel>
</div>
