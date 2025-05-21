<div>
    <x-slot name="header">Testimonial</x-slot>
    <x-Ui::forms.m-panel>


        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-Ui::forms.top-controls :show-filters="$showFilters"/>

        <!-- Table Caption -------------------------------------------------------------------------------------------->
        <x-Ui::table.caption :caption="'Testimonial'">
            {{$list->count()}}
        </x-Ui::table.caption>

        <!-- Table Data ----------------------------------------------------------------------------------------------->

        <x-Ui::table.form>
            <x-slot:table_header>
                <x-Ui::table.header-serial/>

                <x-Ui::table.header-text    sortIcon="none" :center="true">
                    Name
                </x-Ui::table.header-text>
                <x-Ui::table.header-text    sortIcon="none" :center="true">
                    Company
                </x-Ui::table.header-text>
                <x-Ui::table.header-text    sortIcon="none" :center="true">
                    Photo
                </x-Ui::table.header-text>
                <x-Ui::table.header-text  sortIcon="none" :center="true">
                    Address
                </x-Ui::table.header-text>
                <x-Ui::table.header-text    sortIcon="none" :center="true">
                    Testimonial
                </x-Ui::table.header-text>

                <x-Ui::table.header-status/>
                <x-Ui::table.header-action/>
            </x-slot:table_header>

            <x-slot:table_body>
                @foreach($list as $index=>$row)
                    <x-Ui::table.row>
                        <x-Ui::table.cell-text>{{$index+1}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->vname}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->company}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>
                            @if($row->photo)
                                <img src="{{ asset('storage/photos/' . $row->photo) }}" class="h-10 w-10 rounded-full object-cover" alt="photo" />
                            @else
                                N/A
                            @endif
                        </x-Ui::table.cell-text>
                        <x-Ui::table.cell-text class="line-clamp-2" left>{!! $row->address !!}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text  left>{{$row->testimonial}}</x-Ui::table.cell-text>
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

            <div class="flex flex-col gap-4 w-full">

                <!-- Name + Photo Upload -->
                <div class="flex flex-row gap-6 items-start">

                    <!-- Name Input -->
                    <div class="flex flex-col gap-6 flex-1">

                        <div>
                        <x-Ui::input.floating wire:model="vname" label="Name" />
                        <x-Ui::input.error-text wire:model="vname"/>
                        </div>
                        <div>
                        <x-Ui::input.floating wire:model="company" label="Company" />
                        </div>

                    </div>

                    <!-- Image Upload -->
                    <div class="flex flex-col">
                        <label for="bg_image" class="text-zinc-500 text-sm font-medium mb-1">Image</label>

                        <div class="flex flex-row gap-3 items-center">
                            @if($photo)
                                <div class="bg-blue-100 p-1 rounded-lg overflow-hidden">
                                    <img
                                        class="w-[156px] h-[89px] rounded-lg hover:brightness-110 hover:scale-105 duration-300 transition-all ease-out"
                                        src="{{ $photo }}"
                                        alt="{{ $photo ?: '' }}"/>
                                </div>
                            @endif

                            <label for="bg_image"
                                   class="text-gray-500 font-medium text-sm rounded flex flex-col items-center
                                  justify-center cursor-pointer border-2 border-gray-300 border-dashed p-2
                                  w-[160px] h-[100px] hover:border-gray-400 transition">
                                <x-Ui::icons.icon icon="cloud-upload" class="w-8 h-auto text-gray-400 mb-1"/>
                                <span class="text-sm">Upload Photo</span>
                                <input type="file" id="bg_image" wire:model="photo" class="hidden"/>
                                <p class="text-xs text-gray-400 mt-1 text-center">PNG or JPG</p>
                            </label>
                        </div>
                    </div>
                </div>
                <!-- Company -->


                <!-- Address -->
                <x-Ui::input.floating-textarea wire:model="address" label="Address"/>

                <!-- Testimonial -->
                <x-Ui::input.floating-textarea wire:model="testimonial" label="Testimonial" />

            </div>





        </x-Ui::forms.create>


    </x-Ui::forms.m-panel>
</div>
