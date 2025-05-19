<div>
    <x-slot name="header">JobImages</x-slot>
    <x-Ui::forms.m-panel>
        <x-Ui::alerts.notification/>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-Ui::forms.top-controls :show-filters="$showFilters"/>

        <!-- Table Caption -------------------------------------------------------------------------------------------->
        <x-Ui::table.caption :caption="'Job Images'">
            {{$list->count()}}
        </x-Ui::table.caption>

        <!-- Table Data ----------------------------------------------------------------------------------------------->

        <x-Ui::table.form>
            <x-slot:table_header>
                <x-Ui::table.header-serial/>
                <x-Ui::table.header-text wire:click.prevent="sortBy('id')" sortIcon="{{$sortAsc}}" :left="true">
                    Model
                </x-Ui::table.header-text>
                <x-Ui::table.header-text>
                    Model ID
                </x-Ui::table.header-text>
                <x-Ui::table.header-text >
                    Image ID
                </x-Ui::table.header-text>
                <x-Ui::table.header-text>
                    Path
                </x-Ui::table.header-text>
                <x-Ui::table.header-status/>
                <x-Ui::table.header-action/>
            </x-slot:table_header>

            <x-slot:table_body>
                @foreach($list as $index=>$row)
                    <x-Ui::table.row>
                        <x-Ui::table.cell-text>{{$index+1}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->model}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->model_id}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->image_id}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->path}}</x-Ui::table.cell-text>
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
            <x-Ui::input.floating wire:model="model" label="JobImages Name"/>
            <x-Ui::input.error-text wire:model="model"/>
            <x-Ui::input.floating wire:model="model_id" label="JobImages Name"/>
            <x-Ui::input.error-text wire:model="model_id"/>
            <x-Ui::input.floating wire:model="image_id" label="JobImages Name"/>
            <x-Ui::input.error-text wire:model="image_id"/>
            <x-Ui::input.floating wire:model="path" label="JobImages Name"/>
            <x-Ui::input.error-text wire:model="path"/>
        </x-Ui::forms.create>

    </x-Ui::forms.m-panel>
</div>
