<div>
    <x-slot name="header">Settings</x-slot>

    {{--    General Settings--}}


    <div
        x-data="{
        selectedId: null,
        init() {
            this.$nextTick(() => this.select(this.$id('tab', 1)))
        },
        select(id) {
            this.selectedId = id
        },
        isSelected(id) {
            return this.selectedId === id
        },
        whichChild(el, parent) {
            return Array.from(parent.children).indexOf(el) + 1
        }
    }"
        x-id="['tab']"
        class="mx-auto w-full"
    >
        <div class="flex border rounded-lg bg-white dark:bg-dark min-h-[300px]">
            <!-- Tab List (left side) -->
            <ul
                x-ref="tablist"
                @keydown.down.prevent.stop="$focus.wrap().next()"
                @keydown.up.prevent.stop="$focus.wrap().prev()"
                @keydown.home.prevent.stop="$focus.first()"
                @keydown.end.prevent.stop="$focus.last()"
                role="tablist"
                class="flex flex-col w-48 bg-gray-900 rounded-tl-lg rounded-bl-lg"
            >
                <!-- Tab 1 -->
                <li>
                    <button
                        :id="$id('tab', whichChild($el.parentElement, $refs.tablist))"
                        @click="select($el.id)"
                        @mousedown.prevent
                        @focus="select($el.id)"
                        type="button"
                        :tabindex="isSelected($el.id) ? 0 : -1"
                        :aria-selected="isSelected($el.id)"
                        :class="isSelected($el.id)
                        ? 'bg-white dark:bg-dark dark:text-white text-black font-semibold'
                        : 'text-white'"
                        class="w-full text-left px-4 py-3 focus:outline-none rounded-tl-lg"
                        role="tab"
                    >General</button>
                </li>

                <!-- Tab 2 -->
                <li>
                    <button
                        :id="$id('tab', whichChild($el.parentElement, $refs.tablist))"
                        @click="select($el.id)"
                        @mousedown.prevent
                        @focus="select($el.id)"
                        type="button"
                        :tabindex="isSelected($el.id) ? 0 : -1"
                        :aria-selected="isSelected($el.id)"
                        :class="isSelected($el.id)
                        ? 'bg-white text-black dark:bg-dark dark:text-white font-semibold'
                        : 'text-white'"
                        class="w-full text-left px-4 py-3  focus:outline-none"
                        role="tab"
                    >Transaction</button>
                </li>
                <li>
                    <button
                        :id="$id('tab', whichChild($el.parentElement, $refs.tablist))"
                        @click="select($el.id)"
                        @mousedown.prevent
                        @focus="select($el.id)"
                        type="button"
                        :tabindex="isSelected($el.id) ? 0 : -1"
                        :aria-selected="isSelected($el.id)"
                        :class="isSelected($el.id)
                        ? 'bg-white dark:bg-dark dark:text-white text-black font-semibold'
                        : 'text-white'"
                        class="w-full text-left px-4 py-3  focus:outline-none"
                        role="tab"
                    >Taxes and GST</button>
                </li>

                <li>
                    <button
                        :id="$id('tab', whichChild($el.parentElement, $refs.tablist))"
                        @click="select($el.id)"
                        @mousedown.prevent
                        @focus="select($el.id)"
                        type="button"
                        :tabindex="isSelected($el.id) ? 0 : -1"
                        :aria-selected="isSelected($el.id)"
                        :class="isSelected($el.id)
                        ? 'bg-white dark:bg-dark dark:text-white text-black font-semibold'
                        : 'text-white'"
                        class="w-full text-left px-4 py-3  focus:outline-none"
                        role="tab"
                    >Party</button>
                </li>
                <li>
                    <button
                        :id="$id('tab', whichChild($el.parentElement, $refs.tablist))"
                        @click="select($el.id)"
                        @mousedown.prevent
                        @focus="select($el.id)"
                        type="button"
                        :tabindex="isSelected($el.id) ? 0 : -1"
                        :aria-selected="isSelected($el.id)"
                        :class="isSelected($el.id)
                         ? 'bg-white dark:bg-dark dark:text-white text-black font-semibold'
                        : 'text-white'"
                        class="w-full text-left px-4 py-3  focus:outline-none"
                        role="tab"
                    >Print</button>
                </li>
                <li>
                    <button
                        :id="$id('tab', whichChild($el.parentElement, $refs.tablist))"
                        @click="select($el.id)"
                        @mousedown.prevent
                        @focus="select($el.id)"
                        type="button"
                        :tabindex="isSelected($el.id) ? 0 : -1"
                        :aria-selected="isSelected($el.id)"
                        :class="isSelected($el.id)
                        ? 'bg-white dark:bg-dark dark:text-white text-black font-semibold'
                        : 'text-white'"
                        class="w-full text-left px-4 py-3  focus:outline-none"
                        role="tab"
                    >Items</button>
                </li>
                <li>
                    <button
                        :id="$id('tab', whichChild($el.parentElement, $refs.tablist))"
                        @click="select($el.id)"
                        @mousedown.prevent
                        @focus="select($el.id)"
                        type="button"
                        :tabindex="isSelected($el.id) ? 0 : -1"
                        :aria-selected="isSelected($el.id)"
                        :class="isSelected($el.id)
                        ? 'bg-white dark:bg-dark dark:text-white text-black font-semibold'
                        : 'text-white'"
                        class="w-full text-left px-4 py-3  focus:outline-none"
                        role="tab"
                    >Service Remainder</button>
                </li>
                <li>
                    <button
                        :id="$id('tab', whichChild($el.parentElement, $refs.tablist))"
                        @click="select($el.id)"
                        @mousedown.prevent
                        @focus="select($el.id)"
                        type="button"
                        :tabindex="isSelected($el.id) ? 0 : -1"
                        :aria-selected="isSelected($el.id)"
                        :class="isSelected($el.id)
                        ? 'bg-white dark:bg-dark dark:text-white text-black font-semibold'
                        : 'text-white'"
                        class="w-full text-left px-4 py-3  focus:outline-none"
                        role="tab"
                    >Accounting</button>
                </li>
            </ul>

            <!-- Tab Panels (right side) -->
            <div role="tabpanels" class="flex-1 p-6">
                <!-- Panel 1 -->
                <section
                    x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
                    :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))"
                    role="tabpanel"
                >
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 text-sm dark:bg-dark">
                        {{--            Application --}}
                        <div class="flex flex-col gap-y-5 p-4">
                            <div class="text-lg font-bold">Application</div>

                            <hr class="w-full border border-gray-400 dark:border-dark-8">
                            <div>
                                <input type="checkbox" />
                                <label >Enable Passcode</label>
                            </div>
                            <div class="flex justify-between">
                                <label>Business Currency</label>
                                <select class="px-3 border border-amber-50 dark:bg-dark text-black dark:text-white">
                                    <option class="px-3"> Rs </option>
                                    <option class="px-3"> Dollar </option>
                                </select>
                            </div>
                            <div class="flex justify-between">
                                <div class="block">
                                    <div>Amount</div>
                                    <div class="text-xs text-dark-7">(upto Decimal Places)</div>
                                </div>
                                <input type="number" class="w-[20%] border-b" placeholder="2">
                                <label class="block my-auto text-dark-7">e.g. 0.00</label>
                            </div>
                            <div>
                                <input type="checkbox" checked />
                                <label>GSTIN Number</label>
                            </div>
                            <div>
                                <input type="checkbox" />
                                <label>Stop Sale on Negative Stock</label>
                            </div>
                        </div>

                        {{--            Multi firm--}}
                        <div class="p-4 flex flex-col gap-y-5">
                            <div class="flex justify-between">
                                <div class="text-lg font-bold">Multi Firm</div>
                                <div class="text-blue-500 flex items-center"> + Add Firm</div>
                            </div>

                            <hr class="w-full border border-gray-400 dark:border-dark-8">
                            <div class="flex flex-col gap-3">
                                <div class="flex items-center justify-between border p-2 dark:border-dark-5 bg-dark-9 dark:bg-dark-3">
                                    <div class="flex gap-3">
                                        <input type="radio" class="flex items-center" checked/>
                                        <div class="flex items-center">company name</div>
                                    </div>
                                    <div class="flex gap-3">
                                        <div>default</div>
                                        <div>
                                            <svg viewBox="-13 0 32 32" width="22" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000" transform="matrix(1, 0, 0, 1, 0, 0)rotate(45)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>pencil</title> <desc>Created with Sketch Beta.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set-Filled" sketch:type="MSLayerGroup" transform="translate(-583.000000, -101.000000)" fill="#2f23d1"> <path d="M583,123 L589,123 L589,110 L583,110 L583,123 Z M586,133.009 L589,125 L583,125 L586,133.009 L586,133.009 Z M587,101 L585,101 C583.367,100.963 582.947,101.841 583,103 L583,108 L589,108 L589,103 C589.007,101.788 588.635,101.008 587,101 L587,101 Z" id="pencil" sketch:type="MSShapeGroup"> </path> </g> </g> </g></svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between border p-2 dark:border-dark-5 bg-dark-9 dark:bg-dark-3">
                                    <div class="flex gap-3">
                                        <input type="radio" class="flex items-center"/>
                                        <div class="flex items-center">company name</div>
                                    </div>
                                    <div class="flex gap-3">
                                        <div>default</div>
                                        <div>
                                            <svg viewBox="-13 0 32 32" width="22" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000" transform="matrix(1, 0, 0, 1, 0, 0)rotate(45)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>pencil</title> <desc>Created with Sketch Beta.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set-Filled" sketch:type="MSLayerGroup" transform="translate(-583.000000, -101.000000)" fill="#2f23d1"> <path d="M583,123 L589,123 L589,110 L583,110 L583,123 Z M586,133.009 L589,125 L583,125 L586,133.009 L586,133.009 Z M587,101 L585,101 C583.367,100.963 582.947,101.841 583,103 L583,108 L589,108 L589,103 C589.007,101.788 588.635,101.008 587,101 L587,101 Z" id="pencil" sketch:type="MSShapeGroup"> </path> </g> </g> </g></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="p-4 flex flex-col gap-y-5">
                            <div class="text-lg font-bold">Backup & History</div>

                            <hr class="w-full border border-gray-400 dark:border-dark-8">
                            <div>
                                <input type="checkbox" />
                                <label>Auto Backup</label>
                            </div>
                            <div>
                                Last Backup date and time
                            </div>
                            <div>
                                <input type="checkbox" checked/>
                                <label>Audit Trail</label>
                            </div>
                        </div>
                        <div class="p-4 flex flex-col gap-y-5">
                            <div class="text-lg font-bold">More Transactions</div>

                            <hr class="w-full border border-gray-400 dark:border-dark-8">
                            <div>
                                <input type="checkbox" checked/>
                                <label>Estimate / Quotation</label>
                            </div>

                            <div>
                                <input type="checkbox" checked/>
                                <label>Sales / Purchase Order</label>
                            </div>

                            <div>
                                <input type="checkbox" />
                                <label>Other Income</label>
                            </div>
                            <div>
                                <input type="checkbox" />
                                <label>Fixed Assets (FA)</label>
                            </div>
                            <div>
                                <input type="checkbox" checked/>
                                <label>Delivery Challan</label>
                            </div>
                            <div class="px-6 flex flex-col gap-y-2">
                                <div class="flex gap-3">
                                    <input type="checkbox" checked/>
                                    <label>Goods return on Delivery Challan</label>
                                </div>
                                <div class="flex gap-3">
                                    <input type="checkbox"/>
                                    <label>Print Amount in Delivery Challan</label>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 flex flex-col gap-y-5">
                            <div class="text-lg font-bold">Stock Transfer Between Godowns</div>

                            <hr class="w-full border border-gray-400 dark:border-dark-8">
                            <div class="text-xs text-dark-7">
                                Manage all your stores/godowns and transfer stock seamlessly between them. Using this feature, you can transfer stock between
                                stores/godowns and manage your inventory more efficiently
                            </div>
                            <div class="flex gap-3">
                                <input type="checkbox" checked/>
                                <label>Godown Management and Stock Transfer</label>
                            </div>
                        </div>
                    </div>

                </section>

                <!-- Panel 2 -->
                <section
                    x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
                    :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))"
                    role="tabpanel"
                >
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 text-sm dark:bg-dark">
                        <div class="flex flex-col gap-y-5 p-5">
                            <div class="text-lg font-bold">
                                Transaction Header
                            </div>
                            <hr class="w-full border border-gray-400 dark:border-dark-8">
                            <div>
                                <input type="checkbox" checked/>
                                <label >Invoice/Bill No.</label>
                            </div>
                            <div class="flex gap-2">
                                <input type="checkbox"/>
                                <label >Add Time on Transaction</label>
                            </div>
                            <div class="flex gap-2">
                                <input type="checkbox"/>
                                <label >Cash sale by default</label>
                            </div>
                            <div class="flex gap-2">
                                <input type="checkbox"/>
                                <label >Billing Name of Parties</label>
                            </div>
                            <div class="flex gap-2">
                                <input type="checkbox"/>
                                <label >Customers P.O. Details on Transactions</label>
                            </div>
                        </div>
                        <div class="flex flex-col gap-y-5 p-5">
                            <div class="text-lg font-bold">
                              Items Table
                            </div>
                            <hr class="w-full border border-gray-400 dark:border-dark-8">

                            <div class="flex gap-2">
                                <input type="checkbox" checked/>
                                <label >Inclusive/Exclusive Tax on Rate (Price/Unit)</label>
                            </div>
                            <div class="flex gap-2">
                                <input type="checkbox" checked/>
                                <label >Display Purchase Price of Items</label>
                            </div>
                            <div class="flex gap-2">
                                <input type="checkbox"/>
                                <label >Show last 5 sale Price of Items</label>
                            </div>
                            <div class="flex gap-2">
                                <input type="checkbox"/>
                                <label >Free item Quantity</label>
                            </div>
                            <div class="flex gap-2">
                                <input type="checkbox"/>
                                <label >Count</label>
                            </div>
                        </div>
                        <div class="flex flex-col gap-y-5 p-5">
                            <div class="text-lg font-bold">
                               Taxes, Discount & Totals
                            </div>
                            <hr class="w-full border border-gray-400 dark:border-dark-8">

                            <div class="flex gap-2">
                                <input type="checkbox"/>
                                <label >Transaction wise Tax</label>
                            </div>
                            <div class="flex gap-2">
                                <input type="checkbox"/>
                                <label >Transaction wise Discount</label>
                            </div>
                            <div class="flex gap-2">
                                <input type="checkbox" checked/>
                                <label >Round off Total</label>
                            </div>

                            <div class="flex justify-between">
                                <select class="w-22 border-b border-gray-500 p-2">
                                    <option>Nearest</option>
                                </select>

                                <span class="block my-auto">To</span>
                                <select class="w-22 border-b border-gray-500 p-2">
                                    <option>1</option>
                                </select>
                            </div>



                        </div>
                        <div class="flex flex-col gap-y-5 p-5">
                            <div class="text-lg font-bold">
                               More Transaction Features
                            </div>
                            <hr class="w-full border border-gray-400 dark:border-dark-8">

                            <div class="flex gap-2">
                                <input type="checkbox"/>
                                <label >E-Way bill no</label>
                            </div>
                            <div class="flex gap-2">
                                <input type="checkbox"/>
                                <label >Quick Entry</label>
                            </div>
                            <div class="flex gap-2">
                                <input type="checkbox"/>
                                <label >Do not Show Invoice Preview</label>
                            </div>
                            <div class="flex gap-2">
                                <input type="checkbox"/>
                                <label >Enable Passcode for Transaction edit/delete</label>
                            </div>
                            <div class="flex gap-2">
                                <input type="checkbox"/>
                                <label >Discount During Payments</label>
                            </div>
                            <div class="flex gap-2">
                                <input type="checkbox"/>
                                <label >Link Payments to Invoices</label>
                            </div>
                            <div class="flex gap-2">
                                <input type="checkbox"/>
                                <label >Due Dates and Payment Terms</label>
                            </div>
                            <div class="flex gap-2">
                                <input type="checkbox"/>
                                <label >Show Profit while making sale Invoice</label>
                            </div>
                            <button class="text-blue-600 w-max bg-blue-100 px-4 py-2 rounded-md">Additional Fields</button>
                            <button class="text-blue-600 w-max bg-blue-100 px-4 py-2 rounded-md">Transaction Details</button>
                            <button class="text-blue-600 w-max bg-blue-100 px-4 py-2 rounded-md">Additional Charges</button>

                        </div>
                        <div class="flex flex-col gap-y-5 p-5" >
                            <div class="text-lg font-bold">
                                Transaction Prefixes
                            </div>
                            <hr class="w-full border border-dark-4 dark:border-dark-8">
                            <div class="border border-gray-400">
                                <div class="transform -translate-y-3 ml-3 w-max bg-white dark:bg-dark">Firm</div>
                                <div class="transform -translate-y-3">
                                    <select class="w-full pl-2">
                                        <option>Company Name</option>
                                    </select>
                                </div>
                            </div>

                            <div class="border border-dark-4 pb-3">
                                <div class="transform -translate-y-3 ml-3 w-max bg-white dark:bg-dark">Prefixes</div>
                                <div class="grid grid-cols-2 mx-4 gap-5">
                                    <div class="border border-gray-400">
                                        <div class="transform -translate-y-3 ml-3 w-max bg-white dark:bg-dark">Sale</div>
                                        <select class="transform -translate-y-3 w-full pl-2">
                                            <option>None</option>
                                        </select>
                                    </div>

                                    <div class="border border-gray-400">
                                        <div class="transform -translate-y-3 ml-3 w-max bg-white dark:bg-dark">Credit Note</div>
                                        <select class="transform -translate-y-3 w-full pl-2">
                                            <option>None</option>
                                        </select>
                                    </div>

                                    <div class="border border-gray-400">
                                        <div class="transform -translate-y-3 ml-3 w-max bg-white dark:bg-dark">Sale Order</div>
                                        <select class="transform -translate-y-3 w-full pl-2">
                                            <option>None</option>
                                        </select>
                                    </div>
                                    <div class="border border-gray-400">
                                        <div class="transform -translate-y-3 ml-3 w-max bg-white dark:bg-dark">Purchase Order</div>
                                        <select class="transform -translate-y-3 w-full pl-2">
                                            <option>None</option>
                                        </select>
                                    </div>
                                    <div class="border border-gray-400">
                                        <div class="transform -translate-y-3 ml-3 w-max bg-white dark:bg-dark">Estimate</div>
                                        <select class="transform -translate-y-3 w-full pl-2">
                                            <option>None</option>
                                        </select>
                                    </div>
                                    <div class="border border-gray-400">
                                        <div class="transform -translate-y-3 ml-3 w-max bg-white dark:bg-dark">Delivery Challan</div>
                                        <select class="transform -translate-y-3 w-full pl-2">
                                            <option>None</option>
                                        </select>
                                    </div>
                                    <div class="border border-gray-400">
                                        <div class="transform -translate-y-3 ml-3 w-max bg-white dark:bg-dark">Payment In</div>
                                        <select class="transform -translate-y-3 w-full pl-2">
                                            <option>None</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section
                    x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
                    :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))"
                    role="tabpanel"
                >
                    <div class="grid grid-cols-1 gap-y-2 sm:grid-cols-2 lg:grid-cols-3 text-sm">
                        <div class="flex flex-col gap-y-5">
                            <div class="text-lg font-bold">
                                GST Settings
                            </div>
                            <hr class="w-full border border-gray-400 dark:border-dark-8">
                            <div>
                                <input type="checkbox" checked/>
                                <label >Enable GST</label>
                            </div>
                            <div>
                                <input type="checkbox" checked/>
                                <label >Enable HSN/SAC Code</label>
                            </div>
                            <div>
                                <input type="checkbox" />
                                <label >Additional Cess On Item</label>
                            </div>
                            <div>
                                <input type="checkbox" />
                                <label >Reverse Charge</label>
                            </div>
                            <div>
                                <input type="checkbox" checked/>
                                <label >Enable Place of Supply</label>
                            </div>
                            <div>
                                <input type="checkbox" />
                                <label >Composite Schema</label>
                            </div>
                            <div>
                                <input type="checkbox" />
                                <label >Enable TCS</label>
                            </div>
                            <div>
                                <input type="checkbox" />
                                <label >Enable TDS</label>
                            </div>
                            <button class="text-blue-600 w-max bg-blue-100 px-4 py-2 rounded-md">Tax List</button>
                        </div>

                    </div>

                </section>
                <section
                    x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
                    :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))"
                    role="tabpanel"
                >
                    <h2 class="text-xl font-bold">Tab 4 Content</h2>
                </section>
                <section
                    x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
                    :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))"
                    role="tabpanel"
                >
                    <h2 class="text-xl font-bold">Tab 5 Content</h2>
                </section>
                <section
                    x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
                    :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))"
                    role="tabpanel"
                >
                    <h2 class="text-xl font-bold">Tab 6 Content</h2>
                </section>
                <section
                    x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
                    :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))"
                    role="tabpanel"
                >
                    <h2 class="text-xl font-bold">Tab 7 Content</h2>
                </section>
                <section
                    x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
                    :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))"
                    role="tabpanel"
                >
                    <h2 class="text-xl font-bold">Tab 8 Content</h2>
                </section>
            </div>
        </div>
    </div>

    <div>

    </div>
</div>
