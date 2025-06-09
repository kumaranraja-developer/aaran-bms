@props([
    'model' => 'date', // default Livewire model name
    'format' => 'M d, Y' // default format
])

<div
    x-data="{
        datePickerOpen: false,
        datePickerValue: @entangle($attributes->wire('model')),
        datePickerFormat: '{{ $format }}',
        datePickerMonth: '',
        datePickerYear: '',
        datePickerDay: '',
        datePickerDaysInMonth: [],
        datePickerBlankDaysInMonth: [],
        datePickerMonthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datePickerDays: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        datePickerDayClicked(day) {
            let selectedDate = new Date(this.datePickerYear, this.datePickerMonth, day);
            this.datePickerDay = day;
            this.datePickerValue = this.datePickerFormatDate(selectedDate);
            this.datePickerOpen = false;
        },
        datePickerPreviousMonth() {
            if (this.datePickerMonth === 0) {
                this.datePickerMonth = 11;
                this.datePickerYear--;
            } else {
                this.datePickerMonth--;
            }
            this.datePickerCalculateDays();
        },
        datePickerNextMonth() {
            if (this.datePickerMonth === 11) {
                this.datePickerMonth = 0;
                this.datePickerYear++;
            } else {
                this.datePickerMonth++;
            }
            this.datePickerCalculateDays();
        },
        datePickerIsSelectedDate(day) {
            const d = new Date(this.datePickerYear, this.datePickerMonth, day);
            return this.datePickerValue === this.datePickerFormatDate(d);
        },
        datePickerIsToday(day) {
            const today = new Date();
            const d = new Date(this.datePickerYear, this.datePickerMonth, day);
            return today.toDateString() === d.toDateString();
        },
        datePickerCalculateDays() {
            let daysInMonth = new Date(this.datePickerYear, this.datePickerMonth + 1, 0).getDate();
            let dayOfWeek = new Date(this.datePickerYear, this.datePickerMonth).getDay();
            this.datePickerBlankDaysInMonth = Array.from({ length: dayOfWeek }, (_, i) => i + 1);
            this.datePickerDaysInMonth = Array.from({ length: daysInMonth }, (_, i) => i + 1);
        },
        datePickerFormatDate(date) {
            let d = ('0' + date.getDate()).slice(-2);
            let m = ('0' + (date.getMonth() + 1)).slice(-2);
            let y = date.getFullYear();
            let monthName = this.datePickerMonthNames[date.getMonth()].substring(0, 3);
            let dayName = this.datePickerDays[date.getDay()];

            switch (this.datePickerFormat) {
                case 'MM-DD-YYYY': return `${m}-${d}-${y}`;
                case 'DD-MM-YYYY': return `${d}-${m}-${y}`;
                case 'YYYY-MM-DD': return `${y}-${m}-${d}`;
                case 'D d M, Y': return `${dayName} ${d} ${monthName} ${y}`;
                default: return `${monthName} ${d}, ${y}`;
            }
        },
    }"
    x-init="
        let now = new Date();
        if (datePickerValue) {
            now = new Date(Date.parse(datePickerValue));
        }
        datePickerMonth = now.getMonth();
        datePickerYear = now.getFullYear();
        datePickerDay = now.getDate();
        datePickerValue = datePickerFormatDate(now);
        datePickerCalculateDays();
    "
    x-cloak
>
    <div class="relative w-[17rem] z-20">
        <input
            x-ref="datePickerInput"
            type="text"
            x-model="datePickerValue"
            @click="datePickerOpen = !datePickerOpen"
            @keydown.escape="datePickerOpen = false"
            {{ $attributes->whereStartsWith('wire:model') }}
            class="w-full h-10 px-3 py-2 text-sm bg-white border rounded-md text-neutral-600 border-neutral-300 ring-offset-background placeholder:text-neutral-400 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400"
            readonly
        />
        <div @click="datePickerOpen = !datePickerOpen" class="absolute top-0 right-0 px-3 py-2 cursor-pointer text-neutral-400 hover:text-neutral-500">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
        </div>
        <div
            x-show="datePickerOpen"
            x-transition
            @click.away="datePickerOpen = false"
            class="absolute top-0 left-0 max-w-lg p-4 mt-12 bg-white border rounded-lg shadow w-[17rem] border-neutral-200/70"
        >
            <div class="flex items-center justify-between mb-2">
                <div>
                    <span x-text="datePickerMonthNames[datePickerMonth]" class="text-lg font-bold text-gray-800"></span>
                    <span x-text="datePickerYear" class="ml-1 text-lg font-normal text-gray-600"></span>
                </div>
                <div>
                    <button @click="datePickerPreviousMonth()" type="button" class="p-1 rounded-full hover:bg-gray-100">
                        <svg class="w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button @click="datePickerNextMonth()" type="button" class="p-1 rounded-full hover:bg-gray-100">
                        <svg class="w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-7 mb-3 text-xs font-medium text-center text-gray-800">
                <template x-for="(day, index) in datePickerDays" :key="index">
                    <div x-text="day"></div>
                </template>
            </div>
            <div class="grid grid-cols-7">
                <template x-for="blankDay in datePickerBlankDaysInMonth" :key="'b'+blankDay">
                    <div class="p-1 text-sm text-center border border-transparent"></div>
                </template>
                <template x-for="(day, dayIndex) in datePickerDaysInMonth" :key="dayIndex">
                    <div class="px-0.5 mb-1 aspect-square">
                        <div
                            x-text="day"
                            @click="datePickerDayClicked(day)"
                            :class="{
                                'bg-neutral-200': datePickerIsToday(day),
                                'text-gray-600 hover:bg-neutral-200': !datePickerIsToday(day) && !datePickerIsSelectedDate(day),
                                'bg-neutral-800 text-white hover:bg-opacity-75': datePickerIsSelectedDate(day)
                            }"
                            class="flex items-center justify-center text-sm leading-none text-center rounded-full cursor-pointer h-7 w-7"
                        ></div>
                    </div>
                </template>
            </div>
        </div>
    </div>
</div>
