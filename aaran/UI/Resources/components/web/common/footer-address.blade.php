<div class="flex-col flex justify-center lg:h-96 h-auto bg-[#0d0d0d] pattern">
    <div class="lg:flex mx-auto lg:w-11/12 lg:justify-between w-8/12">

        {{-- Company Info --}}
        <div class="flex flex-col my-6">
            <div
                class="lg:text-red-500 lg:text-xl text-lg text-red-500">{{Aaran\Assets\Config\Application::AppCompanyName}}</div>
            <div class="mt-3">
                <div class="lg:text-sm text-xs font-roboto text-white leading-relaxed tracking-wider">
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
                ['label' => 'Contact Us', 'href' => route('web-projects')],
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
                ['label' => 'Erp', 'href' => route('web-contacts')],
                ['label' => 'WebSite', 'href' => route('web-contacts')],
                ['label' => 'E Commerce', 'href' => route('web-contacts')],
            ]"
        />

        <x-Ui::web.common.footer-column
            title="Helpful Links"
            :links="[
                ['label' => 'Contact', 'href' => route('web-contacts')],
                ['label' => 'FAQ', 'href' => route('abouts')],
                ['label' => 'Live Chat', 'href' => route('abouts')],
                ['label' => 'Pricing', 'href' => route('web-projects')],
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
</div>
