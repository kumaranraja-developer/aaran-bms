@props([
'showFilters'=>false,
])

<div class="flex md:flex-row md:justify-between md:items-center flex-col gap-6 py-4 print:hidden p-5  dark:bg-dark dark:text-dark-9">
    <div class="w-full flex lg:w-max items-center space-x-2">

        <x-Ui::input.search-bar wire:model.live="searches"
                            wire:keydown.escape="$set('searches', '')" label="Search"/>
        <x-Ui::input.toggle-filter :show-filters="$showFilters"/>
    </div>

    <div class="flex md:justify-center justify-between items-center gap-6">
        <x-Ui::forms.per-page/>
        <div class="self-end block my-auto">
            <x-Ui::newtemplate.dynamic-button :button-label="'New'" wire:click="create"/>
        </div>
    </div>
</div>
<x-Ui::input.advance-search :show-filters="$showFilters"/>
