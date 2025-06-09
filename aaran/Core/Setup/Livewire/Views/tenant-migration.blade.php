<div>
    <x-slot name="header">Tenant List</x-slot>

    <x-Ui::loadings.loading/>

    <div class="font-roboto tracking-wider">
        <div class="bg-amber-100 py-18 px-26">
            <div class="text-4xl font-semibold">Setup for {{$tenant->t_name}}
            </div>
        </div>
    </div>


    <section class="mt-5 p-5 w-full">

        <div class="py-5">
            <x-Ui::button.new-x wire:click="create"/>
        </div>
        <!-- Table Data ----------------------------------------------------------------------------------------------->

        <x-Ui::table.form>
            <x-slot:table_header>
                <x-Ui::table.header-serial/>
                <x-Ui::table.header-text wire:click.prevent="sortBy('id')" sortIcon="{{$sortAsc}}" :left="true">
                    Name
                </x-Ui::table.header-text>
                <x-Ui::table.header-text sortIcon="none">Email</x-Ui::table.header-text>
                <x-Ui::table.header-status/>
                <x-Ui::table.header-action/>
            </x-slot:table_header>

            <x-slot:table_body>
                @foreach($users as $index=>$row)
                    <x-Ui::table.row>
                        <x-Ui::table.cell-text>{{$index+1}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->name}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-text left>{{$row->email}}</x-Ui::table.cell-text>
                        <x-Ui::table.cell-status active="{{$row->active_id}}"/>
                        <x-Ui::table.cell-action id="{{$row->id}}"/>
                    </x-Ui::table.row>
                @endforeach
            </x-slot:table_body>
        </x-Ui::table.form>

        <!-- Delete Modal --------------------------------------------------------------------------------------------->

        <x-Ui::modal.confirm-delete/>

        <!-- Create/ Edit Popup --------------------------------------------------------------------------------------->

        <x-Ui::forms.create :id="$vid" :max-width="'6xl'">

            <div class="flex flex-col gap-3">

                <div>
                    <x-Ui::input.floating autofocus wire:model="name" label="Name"/>
                    <x-Ui::input.error-text wire:model="name"/>
                </div>

                <div>
                    <x-Ui::input.floating wire:model="email" label="Email"/>
                    <x-Ui::input.error-text wire:model="email"/>
                </div>

                <div>
                    <x-Ui::input.floating wire:model="password" label="Password"/>
                    <x-Ui::input.error-text wire:model="password"/>
                </div>

            </div>

        </x-Ui::forms.create>

    </section>

    <section class="w-full">
        <div class="mt-10 max-w-3xl mx-auto bg-white shadow-lg border border-neutral-200 rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800">Setup to "{{$tenant->t_name}}"</h2>
            <div class="border-b-2 border-orange-400">&nbsp;</div>

            <div class="grid grid-cols-2 divide-y divide-green-500 gap-y-3 py-2 px-3">
                <div>Database</div>
                <div>{{$tenant->db_name}}</div>

                <div>User</div>
                <div>{{$tenant->db_user}}</div>

                <div>Pass</div>
                <div>{{$tenant->db_pass}}</div>

                <div>&nbsp;</div>

            </div>

            <div class="flex justify-between mt-6">
                <button wire:click="createTenant" class="bg-green-500 text-white px-4 py-2 rounded cursor-pointer">
                    Submit
                </button>
            </div>
        </div>
    </section>

    <section class="mt-5 p-5">
        <div class="w-1/4">
            <!-- Card -->
            <!-- Card -->
            <div class="block rounded-lg bg-white border border-neutral-200 shadow-lg dark:bg-neutral-700 text-center">

                <div class=" flex flex-col gap-3 p-6">

                    <div class="text-xl">Subscription</div>
                    <div class="z-30">
                        <x-Ui::datepicker.date wire:model="from_date"/>
                    </div>
                    <div>
                        <x-Ui::datepicker.date wire:model="to_date"/>
                    </div>
                    <div>
                        <x-Ui::input.floating-text label="days" wire:model="v_days"/>
                    </div>

                    <div>
                        <x-Ui::input.floating-dropdown
                            wire:model="plan_id"
                            label="plan"
                            id="plan_id"
                            :options="$plans"
                            placeholder=""
                        />
                        <x-Ui::input.error-text wire:model="plan_id"/>
                    </div>

                    <x-Ui::button.animate1 label="set subscription" wire:click="setSubscription"/>
                </div>

            </div>
            <!-- Card -->
            <!-- Card -->
        </div>


    </section>

    <x-Ui::setup.alerts/>
    <x-Ui::setup.confetti-effect/>
</div>
