
<div x-data="{ open: @entangle('showPopup') }"
     x-init="$wire.on('reply-added', () => open = false)"
     class="inline-block">

    <!-- Trigger Button -->
    <button
        @click="open = true"
        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200"
    >
        Reply
    </button>

    <!-- Popup Overlay -->
    <div x-show="open"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         x-trap.inert.noscroll="open"
         class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4"
         x-cloak
    >
        <!-- Popup Content -->
        <div @click.outside="open = false"
             class="bg-white rounded-lg shadow-xl w-full max-w-md"
        >
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Write Your Reply</h3>

                <form wire:submit.prevent="saveReply">
                    <textarea
                        wire:model="reply"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Type your reply here..."
                        rows="4"
                        required
                    ></textarea>

                    <div class="mt-4 flex justify-end space-x-3">
                        <button
                            type="button"
                            @click="open = false"
                            class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        >
                            Cancel
                        </button>
                        <button
                            type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-1 focus:ring-offset-2 focus:ring-blue-500"
                        >
                            Submit Reply
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
