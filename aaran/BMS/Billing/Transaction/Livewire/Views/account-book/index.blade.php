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
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mt-10 lg:grid-cols-4">
            @foreach($list as $index=>$row)

                @php
                    $data = json_encode([
                        'opn' => $row->opening_balance,
                        'name' => $row->vname,
                        ]);
                    $encrypted = Crypt::encryptString($data);
                    $link = route('transactions', ['id' => $row->id]) . '?data=' . $encrypted;
                @endphp
                <div class="p-1.5 bg-white dark:bg-dark-4 border border-gray-300 dark:border-gray-500 rounded-lg transform hover:-translate-y-2 box-shadow shadow-sm shadow-white duration-300">
                    <div class="flex flex-col gap-2 p-4 border border-gray-300 bg-gray-50 dark:border-gray-500 dark:bg-dark-5 rounded-lg">
                        <a href="{{$link}}">
                            <div class="flex flex-col gap-2">
                                <div class="flex justify-between">
                                    <div>Name</div>
                                    <div>   {{$row->vname}}</div>
                                </div>
                                <div class="flex justify-between">
                                    <div>Type</div>
                                    <div> {{$row->transaction_type->vname}}</div>
                                </div>
                                <div class="flex justify-between">
                                    <div>Account No.</div>
                                    <div> {{$row->account_no}}</div>
                                </div>
                                <div class="flex justify-between">
                                    <div>Bank</div>
                                    <div>  {{$row->bank->vname}}</div>
                                </div>
                                <div class="flex justify-between">
                                    <div>Balance</div>
                                    <div>   {{$row->current_balance}}</div>
                                </div>
                                <div class="flex justify-between">
                                    <div>As on Date</div>
                                    <div> {{$row->current_balance_date}}</div>
                                </div>
                                <div class="flex justify-between">
                                    <div>Status</div>
                                    <x-Ui::table.cell-status active="{{$row->active_id}}"/>
                                </div>
                            </div>
                        </a>
                        <div class="flex justify-between">
                            <div>Action</div>
                            <x-Ui::table.cell-action id="{{$row->id}}"/>
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
