<div>
    <x-slot name="header">Account Book</x-slot>

    <x-Ui::forms.m-panel>
        <x-Ui::alerts.notification/>

        <!-- Top Controls --------------------------------------------------------------------------------------------->
        <x-Ui::forms.top-controls :show-filters="$showFilters"/>

        <!-- Table Caption -------------------------------------------------------------------------------------------->
        <x-Ui::table.caption :caption="'Account Book'">
            {{$list->count()}}
        </x-Ui::table.caption>

        {{--        Acccount Book Card View--}}

        <div class="grid grid-cols-1 xl:grid-cols-2 items-center gap-5 mt-10 p-10">
            @foreach($list as $index=>$row)
                @php
                    $typeStyles = [
                        'bank' => [
                            'color' => 'bg-gradient-to-r from-indigo-500 to-purple-600',
                            'icon' => '<svg width="80" version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <circle fill="#231F20" cx="32" cy="14" r="3"></circle> <path fill="#231F20" d="M4,25h56c1.794,0,3.368-1.194,3.852-2.922c0.484-1.728-0.242-3.566-1.775-4.497l-28-17 C33.438,0.193,32.719,0,32,0s-1.438,0.193-2.076,0.581l-28,17c-1.533,0.931-2.26,2.77-1.775,4.497C0.632,23.806,2.206,25,4,25z M32,9c2.762,0,5,2.238,5,5s-2.238,5-5,5s-5-2.238-5-5S29.238,9,32,9z"></path> <rect x="34" y="27" fill="#231F20" width="8" height="25"></rect> <rect x="46" y="27" fill="#231F20" width="8" height="25"></rect> <rect x="22" y="27" fill="#231F20" width="8" height="25"></rect> <rect x="10" y="27" fill="#231F20" width="8" height="25"></rect> <path fill="#231F20" d="M4,58h56c0-2.209-1.791-4-4-4H8C5.791,54,4,55.791,4,58z"></path> <path fill="#231F20" d="M63.445,60H0.555C0.211,60.591,0,61.268,0,62v2h64v-2C64,61.268,63.789,60.591,63.445,60z"></path> </g> </g></svg>',
                        ],
                        'cash' => [
                            'color' => 'bg-gradient-to-r from-yellow-400 to-amber-600',
                            'icon' => '<svg id="Layer_1" data-name="Layer 1" width="80" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 119.49"><defs><style>.cls-1{fill-rule:evenodd;}</style></defs><title>pay-money</title><path class="cls-1" d="M61.88,42a8,8,0,1,1-7.26,8.65A8,8,0,0,1,61.88,42ZM1,5.44H11.51a1,1,0,0,1,1,1V31.9a1,1,0,0,1-1,1H1a1,1,0,0,1-1-1V6.47a1,1,0,0,1,1-1ZM15.17,10a2,2,0,0,1,.33-1.24c.67-.91,2.31-.64,3.35-.64a15.15,15.15,0,0,0,3.22-.25,37.57,37.57,0,0,0,4.6-1.53c5.69-2,10.54-3.3,16.47-5.9A4.57,4.57,0,0,1,47,.42,100.69,100.69,0,0,1,63.06,7.94a5.69,5.69,0,0,1,2.39,2.37c3.29,4.78,6.1,9.62,8.81,14.47.91,1.7,1.28,3.32.66,4.33-2.54,4.17-7.11-1.76-12-5.71-2.07-1.66-4.89-3.14-7.31-4.82-3.1-1.3-4.57-2.54-7.9-3.24-5.12-.44-5.54,6.91,1.19,7.18,4.57.18,14,4.32,16.62,8.13,2.47,3.56,1.11,7.06-3.91,6.93l-4.2-.78c-6.68-1.26-6.5-1.51-13.46-.22-3.73.7-7.65,1.42-11.51.7-2.34-.44-3.57-1.37-5.67-3A19,19,0,0,0,23.4,32a12.35,12.35,0,0,0-3.06-1.3c-1.6-.38-3.85.16-4.79-1.22a2.59,2.59,0,0,1-.38-1.37V10ZM122.88,83.14H107.3v30.14h15.58V83.14Zm-19,27.61V85.56H92.56c-4.8.86-9.6,3.46-14.41,6.49h-8.8c-4,.24-6.07,4.27-2.19,6.93,3.08,2.26,7.15,2.13,11.33,1.76,2.88-.15,3,3.72,0,3.74-1,.08-2.18-.17-3.17-.17-5.21,0-9.49-1-12.12-5.11l-1.32-3.08L48.79,89.63c-6.55-2.15-11.2,4.7-6.38,9.46a171.58,171.58,0,0,0,29.15,17.16c7.23,4.39,14.45,4.24,21.67,0l10.66-5.5ZM79.13,27,105,66.8,75.32,85.58l-2.54-3.91L94,68.26l.28-.17A4.4,4.4,0,0,0,95.56,62l-1.22-1.88.06,0-5.89-8.94-11.71-18a9.88,9.88,0,0,0,1.5-1.94h0A6.38,6.38,0,0,0,79.13,27Zm-5.41,7.7,19.51,30L63.56,83.5l-27.26-42c.76,0,1.51-.06,2.26-.13,1.29-.12,2.54-.3,3.75-.51L62.15,71a5.2,5.2,0,0,1,7.16,1.61L81,65.15A5.18,5.18,0,0,1,82.64,58L69.45,38c.06-.08.11-.17.16-.25a3.62,3.62,0,0,0,.2-.33,7.21,7.21,0,0,0,.82-3.18,6.59,6.59,0,0,0,3.09.46Z"/></svg>',
                        ],
                    ];

                    $type = strtolower($row->transaction_type->vname);
                    $style = $typeStyles[$type] ?? [
                        'color' => 'bg-gray-100 dark:bg-gray-800',
                        'icon' => '<svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 4v16m8-8H4" /></svg>',
                    ];

                      $data = json_encode([
                                'opn' => $row->opening_balance,
                                'name' => $row->vname,
                                ]);
                            $encrypted = Crypt::encryptString($data);
                            $link = route('transactions', ['id' => $row->id]) . '?data=' . $encrypted;
                @endphp


                <div class="flex justify-center mt-10">

                    <div class="relative inline-flex  group w-full">
                        <div
                            class="absolute transitiona-all duration-1000 opacity-60 -inset-px bg-gradient-to-r
                             from-[#44BCFF]/50 via-[#FF44EC]/60 to-[#FF675E]/60 rounded-xl blur-lg group-hover:opacity-100 group-hover:-inset-1
                             group-hover:duration-200 animate-tilt">
                        </div>

                        <div class="relative inline-flex items-center justify-center  w-full">
                    <div class="bg-white/10 border p-2 w-full rounded-lg shadow-[inset_0_8px_20px_rgba(0,0,0,0.3)] shadow-white border-white">

                        <div class="flex flex-col w-full gap-2 p-4 border border-gray-300 dark:border-gray-500 {{ $style['color'] }} rounded-lg">
                            <a href="{{ $link }}">
                                <div class="flex flex-col gap-2">
                                    <div class="flex items-center justify-between">
                                        <div class="uppercase text-2xl font-semibold">{{ $row->vname }}</div>
                                        <div class="h-10 w-max">{!! $style['icon'] !!}</div>
                                    </div>
                                    <div
                                        class="text-sm font-medium ">{{ $row->transaction_type->vname }}</div>
                                    <div class="text-lg font-medium ">{{ $row->bank->vname }}</div>
                                    <div class="text-lg font-medium tracking-widest">{{ $row->account_no }}</div>
                                    <div class="text-2xl font-bold">{{ $row->current_balance }}</div>
                                </div>
                            </a>
                            <div class="flex justify-between mt-2">
                                {{--                            <x-Ui::table.cell-status active="{{ $row->active_id }}"/>--}}
                                <div></div>
                                <x-Ui::table.cell-action id="{{ $row->id }}"/>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>


                </div>

            @endforeach
        </div>

        <!-- Delete Modal --------------------------------------------------------------------------------------------->
        <x-Ui::modal.confirm-delete/>

        <div class="pt-5">{{ $list->links() }}</div>

        <!-- Create/ Edit Popup --------------------------------------------------------------------------------------->

        <x-Ui::forms.create :id="$vid">
            <div class="flex flex-col gap-3">

                <div>
                    <x-Ui::input.floating wire:model="vname" label="Account Book Name"/>
                    <x-Ui::input.error-text wire:model="vname"/>
                </div>

                @livewire('common::lookup.transaction-type',['initId' => $transaction_type_id])

                @if (!empty($transaction_type_id) && $transaction_type_id != 1)

                    <x-Ui::input.floating wire:model="account_no" label="Account No"/>

                    <x-Ui::input.floating wire:model="ifsc_code" label="IFSC Code"/>

                    @livewire('common::lookup.bank',['initId' => $bank_id])

                    @livewire('common::lookup.account-type',['initId' => $account_type_id])

                    <x-Ui::input.floating wire:model="branch" label="Branch"/>
                @endif

                <x-Ui::input.floating wire:model="opening_balance" label="Opening Balance"/>

                <x-Ui::input.model-date wire:model="opening_balance_date" label="Opening Date"/>

                <x-Ui::input.floating wire:model="notes" label="notes"/>

            </div>
        </x-Ui::forms.create>

    </x-Ui::forms.m-panel>
</div>
