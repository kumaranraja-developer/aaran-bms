@props([
'showFilters'=>false
])
<button wire:click="toggleShowFilters"
        class="mt-1.5">
    <x-Ui::icons.icon :icon="$showFilters ? 'cog':'adjustments'" class="h-6 w-10 block"/>
</button>
