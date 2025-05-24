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
                            <x-Ui::image.lightbox-image :image="$row->photo" location="images/teams"
                                                        thumb-size="h-22 w-auto"
                            />
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

                <div class="flex flex-col py-2">
                    <label for="bg_image"
                           class="w-full text-zinc-500 tracking-wide pb-4 px-2">photo</label>

                    <div class="flex flex-wrap sm:gap-6 gap-2">
                        <div class="flex-shrink-0">
                            <div>
                                @if($photo)
                                    <div
                                        class=" flex-shrink-0 bg-blue-100 p-1 rounded-lg overflow-hidden">
                                        <img
                                            class="w-[156px] h-[89px] rounded-lg hover:brightness-110 hover:scale-105 duration-300 transition-all ease-out"
                                            src="{{ $photo->temporaryUrl() }}"
                                            alt="{{$photo?:''}}"/>
                                    </div>
                                @endif

                                @if(!$photo && isset($photo))
                                    <img class="h-24 w-full"
                                         src="{{URL(\Illuminate\Support\Facades\Storage::url('images/teams/'.$old_photo))}}"
                                         alt="">
                                @endif
                            </div>
                        </div>

                        <div class="relative">
                            <div>
                                <label for="bg_image"
                                       class="text-gray-500 font-semibold text-base rounded flex flex-col items-center
                                   justify-center cursor-pointer border-2 border-gray-300 border-dashed p-2
                                   mx-auto font-[sans-serif]">
                                    <x-Ui::icons.icon icon="cloud-upload" class="w-8 h-auto block text-gray-400"/>
                                    Upload Photo
                                    <input type="file" id='bg_image' wire:model="photo" class="hidden"/>
                                    <p class="text-xs font-light text-gray-400 mt-2">PNG and JPG are
                                        Allowed.</p>
                                </label>
                            </div>

                            <div wire:loading wire:target="photo" class="z-10 absolute top-6 left-12">
                                <div class="w-14 h-14 rounded-full animate-spin
                                                        border-y-4 border-dashed border-green-500 border-t-transparent"></div>
                            </div>
                        </div>

                    </div>
                </div>

                <div>
                    <x-Ui::input.floating wire:model="vname" label="Name"/>
                    <x-Ui::input.error-text wire:model="vname"/>
                </div>

                <x-Ui::input.floating wire:model="role" label="Role"/>

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
