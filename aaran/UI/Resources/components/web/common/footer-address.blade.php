<div class="flex-col flex justify-center lg:h-96 h-auto bg-[#0d0d0d] pattern">
    <div class="hidden lg:flex mx-auto lg:w-11/12 lg:justify-between w-8/12">

        {{-- Company Info --}}
        <div class="flex flex-col my-6">
            <div
                class="lg:text-red-500 lg:text-xl text-lg  cursor-default text-red-500">{{Aaran\Assets\Config\Application::AppCompanyName}}</div>
            <div class="mt-3">
                <div class="lg:text-sm text-xs font-roboto  cursor-default text-white leading-relaxed tracking-wider">
                    {{Aaran\Assets\Config\Application::AppCompanyAddress_1}},<br>
                    {{Aaran\Assets\Config\Application::AppCompanyAddress_2}},<br>
                    {{Aaran\Assets\Config\Application::AppCompanyAddress_3}},<br>
                    {{Aaran\Assets\Config\Application::AppCompanyAddress_4}},<br>
                    {{Aaran\Assets\Config\Application::AppCompanyAddress_5}},<br>
                    <br>
                    {{Aaran\Assets\Config\Application::AppCompanyEmail}},<br>
                    {{Aaran\Assets\Config\Application::AppCompanyMobile}},<br>
                </div>
            </div>
        </div>

        {{-- Footer Columns --}}
        <x-Ui::web.common.footer-column
            title="Aaran"
            :links="[
                ['label' => 'About', 'href' => route('abouts')],
                ['label' => 'Contact Us', 'href' => route('web-contacts')],
                ['label' => 'Blog', 'href' => route('abouts')],
                ['label' => 'Careers', 'href' => route('abouts')],
                ['label' => 'Partners', 'href' => route('abouts')],

            ]"
        />

        <x-Ui::web.common.footer-column
            title="Projects"
            :links="[
                ['label' => 'Billing', 'href' => route('web-projects')],
                ['label' => 'Gst Invoice', 'href' => route('web-contacts')],
                ['label' => 'CRM', 'href' => route('web-contacts')],
                ['label' => 'LMS', 'href' => route('web-contacts')],
                ['label' => 'ERP', 'href' => route('web-contacts')],
                ['label' => 'WebSite', 'href' => route('web-contacts')],
                ['label' => 'E Commerce', 'href' => route('web-contacts')],
            ]"
        />

        <x-Ui::web.common.footer-column
            title="Helpful Links"
            :links="[
                ['label' => 'Contact', 'href' => route('web-contacts')],
                ['label' => 'FAQ', 'href' => route('faq')],
                ['label' => 'Live Chat', 'href' => route('abouts')],
                ['label' => 'Pricing', 'href' => route('plan-comparison')],
                ['label' => 'Feed back', 'href' => route('abouts')],
                ['label' => 'Help', 'href' => route('web-contacts')],
            ]"
        />

        <x-Ui::web.common.footer-column
            title="Legal"
            :links="[
                ['label' => 'Privacy Policy', 'href' => route('web-contacts')],
                ['label' => 'Terms & Conditions', 'href' => route('abouts')],
                ['label' => 'Return Policy', 'href' => route('abouts')],
                ['label' => 'Accessibility', 'href' => route('web-projects')],
            ]"
        />

        <x-Ui::web.common.footer-column
            title="Templates"
            :links="[
                ['label' => 'Invoice', 'href' => route('abouts')],
                ['label' => 'Gst Invoice', 'href' => route('web-projects')],
                ['label' => 'Quotations', 'href' => route('abouts')],
                ['label' => 'Consulting', 'href' => route('abouts')],
                ['label' => 'Estimate', 'href' => route('web-contacts')],
                ['label' => 'Others', 'href' => route('web-contacts')],
            ]"
        />
    </div>
    <div class="block lg:hidden pattern">
        <div class="relative inline-block text-left w-full">
            <button
                type="button"
                class="inline-flex w-full border border-gray-700 shadow-sm px-4 py-2 bg-black text-sm font-medium text-white hover:bg-dark-7"
                onclick="document.getElementById('dropdown-menu1').classList.toggle('hidden')"
            >
                Aaran Software
                <svg class="-mr-1 ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div
                id="dropdown-menu1"
                class=" w-full rounded-md px-4 shadow-lg bg-[#0d0d0d] ring-1 ring-black ring-opacity-5 z-50 pattern"
            >
                <div class="my-3">
                    <div class="lg:text-sm text-xs font-roboto text-white cursor-default leading-relaxed tracking-wider">
                        {{Aaran\Assets\Config\Application::AppCompanyAddress_1}},<br>
                        {{Aaran\Assets\Config\Application::AppCompanyAddress_2}},<br>
                        {{Aaran\Assets\Config\Application::AppCompanyAddress_3}},<br>
                        {{Aaran\Assets\Config\Application::AppCompanyAddress_4}},<br>
                        {{Aaran\Assets\Config\Application::AppCompanyAddress_5}},<br>
                        <br>
                        {{Aaran\Assets\Config\Application::AppCompanyEmail}},<br>
                        {{Aaran\Assets\Config\Application::AppCompanyMobile}},<br>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative inline-block text-left w-full pattern">
            <button
                type="button"
                class="inline-flex w-full border border-gray-700 shadow-sm px-4 py-2 bg-black  text-sm font-medium text-white hover:bg-dark-7"
                onclick="document.getElementById('dropdown-menu2').classList.toggle('hidden')"
            >
                Aaran
                <svg class="-mr-1 ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div
                id="dropdown-menu2"
                class=" w-full rounded-md px-4 shadow-lg bg-[#0d0d0d] ring-1 ring-black ring-opacity-5 hidden z-50 pattern"
            >
                <x-Ui::web.common.footer-column
                    :links="[
                ['label' => 'About', 'href' => route('abouts')],
                ['label' => 'Contact Us', 'href' => route('web-contacts')],
                ['label' => 'Blog', 'href' => route('abouts')],
                ['label' => 'Careers', 'href' => route('abouts')],
                ['label' => 'Partners', 'href' => route('abouts')],

            ]"
                />
            </div>
        </div>

        <div class="relative inline-block text-left w-full pattern">
            <button
                type="button"
                class="inline-flex w-full border border-gray-700 shadow-sm px-4 py-2 bg-black  text-sm font-medium text-white hover:bg-dark-7"
                onclick="document.getElementById('dropdown-menu3').classList.toggle('hidden')"
            >
                Projects
                <svg class="-mr-1 ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div
                id="dropdown-menu3"
                class=" w-full rounded-md px-4 shadow-lg bg-[#0d0d0d] ring-1 ring-black ring-opacity-5 hidden z-50 pattern"
            >
                <x-Ui::web.common.footer-column
                    title="Projects"
                    :links="[
                ['label' => 'Billing', 'href' => route('web-projects')],
                ['label' => 'Gst Invoice', 'href' => route('web-contacts')],
                ['label' => 'CRM', 'href' => route('web-contacts')],
                ['label' => 'LMS', 'href' => route('web-contacts')],
                ['label' => 'ERP', 'href' => route('web-contacts')],
                ['label' => 'WebSite', 'href' => route('web-contacts')],
                ['label' => 'E Commerce', 'href' => route('web-contacts')],
            ]"
                />
            </div>
        </div>
        <div class="relative inline-block text-left w-full pattern">
            <button
                type="button"
                class="inline-flex w-full border border-gray-700 shadow-sm px-4 py-2 bg-black  text-sm font-medium text-white hover:bg-dark-7"
                onclick="document.getElementById('dropdown-menu4').classList.toggle('hidden')"
            >
                Helpful Links
                <svg class="-mr-1 ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div
                id="dropdown-menu4"
                class=" w-full rounded-md px-4 shadow-lg bg-[#0d0d0d] ring-1 ring-black ring-opacity-5 hidden z-50 pattern"
            >
                <x-Ui::web.common.footer-column
                    :links="[
                ['label' => 'Contact', 'href' => route('web-contacts')],
                ['label' => 'FAQ', 'href' => route('faq')],
                ['label' => 'Live Chat', 'href' => route('abouts')],
                ['label' => 'Pricing', 'href' => route('plan-comparison')],
                ['label' => 'Feed back', 'href' => route('abouts')],
                ['label' => 'Help', 'href' => route('web-contacts')],
            ]"
                />
            </div>
        </div>
        <div class="relative inline-block text-left w-full pattern">
            <button
                type="button"
                class="inline-flex w-full border border-gray-700 shadow-sm px-4 py-2 bg-black text-sm font-medium text-white hover:bg-dark-7"
                onclick="document.getElementById('dropdown-menu5').classList.toggle('hidden')"
            >
                Legal
                <svg class="-mr-1 ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div
                id="dropdown-menu5"
                class=" w-full rounded-md px-4 shadow-lg bg-[#0d0d0d] ring-1 ring-black ring-opacity-5 hidden z-50 pattern"
            >
                <x-Ui::web.common.footer-column
                    :links="[
                ['label' => 'Privacy Policy', 'href' => route('web-contacts')],
                ['label' => 'Terms & Conditions', 'href' => route('abouts')],
                ['label' => 'Return Policy', 'href' => route('abouts')],
                ['label' => 'Accessibility', 'href' => route('web-projects')],
            ]"
                />
            </div>
        </div>
        <div class="relative inline-block text-left w-full pattern">
            <button
                type="button"
                class="inline-flex w-full border border-gray-700 shadow-sm px-4 py-2 bg-black text-sm font-medium text-white hover:bg-dark-7"
                onclick="document.getElementById('dropdown-menu6').classList.toggle('hidden')"
            >
                Templates
                <svg class="-mr-1 ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div
                id="dropdown-menu6"
                class=" w-full rounded-md px-4 shadow-lg bg-[#0d0d0d] ring-1 ring-black ring-opacity-5 hidden z-50 pattern"
            >
                <x-Ui::web.common.footer-column
                    :links="[
                ['label' => 'Invoice', 'href' => route('abouts')],
                ['label' => 'Gst Invoice', 'href' => route('web-projects')],
                ['label' => 'Quotations', 'href' => route('abouts')],
                ['label' => 'Consulting', 'href' => route('abouts')],
                ['label' => 'Estimate', 'href' => route('web-contacts')],
                ['label' => 'Others', 'href' => route('web-contacts')],
            ]"
                />
            </div>
        </div>
    </div>
</div>
