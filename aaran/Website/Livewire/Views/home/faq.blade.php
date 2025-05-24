<div>
    <div class="font-roboto tracking-wider flex-col pt-5 pb-10 md:py-20 flex gap-y-6">
        <div class=" text-center sm:text-2xl text-xl font-semibold mt-2 animate__animated wow bounceInDown"
             data-wow-duration="3s">Frequently Asked Questions
        </div>
        <div class="sm:w-9/12 lg:w-1/2 w-auto mx-auto sm:px-0 px-2">
            <x-Ui::web.home.accordion :heading="'Is the subscription fee refundable?'">
                <div class="p-4 rounded-md text-xs">Yes, we offer a 100% refund on annual plans if requested
                    for cancellation within the first 7 days.
                    For longer plans, 100% refunds are available if canceled within 30 days.
                </div>
            </x-Ui::web.home.accordion>
            <x-Ui::web.home.accordion :heading="'Can I transfer my subscription to another business?'">
                <div class="p-4 rounded-md text-xs">You can transfer your Premium subscription to any other
                    business you own or start. Only valid for 3-years or longer plans.
                </div>
            </x-Ui::web.home.accordion>
            <x-Ui::web.home.accordion :heading="'How many users can I add as managers to my business? '">
                <div class="p-4 rounded-md text-xs">Different plans have different limits on the number of
                    users you can add. However, if you want to add more users than your plan permits, please reach out
                    to your account manager OR drop a message on chat support.
                </div>
            </x-Ui::web.home.accordion>
            <x-Ui::web.home.accordion :heading="'Will the prices be increased in the future?'">
                <div class="p-4 rounded-md text-xs">Yes. Incase prices increase, your current plan will be
                    carried forward for you.
                </div>
            </x-Ui::web.home.accordion>
            <x-Ui::web.home.accordion :heading="'What happens to my data when I want to leave?'">
                <div class="p-4 rounded-md text-xs">When you decide to leave Refrens, you have the option to
                    download all your customer data, invoices, quotations, and other documents at any time. This ensures
                    that you have access to your important business information even after discontinuing your use of the
                    platform. Refrens prioritizes data security and allows users to retain their data for their records
                    or for transitioning to another platform if needed.
                </div>
            </x-Ui::web.home.accordion>
            <x-Ui::web.home.accordion :heading="'What happens if I want to downgrade to the free plan later?'">
                <div class="p-4 rounded-md text-xs">No. You are upgrading only 1 business. If you need a bulk
                    plan for multiple businesses please reach out to us at premium@refrens.com.
                </div>
            </x-Ui::web.home.accordion>
            <x-Ui::web.home.accordion :heading="'I need more help.'">
                <div class="p-4 rounded-md text-xs">Please ping us on chat support with your email and phone
                    number details, we will get back to you. Or email us at premium@refrens.com
                </div>
            </x-Ui::web.home.accordion>
        </div>

    </div>
    <x-Ui::web.common.footer-address/>
    <x-Ui::web.common.copyright/>


</div>
