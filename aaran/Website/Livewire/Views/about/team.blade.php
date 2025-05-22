<div>
    <x-slot name="header">Team List</x-slot>

    <x-Ui::forms.m-panel>


        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-Ui::forms.top-controls :show-filters="$showFilters"/>

        <!-- Table Caption -------------------------------------------------------------------------------------------->
        <x-Ui::table.caption :caption="'Team'">
            {{$list->count()}}
        </x-Ui::table.caption>

        <!-- Table Data ----------------------------------------------------------------------------------------------->

        <x-Ui::table.form>
            <x-slot:table_header>
                <x-Ui::table.header-serial/>
                <x-Ui::table.header-text wire:click.prevent="sortBy('id')" sortIcon="{{$sortAsc}}" :left="true">
                    Name
                </x-Ui::table.header-text>
                <x-Ui::table.header-text sortIcon="none">Role</x-Ui::table.header-text>
                <x-Ui::table.header-text sortIcon="none">Photo</x-Ui::table.header-text>
                <x-Ui::table.header-text sortIcon="none">About</x-Ui::table.header-text>
                <x-Ui::table.header-text sortIcon="none">Mail</x-Ui::table.header-text>
                <x-Ui::table.header-text sortIcon="none">Mobile</x-Ui::table.header-text>
                <x-Ui::table.header-text sortIcon="none">FB</x-Ui::table.header-text>
                <x-Ui::table.header-text sortIcon="none">Twitter</x-Ui::table.header-text>
                <x-Ui::table.header-text sortIcon="none">Msg</x-Ui::table.header-text>
                <x-Ui::table.header-status/>
                <x-Ui::table.header-action/>
            </x-slot:table_header>

            <x-slot:table_body>
                @foreach($list as $index=>$row)
                    <x-Ui::table.row>
                        <x-Ui::table.cell-text>{{$index+1}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->vname}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->role}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>
                            <img class="h-24 w-full"
                                 src="{{asset('images/teams/'.$row->photo)}}"
                                 alt="">
                            {{$row->photo}}
                        </x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left class="line-clamp-5">{{$row->about}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->mail}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->mobile}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->fb}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->twitter}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->msg}}</x-Ui::table.cell-text>
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
            <div class="flex flex-col gap-3">

                <div>
                    <x-Ui::input.floating wire:model="vname" label="Name"/>
                    <x-Ui::input.error-text wire:model="vname"/>
                </div>

                <x-Ui::input.floating wire:model="role" label="Role"/>

                <x-Ui::input.floating wire:model="photo" label="Photo"/>

                <x-Ui::input.floating wire:model="about" label="About"/>

                <x-Ui::input.floating wire:model="mail" label="Mail"/>

                <x-Ui::input.floating wire:model="mobile" label="Mobile"/>

                <x-Ui::input.floating wire:model="fb" label="Fb"/>

                <x-Ui::input.floating wire:model="twitter" label="Twitter"/>

                <x-Ui::input.floating wire:model="msg" label="Msg"/>

            </div>

        </x-Ui::forms.create>

    </x-Ui::forms.m-panel>
</div>
