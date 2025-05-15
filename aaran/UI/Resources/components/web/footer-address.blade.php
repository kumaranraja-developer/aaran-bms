<div class="flex-col flex justify-center lg:h-96 h-auto bg-[#0d0d0d] pattern">
    <div class="lg:flex mx-auto lg:w-11/12 lg:justify-between w-8/12">

        {{-- Company Info --}}
        <div class="flex flex-col my-6">
            <div
                class="lg:text-red-500 lg:text-xl text-lg text-red-500">{{Aaran\Assets\App\Software::AppCompanyName}}</div>
            <div class="mt-3">
                <div class="lg:text-sm text-xs font-roboto text-white leading-relaxed tracking-wider">
                    {{Aaran\Assets\App\Software::AppCompanyAddress_1}},<br>
                    {{Aaran\Assets\App\Software::AppCompanyAddress_2}},<br>
                    {{Aaran\Assets\App\Software::AppCompanyAddress_3}},<br>
                    {{Aaran\Assets\App\Software::AppCompanyAddress_4}},<br>
                    {{Aaran\Assets\App\Software::AppCompanyAddress_5}},<br>
                    <br>
                    {{Aaran\Assets\App\Software::AppCompanyEmail}},<br>
                    {{Aaran\Assets\App\Software::AppCompanyMobile}},<br>
                </div>
            </div>
        </div>

        {{-- Footer Columns --}}
        <x-Ui::web.footer-column
            title="Aaran"
            :links="[
                ['label' => 'About', 'href' => route('abouts')],
                ['label' => 'Contact Us', 'href' => route('web-projects')],
                ['label' => 'Blog', 'href' => route('abouts')],
                ['label' => 'Careers', 'href' => route('abouts')],
                ['label' => 'Contact', 'href' => route('web-contacts')],
            ]"
        />

        <x-Ui::web.footer-column
            title="Links"
            :links="[
                ['label' => 'FAQ', 'href' => route('abouts')],
                ['label' => 'Pricing', 'href' => route('web-projects')],
                ['label' => 'Feed back', 'href' => route('abouts')],
                ['label' => 'Terms', 'href' => route('abouts')],
                ['label' => 'Privacy', 'href' => route('web-contacts')],
                ['label' => 'Help', 'href' => route('web-contacts')],
            ]"
        />

        <x-Ui::web.footer-column
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

        <x-Ui::web.footer-column
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
