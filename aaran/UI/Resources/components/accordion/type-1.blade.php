@props([
    'items',
    'type' => 'cross'
    ])



<div
    x-data="{
        activeAccordion: '',
        setActiveAccordion(id) {
            this.activeAccordion = (this.activeAccordion === id) ? '' : id
        }
    }"
    class="relative w-full mx-auto overflow-hidden text-sm font-normal bg-white border border-gray-200 divide-y divide-gray-200 rounded-md"
>
    @foreach($items as $index => $item)
        <div x-data="{ id: '{{ 'accordion-' . $index }}' }" class="cursor-pointer group">
            <button
                @click="setActiveAccordion(id)"
                class="flex items-center justify-between w-full p-4 text-left select-none group-hover:underline cursor-pointer"
            >
                <span>{{ $item['question'] }}</span>


                @switch($type)
                    {{-- ✅ Chevron Icon --}}
                    @case('chevron')
                        <svg class="w-4 h-4 duration-200 ease-out transform" :class="{ 'rotate-180': activeAccordion === id }"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                        @break

                        {{-- ✅ Plus Icon (rotates to ×) --}}
                    @case('plus')
                        <div :class="{ 'rotate-90': activeAccordion==id }"
                             class="relative flex items-center justify-center w-2.5 h-2.5 duration-300 ease-out">
                            <div
                                class="absolute w-0.5 h-full bg-neutral-500 group-hover:bg-neutral-800 rounded-full"></div>
                            <div :class="{ 'rotate-90': activeAccordion==id }"
                                 class="absolute w-full h-0.5 ease duration-500 bg-neutral-500 group-hover:bg-neutral-800 rounded-full"></div>
                        </div>
                        @break

                        {{-- ✅ Cross Icon (rotates like plus) --}}
                    @case('cross')
                        <svg class="w-5 h-5 transform duration-300 ease-out origin-center"
                             :class="{ 'rotate-45': activeAccordion === id }"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"/>
                        </svg>
                        @break
                @endswitch



            </button>
            <div x-show="activeAccordion == id" x-collapse x-cloak>
                <div class="p-4 pt-0 opacity-70">
                    {{ $item['answer'] }}
                </div>
            </div>
        </div>
    @endforeach
</div>
