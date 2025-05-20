@props([
'showFilters'=>false
])

<div>
    @if ($showFilters)
        <div class="bg-blue-50 dark:bg-dark-4 p-4 rounded shadow-inner flex relative ring-1 ring-blue-600">
            <div class="pr-2 space-y-4">
                <x-Ui::input.group inline for="activeRecord" label="Active" class="dark:text-dark-9">
                    <x-Ui::input.select wire:model.live="activeRecord" id="activeRecord" class="dark:bg-dark dark:text-dark-9">
                        <option value="" disabled>Select...</option>
                        <option value="1">Active</option>
                        <option value="0">Not Active</option>
                    </x-Ui::input.select>
                </x-Ui::input.group>

                <div class="h-5">
                    &nbsp;
                </div>

            </div>

            <div class="w-1/2 pl-2 space-y-4">
                <x-Ui::button.link wire:click="resetFilters" class="absolute right-1.5 bottom-1.5 p-2 rounded-lg ring-1 bg-blue-600 text-white ring-white">Reset
                    Filters
                </x-Ui::button.link>
            </div>
        </div>
    @endif
</div>
