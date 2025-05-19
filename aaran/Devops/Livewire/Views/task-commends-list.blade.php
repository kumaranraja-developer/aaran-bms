<div>
    <x-slot name="header">TaskCommends</x-slot>
    <x-Ui::forms.m-panel>
        <x-Ui::alerts.notification/>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-Ui::forms.top-controls :show-filters="$showFilters"/>

        <!-- Table Caption -------------------------------------------------------------------------------------------->
        <x-Ui::table.caption :caption="'TaskCommends'">
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
                    Commend
                </x-Ui::table.header-text>
                <x-Ui::table.header-text>
                    Job ID
                </x-Ui::table.header-text>
                <x-Ui::table.header-text>
                    Commend Id
                </x-Ui::table.header-text>
                <x-Ui::table.header-status/>
                <x-Ui::table.header-action/>
            </x-slot:table_header>

            <x-slot:table_body>
                @foreach($list as $index=>$row)
                    <x-Ui::table.row>
                        <x-Ui::table.cell-text>{{$index+1}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->title}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->commend}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->job_id}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->commend_id}}</x-Ui::table.cell-text>
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
            <x-Ui::input.floating wire:model="commend" label="Commend"/>
            <x-Ui::input.error-text wire:model="commend"/>
            <x-Ui::input.floating wire:model="job_id" label="Job ID"/>
            <x-Ui::input.error-text wire:model="job_id"/>
            <x-Ui::input.floating wire:model="commend_id" label="Commend ID"/>
            <x-Ui::input.error-text wire:model="commend_id"/>
        </x-Ui::forms.create>

    </x-Ui::forms.m-panel>
</div>
