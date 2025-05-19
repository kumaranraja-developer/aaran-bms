<div>
    <x-slot name="header">Job Manager</x-slot>
    <x-Ui::forms.m-panel>
        <x-Ui::alerts.notification/>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-Ui::forms.top-controls :show-filters="$showFilters"/>

        <!-- Table Caption -------------------------------------------------------------------------------------------->
        <x-Ui::table.caption :caption="'Job Manager'">
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
                <x-Ui::table.header-status/>
                <x-Ui::table.header-action/>
            </x-slot:table_header>

            <x-slot:table_body>
                @foreach($list as $index=>$row)
                    @php
                        $link = route('task-managers',[$row->id])
                    @endphp
                    <x-Ui::table.row>

                        <x-Ui::table.cell-link :href="$link">{{$index+1}}</x-Ui::table.cell-link>

                        <x-Ui::table.cell-link :href="$link" left>
                            {{$row->title}}
                        </x-Ui::table.cell-link>

                        <x-Ui::table.cell-link :href="$link" left>
                            {!! \Illuminate\Support\Str::limit($row->content,50) !!}
                        </x-Ui::table.cell-link>

                        <x-Ui::table.cell-status :href="$link" active="{{$row->active_id}}"/>

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

    </x-Ui::forms.m-panel>
</div>


