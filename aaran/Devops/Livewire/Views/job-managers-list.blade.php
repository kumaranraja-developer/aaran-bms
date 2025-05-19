<div>
    <x-slot name="header">JobManager</x-slot>
    <x-Ui::forms.m-panel>
        <x-Ui::alerts.notification/>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-Ui::forms.top-controls :show-filters="$showFilters"/>

        <!-- Table Caption -------------------------------------------------------------------------------------------->
        <x-Ui::table.caption :caption="'JobManager'">
            {{$list->count()}}
        </x-Ui::table.caption>

        <!-- Table Data ----------------------------------------------------------------------------------------------->

        <x-Ui::table.form>
            <x-slot:table_header>
                <x-Ui::table.header-serial/>
                <x-Ui::table.header-text wire:click.prevent="sortBy('id')" sortIcon="{{$sortAsc}}" :left="true">
                    Title
                </x-Ui::table.header-text>
                <x-Ui::table.header-text>
                    Content
                </x-Ui::table.header-text>
                <x-Ui::table.header-text >
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
            <x-Ui::input.floating wire:model="title" label="Job title"/>
            <x-Ui::input.error-text wire:model="title"/>
            <x-Ui::input.floating wire:model="content" label="Job Description"/>
            <x-Ui::input.error-text wire:model="content"/>
            <x-Ui::input.floating wire:model="status" label="Status"/>
            <x-Ui::input.error-text wire:model="status"/>

        </x-Ui::forms.create>

    </x-Ui::forms.m-panel>
</div>
