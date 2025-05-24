<div>
    <x-slot name="header">UserDetail</x-slot>
    <x-Ui::forms.m-panel>
        <x-Ui::alerts.notification/>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-Ui::forms.top-controls :show-filters="$showFilters"/>

        <!-- Table Caption -------------------------------------------------------------------------------------------->
        <x-Ui::table.caption :caption="'UserDetail'">
            {{$list->count()}}
        </x-Ui::table.caption>

        <!-- Table Data ----------------------------------------------------------------------------------------------->

        <x-Ui::table.form>
            <x-slot:table_header>
                <x-Ui::table.header-serial/>
                <x-Ui::table.header-text wire:click.prevent="sortBy('id')" sortIcon="{{$sortAsc}}" :left="true">
                    Name
                </x-Ui::table.header-text>
                <x-Ui::table.header-text sortIcon="none">Email</x-Ui::table.header-text>
                <x-Ui::table.header-text sortIcon="none">Photo</x-Ui::table.header-text>
                <x-Ui::table.header-text sortIcon="none">Date of Birth</x-Ui::table.header-text>
                <x-Ui::table.header-text sortIcon="none">Marital Status</x-Ui::table.header-text>
                <x-Ui::table.header-text sortIcon="none">Mobile Number</x-Ui::table.header-text>
                <x-Ui::table.header-text sortIcon="none">Professional Details</x-Ui::table.header-text>
                <x-Ui::table.header-text sortIcon="none">Experience</x-Ui::table.header-text>
                <x-Ui::table.header-status/>
                <x-Ui::table.header-action/>
            </x-slot:table_header>

            <x-slot:table_body>
                @foreach($list as $index=>$row)
                    <x-Ui::table.row>
                        <x-Ui::table.cell-text>{{$index+1}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->vname}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->email}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->photo}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->dob}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->marital_status}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->mobile_number}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->professional_details}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->experience}}</x-Ui::table.cell-text>
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
            <div class="flex flex-col gap-2">
                <div class="flex justify-between">
                    <div class="flex flex-col gap-2 w-2/3">
                        <div>
                            <x-Ui::input.floating wire:model="vname" label="User Name"/>
                            <x-Ui::input.error-text wire:model="vname"/>
                        </div>
                        <div>
                            <x-Ui::input.floating wire:model="email" label="Email"/>
                            <x-Ui::input.error-text wire:model="email"/>
                        </div>
                        <div>
                            <x-Ui::input.model-date wire:model="dob" label="Date of Birth"/>
                            <x-Ui::input.error-text wire:model="dob"/>
                        </div>
                    </div>
                    <div class="w-1/3 float-right">
                        <div class="flex flex-col py-2">
                            <label for="bg_image"
                                   class="w-full text-zinc-500 tracking-wide pb-4 px-2">Image</label>

{{--                            <div class="flex flex-wrap gap-2">--}}
{{--                                <div class="flex-shrink-0">--}}
{{--                                    <div>--}}
{{--                                        @if($photo)--}}
{{--                                            <div class="flex gap-5">--}}
{{--                                                @foreach($images as $image)--}}
{{--                                                    <div--}}
{{--                                                        class=" flex-shrink-0 border-2 border-dashed border-gray-300 p-1 rounded-lg overflow-hidden">--}}
{{--                                                        <img--}}
{{--                                                            class="w-[156px] h-[89px] rounded-lg hover:brightness-110 hover:scale-105 duration-300 transition-all ease-out block"--}}
{{--                                                            src="{{ $image->temporaryUrl() }}"--}}
{{--                                                            alt="{{$image?:''}}"/>--}}
{{--                                                    </div>--}}
{{--                                                @endforeach--}}
{{--                                            </div>--}}
{{--                                        @endif--}}

{{--                                        @if(isset($old_images))--}}
{{--                                            <div class="flex gap-5">--}}
{{--                                                @foreach($old_images as $old_image)--}}

{{--                                                    <div--}}
{{--                                                        class=" flex-shrink-0 border-2 border-dashed border-gray-300 p-1 rounded-lg overflow-hidden">--}}
{{--                                                        <img--}}
{{--                                                            class="w-[156px] h-[89px] rounded-lg hover:brightness-110 hover:scale-105 duration-300 transition-all ease-out"--}}
{{--                                                            src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$old_image['image']))}}"--}}
{{--                                                            alt="">--}}
{{--                                                        <div class="flex justify-center items-center">--}}
{{--                                                            <x-Ui::button.delete--}}
{{--                                                                wire:click="DeleteImage({{$old_image['id']}})"--}}
{{--                                                            />--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                @endforeach--}}
{{--                                            </div>--}}
{{--                                        @else--}}
{{--                                            <x-Ui::icons.icon :icon="'logo'" class="w-auto h-auto block "/>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="relative">--}}
{{--                                    <div>--}}
{{--                                        <label for="bg_image"--}}
{{--                                               class="text-gray-500 font-semibold text-base rounded flex flex-col items-center--}}
{{--                                   justify-center cursor-pointer border-2 border-gray-300 border-dashed p-2--}}
{{--                                   mx-auto font-[sans-serif]">--}}
{{--                                            <x-Ui::icons.icon icon="cloud-upload"--}}
{{--                                                              class="w-8 h-auto block text-gray-400"/>--}}
{{--                                            Upload Photo--}}
{{--                                            <input type="file" id='bg_image' wire:model="images" class="hidden"--}}
{{--                                                   multiple/>--}}
{{--                                            <p class="text-xs font-light text-gray-400 mt-2">PNG and JPG are--}}
{{--                                                Allowed.</p>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}

{{--                                    <div wire:loading wire:target="images" class="z-10 absolute top-6 left-12">--}}
{{--                                        <div class="w-14 h-14 rounded-full animate-spin--}}
{{--                                                        border-y-4 border-dashed border-green-500 border-t-transparent"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>

                <div class="flex flex-row gap-2 w-full">

                    <div class="w-1/2">
                        <x-Ui::input.model-select wire:model.live="gender" :label="'Gender'" class="w-full">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </x-Ui::input.model-select>
                        <x-Ui::input.error-text wire:model="gender"/>
                    </div>
                    <div class="w-1/2">
                        <x-Ui::input.model-select wire:model.live="marital_status" :label="'Marital Status'"
                                                  class="w-full">
                            <option value="">Select Marital Status</option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                        </x-Ui::input.model-select>
                        <x-Ui::input.error-text wire:model="marital_status"/>
                    </div>
                </div>

                <div class="flex flex-row gap-2 w-full">
                    <div class="w-1/2">
                        <x-Ui::input.floating wire:model="nationality" label="Nationality"/>
                        <x-Ui::input.error-text wire:model="nationality"/>
                    </div>

                    <div class="w-1/2">
                        <x-Ui::input.floating wire:model="mobile_number" label="Mobile Number"/>
                        <x-Ui::input.error-text wire:model="mobile_number"/>
                    </div>
                </div>

                <div class="flex flex-row gap-2 w-full">
                    <div class="w-1/2">
                        <x-Ui::input.floating wire:model="alter_mobile_number" label="Alternate Number"/>
                        <x-Ui::input.error-text wire:model="alter_mobile_number"/>
                    </div>
                    <div class="w-1/2">
                        <x-Ui::input.floating wire:model="residential_address" label="Residential Address"/>
                        <x-Ui::input.error-text wire:model="residential_address"/>
                    </div>
                </div>

                <div class="flex flex-row gap-2 w-full">
                    <div class="w-1/2">
                        <x-Ui::input.floating wire:model="city_id" label="City"/>
                        <x-Ui::input.error-text wire:model="city_id"/>
                    </div>
                    <div class="w-1/2">
                        <x-Ui::input.floating wire:model="state_id" label="State"/>
                        <x-Ui::input.error-text wire:model="state_id"/>
                    </div>
                </div>

                <div class="flex flex-row gap-2 w-full">
                    <div class="w-1/2">
                        <x-Ui::input.floating wire:model="country_id" label="Country"/>
                        <x-Ui::input.error-text wire:model="country_id"/>
                    </div>
                    <div class="w-1/2">
                        <x-Ui::input.floating wire:model="pincode_id" label="Pin Code"/>
                        <x-Ui::input.error-text wire:model="pincode_id"/>
                    </div>
                </div>

                <div class="flex flex-row gap-2 w-full">
                    <div class="w-1/2">
                        <x-Ui::input.floating wire:model="professional_details" label="Professional Details"/>
                        <x-Ui::input.error-text wire:model="professional_details"/>
                    </div>
                    <div class="w-1/2">
                        <x-Ui::input.floating wire:model="highest_qualification" label="Qualification"/>
                        <x-Ui::input.error-text wire:model="highest_qualification"/>
                    </div>
                </div>

                <div class="flex flex-row gap-2 w-full">
                    <div class="w-1/2">
                        <x-Ui::input.floating wire:model="occupation" label="Occupation"/>
                        <x-Ui::input.error-text wire:model="occupation"/>
                    </div>
                    <div class="w-1/2">
                        <x-Ui::input.floating wire:model="company_name" label="Company Name"/>
                        <x-Ui::input.error-text wire:model="company_name"/>
                    </div>
                </div>

                <div class="flex flex-row gap-2 w-full">
                    <div class="w-1/2">
                        <x-Ui::input.floating wire:model="industry_type" label="Industry Type"/>
                        <x-Ui::input.error-text wire:model="industry_type"/>
                    </div>
                    <div class="w-1/2">
                        <x-Ui::input.floating wire:model="experience" label="Experience"/>
                        <x-Ui::input.error-text wire:model="experience"/>
                    </div>
                </div>


            </div>
        </x-Ui::forms.create>

    </x-Ui::forms.m-panel>
</div>
