@props(['model'])

<!-- Include these scripts somewhere on the page: -->
<script defer src="https://unpkg.com/@alpinejs/ui@3.14.9/dist/cdn.min.js"></script>
<script defer src="https://unpkg.com/@alpinejs/focus@3.14.9/dist/cdn.min.js"></script>

<div
    x-data="{
        query: '',
        selected: @entangle($attributes->wire('model')),
        industries: [
            { id: 1, name: 'Photography', disabled: false },
            { id: 2, name: 'Design services', disabled: false },
            { id: 3, name: 'Web development', disabled: true },
            { id: 4, name: 'Accounting', disabled: false },
            { id: 5, name: 'Legal services', disabled: false },
            { id: 6, name: 'Consulting', disabled: false },
            { id: 7, name: 'Other', disabled: false },
        ],
        get filteredIndustries() {
            return this.query === ''
                ? this.industries
                : this.industries.filter((industry) =>
                    industry.name.toLowerCase().includes(this.query.toLowerCase())
                )
        },
        init() {
            // Sync Alpine selected object from Livewire ID if only ID is passed
            if (typeof this.selected === 'number') {
                let match = this.industries.find(i => i.id === this.selected);
                if (match) this.selected = match;
            }

            // Watch and push back only the ID to Livewire
            this.$watch('selected', value => {
                if (value && typeof value === 'object') {
                    @this.set('{{ $attributes->wire('model')->value }}', value.id)
                }
            });
        }
    }"
    class="max-w-xs w-full"
>
    <!-- Combobox -->
    <div x-combobox x-model="selected" class="relative w-full">
        <div class="group w-full block relative">
            <input
                x-combobox:input
                :display-value="industry => industry.name"
                @change="query = $event.target.value"
                class="focus:outline-none focus:ring-0 px-3 py-2 rounded-lg border border-gray-200 bg-white shadow-sm w-full placeholder-gray-400"
                placeholder="Choose industry..."
                autocomplete="off" />

            <button x-combobox:button class="absolute inset-y-0 right-0 flex items-center pr-2">
                <svg class="shrink-0 size-5 text-gray-300 group-hover:text-gray-800" viewBox="0 0 20 20" fill="none" stroke="currentColor" aria-hidden="true">
                    <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>

        <div x-combobox:options x-cloak class="absolute right-0 z-10 mt-2 max-h-80 w-full overflow-y-scroll overscroll-contain rounded-lg border border-gray-200 bg-white p-1.5 shadow-sm outline-none">
            <ul>
                <template x-for="industry in filteredIndustries" :key="industry.id">
                    <li
                        x-combobox:option
                        :value="industry"
                        :disabled="industry.disabled"
                        :class="{
                            'bg-gray-100': $comboboxOption.isActive,
                            'text-gray-800': ! $comboboxOption.isActive && ! $comboboxOption.isDisabled,
                            'text-gray-400 cursor-not-allowed': $comboboxOption.isDisabled,
                        }"
                        class="group flex w-full cursor-default items-center rounded-md px-2 py-1.5 transition-colors"
                    >
                        <div class="w-6 shrink-0">
                            <svg class="size-5 shrink-0" x-show="$comboboxOption.isSelected" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span x-text="industry.name"></span>
                    </li>
                </template>
            </ul>
            <p x-show="filteredIndustries.length === 0" class="px-2 py-1.5 text-gray-600">No results found.</p>
        </div>
    </div>
</div>
