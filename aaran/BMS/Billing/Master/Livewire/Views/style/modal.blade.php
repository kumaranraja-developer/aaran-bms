<div x-data="{ showCreateModal: @entangle('showCreateModal')}">
    <div
        x-show="showCreateModal"
        @click.away="showCreateModal = false"
        x-cloak
        x-on:close.stop="showCreateModal = false"
        x-on:keydown.escape.window="showCreateModal = false"
        x-trap.inert.noscroll="showCreateModal"
        class="absolute z-20">

        <div class="relative" role="dialog">

            <div class="fixed inset-0 bg-gray-800/75"></div>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div
                    class="flex min-h-full justify-center items-center">
                    <div class="relative sm:w-full sm:max-w-4xl sm:mx-auto">

                        <div class="bg-white rounded-t-lg px-4 pb-4">

                            <div class="text-lg text-neutral-300 py-3 left-2">Create New</div>

                            <div class="flex flex-col gap-3">

                                <div>
                                    <x-Ui::input.floating wire:model="vname" label="Style Name"/>
                                    <x-Ui::input.error-text wire:model="vname"/>
                                </div>

                                <x-Ui::input.floating wire:model="description" label="Description"/>


                                <div class="flex flex-col py-2">
                                    <label for="bg_image"
                                           class="w-full text-zinc-500 tracking-wide pb-4 px-2">Image</label>

                                    <div class="flex flex-wrap sm:gap-6 gap-2">
                                        <div class="flex-shrink-0">
                                            <div>
                                                @if($image)
                                                    <div
                                                        class=" flex-shrink-0 bg-blue-100 p-1 rounded-lg overflow-hidden">
                                                        <img
                                                            class="w-[156px] h-[89px] rounded-lg hover:brightness-110 hover:scale-105 duration-300 transition-all ease-out"
                                                            src="{{ $image->temporaryUrl() }}"
                                                            alt="{{$image?:''}}"/>
                                                    </div>
                                                @endif

                                                @if(!$image && isset($image))
                                                    <img class="h-24 w-full"
                                                         src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$old_image))}}"
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
                                                    <input type="file" id='bg_image' wire:model="image" class="hidden"/>
                                                    <p class="text-xs font-light text-gray-400 mt-2">PNG and JPG are
                                                        Allowed.</p>
                                                </label>
                                            </div>

                                            <div wire:loading wire:target="image" class="z-10 absolute top-6 left-12">
                                                <div class="w-14 h-14 rounded-full animate-spin
                                                        border-y-4 border-dashed border-green-500 border-t-transparent"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>



                            </div>

                        </div>

                        <div class="bg-gray-100  rounded-b-lg px-4 py-3 flex gap-3 justify-end">

                            <x-Ui::button.back-x @click="showCreateModal = false"/>

                            <x-Ui::button.save-x wire:click.prevent="save"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

