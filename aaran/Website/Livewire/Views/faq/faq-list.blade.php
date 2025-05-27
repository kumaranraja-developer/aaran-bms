<div>
    <div class="font-roboto tracking-wider flex-col pt-5 pb-10 md:py-20 flex gap-y-6">
        <div class="text-center sm:text-2xl text-xl font-semibold mt-2 animate__animated wow bounceInDown"
             data-wow-duration="3s">
            Frequently Asked Questions
        </div>
        <div class="sm:w-9/12 lg:w-1/2 w-auto mx-auto sm:px-0 px-2">
            @foreach($faqs as $faq)
                <x-Ui::web.home.accordion :heading="$faq->question">
                    <div class="p-4 rounded-md text-xs">{!! nl2br(e($faq->answer)) !!}</div>
                </x-Ui::web.home.accordion>
            @endforeach
        </div>

        <!-- Ask a Question Button -->
        <div class="text-center w-full pr-4 mb-4">
            <button wire:click="$toggle('showAskForm')"
                    class="bg-orange-600 text-white px-4 py-2 rounded-full hover:bg-orange-700 transition">
                + Ask a Question
            </button>
        </div>



        <!-- Inline Form (not full screen, just shows under button) -->
        @if($showAskForm)
            <div class="border border-gray-300 rounded-md p-4 mb-6 shadow-md w-full md:w-2/3 mx-auto bg-white">
                <h2 class="text-lg font-semibold mb-2">Submit Your Question</h2>

                <form wire:submit.prevent="getSave">
                    <div class="mb-3">
                        <label class="block mb-1 text-sm font-medium text-gray-700">Your Question</label>
                        <input type="text" wire:model.defer="question"
                               class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"/>
                        @error('question') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-end mt-4">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Submit</button>
                        <button type="button" wire:click="$set('showAskForm', false)"
                                class="ml-2 px-4 py-2 border border-gray-300 rounded hover:bg-gray-100">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        @endif

    </div>


    <x-Ui::web.common.footer-address/>
    <x-Ui::web.common.copyright/>
</div>
