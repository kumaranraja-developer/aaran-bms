@props([
    'id',
    'maxWidth' => '2xl',
    'attributes'=>null
])

<div>
    <div x-data="{ showEditModal: @entangle('showEditModal')}">
        <div
            x-show="showEditModal"
            @click.away="showEditModal = false"
            x-cloak
            x-on:close.stop="showEditModal = false"
            x-on:keydown.escape.window="showEditModal = false"
            x-trap.inert.noscroll="showEditModal"
            class="absolute z-20">

            <div class="relative" role="dialog">

                <div class="fixed inset-0 bg-gray-800/75"></div>

                <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                    <div
                        class="flex min-h-full justify-center items-center">
                        <div class="relative sm:w-full sm:max-w-4xl sm:mx-auto">

                            <div class="bg-white dark:bg-dark dark:text-dark-9 rounded-t-lg px-2 pb-2">

                                <div class="border p-5 mt-2 rounded-xl border-neutral-300 dark:border-dark-4">
                                    {{$slot}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
