<x-Ui::layouts.guest :title="__('Subscription Renew')">
{{--    <div class="bg-gray-50 flex items-center justify-center min-h-fit">--}}
{{--        <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg w-full">--}}
{{--            <h2 class="text-2xl font-bold text-center text-blue-600 mb-4">Renew Your Subscription</h2>--}}

{{--            <p class="text-center text-lg text-gray-700 mb-6">--}}
{{--                Your subscription has expired. To continue enjoying uninterrupted access to all features, please renew--}}
{{--                your subscription.--}}
{{--            </p>--}}

{{--            <!-- Subscription Plan Options -->--}}
{{--            <div class="space-y-4 mb-6">--}}
{{--                <div class="border p-4 rounded-lg shadow-sm hover:shadow-md transition duration-300">--}}
{{--                    <h3 class="text-xl font-semibold text-blue-600">Basic Plan</h3>--}}
{{--                    <p class="text-lg text-gray-700">Access to basic features and support.</p>--}}
{{--                    <div class="flex justify-between items-center mt-4">--}}
{{--                        <span class="text-lg font-bold text-green-600">rs.100 / month</span>--}}
{{--                        <a href="{{ route('subscription.pay', ['plan' => 'basic', 'amount'=>'100']) }}"--}}
{{--                           class="inline-block px-6 py-3 bg-blue-600 text-white rounded-full text-lg hover:bg-blue-700 transition duration-300">--}}
{{--                            Renew Now--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="border p-4 rounded-lg shadow-sm hover:shadow-md transition duration-300">--}}
{{--                    <h3 class="text-xl font-semibold text-blue-600">Pro Plan</h3>--}}
{{--                    <p class="text-lg text-gray-700">Access to all features, premium support, and more.</p>--}}
{{--                    <div class="flex justify-between items-center mt-4">--}}
{{--                        <span class="text-lg font-bold text-green-600">rs.100 / month</span>--}}
{{--                        <a href="{{ route('subscription.pay', ['plan' => 'pro', 'amount'=>'100']) }}"--}}
{{--                           class="inline-block px-6 py-3 bg-blue-600 text-white rounded-full text-lg hover:bg-blue-700 transition duration-300">--}}
{{--                            Renew Now--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Contact Support -->--}}
{{--            <div class="text-center mt-6">--}}
{{--                <p class="text-sm text-gray-600">--}}
{{--                    Need help or have questions? <a href="{{ route('contacts') }}"--}}
{{--                                                    class="text-blue-600 hover:text-blue-700">Contact support</a>--}}
{{--                </p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    @php
        $plans = [
            [
                'id' => 'basic',
                'title' => 'Basic',
                'price' => '750',
                'description' => 'For freelancers & beginners.Simple GST billing to get you started.',

                'highlighted' => false, 'customized' => false,
            ],
            [
                'id' => 'medium',
                'title' => 'Small Business',
                'price' => '1500',
                'description' => 'For growing businesses.More users, smart reports, and inventory tools.',

                'highlighted' => true, 'customized' => false,
            ],
            [
                'id' => 'enterprise',
                'title' => 'Enterprise',
                'price' => '3000',
                'description' => 'For power users.Full features, advanced insights, and payroll.',

                'highlighted' => false, 'customized' => false,

            ],
            [
                'id' => 'elite',
                'title' => 'Elite',
                'price' => 'Custom price',
                'description' => 'For unique needs.Tailored tools, custom access, and support.',

                'highlighted' => false,
                'customized' => true,
            ],
        ];
    @endphp

    <section id="pricing" aria-label="Pricing" class="bg-slate-900 py-5">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="md:text-center">
                <h2 class="font-display text-3xl tracking-tight text-white sm:text-4xl text-center"><span
                        class="relative whitespace-nowrap"><span
                            class="relative">subscription-renew</span></span>
                </h2>
                <p class="mt-6 text-lg text-center mb-5 text-slate-400">
                    <span class="text-red-500">Your subscription has expired.</span> To continue enjoying uninterrupted access to all features, please renew your subscription.
                </p>
            </div>


            <div x-data="{ billing: 'monthly' }" class="text-center mb-6">
                <div class="inline-flex rounded-lg overflow-hidden border border-slate-600">
                    <button
                        :class="billing === 'monthly' ? 'bg-blue-600 text-white' : 'bg-slate-800 text-slate-400'"
                        class="px-4 py-2"
                        @click="billing = 'monthly'"
                    >
                        Pay monthly
                    </button>
                    <button
                        :class="billing === 'yearly' ? 'bg-blue-600 text-white' : 'bg-slate-800 text-slate-400'"
                        class="px-4 py-2"
                        @click="billing = 'yearly'"
                    >
                        Pay yearly
                    </button>
                </div>

                <p x-show="billing === 'monthly'" class="mt-2 text-primary text-sm font-medium">
                    &nbsp;
                </p>

                <p x-show="billing === 'yearly'" class="mt-2 text-primary text-sm font-medium">
                    Save up to 20% with yearly
                </p>


                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4 px-6 sm:px-8 lg:py-4">
                    @foreach ($plans as $plan)
                        @php
                            $containerClasses = $plan['highlighted']
                                ? 'bg-gradient-to-br from-indigo-700 to-indigo-900 ring-2 ring-indigo-500 shadow-2xl text-white'
                                : 'bg-slate-800 text-slate-100';
                            $customizedcontainerClasses = $plan['customized']
                                ? 'bg-gradient-to-br from-pink-700 to-red-500 ring-2 ring-red-500 shadow-2xl text-white'
                                : 'bg-slate-800 text-slate-100';

                        @endphp

                        <section class="flex flex-col rounded-3xl p-6 {{$customizedcontainerClasses}} {{ $containerClasses }}">

                            <div class="text-3xl font-light tracking-tight">

                                <div x-show="billing === 'monthly'">
{{--                                    <div>&nbsp;</div>--}}
                                    <div>{{ Aaran\Assets\Helper\ConvertTo::rupeesFormat(floatval($plan['price']))  }}</div>
                                </div>


                                <div x-show="billing === 'yearly'">
                                    <div
                                        class="text-xl line-through text-dark-8">{{ Aaran\Assets\Helper\ConvertTo::rupeesFormat((floatval($plan['price'])*12)) }}</div>
                                    <div>{{ Aaran\Assets\Helper\ConvertTo::rupeesFormat((floatval($plan['price'])*12)-(floatval($plan['price']) * 12 * 0.20)) }}</div>
                                </div>

                                @if($plan['price'] ==='Custom price')
                                    <div>
                                        <div x-show="billing === 'yearly'">
{{--                                            <div>&nbsp;</div>--}}
                                        </div>
                                        <div>Custom Price</div>
                                    </div>
                                @endif

                            </div>


                            <div class="mt-5 text-lg font-semibold">{{ $plan['title'] }}</div>
                            <p class="mt-2 text-base text-slate-300">{{ $plan['description'] }}</p>

                            <a href="{{ route('subscription.pay', ['plan' => $plan['id'], 'amount'=>$plan['price']]) }}"
                               class="mt-8 inline-flex items-center justify-center rounded-full border {{$plan['highlighted']?'bg-white text-gray-900 hover:text-white ':' '}}  border-white py-2 px-4 text-sm hover:bg-white/10">
                                Renew Now
                            </a>

                        </section>
                    @endforeach
                </div>

            </div>
        </div>
        <div class="text-center mt-4 border p-3 border-x-0 border-y-gray-800 cursor-pointer text-dark-9 hover:bg-gradient-to-r
           hover:from-indigo-700 hover:to-indigo-900  transition-colors duration-100 delay-100 text-xl"
             href="{{route('plan-comparison')}}" wire:navigate>Detailed Comparison
        </div>
    </section>

</x-Ui::layouts.guest>
