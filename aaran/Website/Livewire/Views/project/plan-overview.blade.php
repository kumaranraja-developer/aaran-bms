@php
    use Aaran\Assets\Helper\SubscriptionPlanDetails;
    $selectedPlanId = request()->route('id');
    $filteredPlans = SubscriptionPlanDetails::getWithTrial($selectedPlanId);
@endphp


<section id="pricing" aria-label="Pricing" class="bg-slate-900 py-12 sm:py-22  xl:px-50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

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


            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-2 px-6 sm:px-8 lg:py-8">
                @foreach ($filteredPlans as $plan)
                    @php
                        $isSecond = $loop->iteration === 2;

                        $containerClasses = ($plan['highlighted'] || $isSecond)
                            ? 'bg-gradient-to-br from-indigo-700 to-indigo-900 ring-2 ring-indigo-500 shadow-2xl text-white'
                            : 'bg-slate-800 text-slate-100';

                        $customizedcontainerClasses = (!$isSecond && $plan['customized'])
                            ? 'bg-gradient-to-br from-pink-700 to-red-500 ring-2 ring-red-500 shadow-2xl text-white'
                            : '';
                    @endphp

                    <section class="flex flex-col rounded-3xl p-6 {{ $containerClasses }} {{ $customizedcontainerClasses }}">

                    @if ($plan['highlighted'])
                            <span
                                class="mb-3 inline-block self-start rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-indigo-200">
                    Most Popular
                </span>
                        @else
                            <span class="mb-3 inline-block">&nbsp;</span>
                        @endif

                            <div class="mt-5 text-lg font-semibold">{{ $plan['title'] }}</div>

                        <div class="text-3xl h-20  tracking-tight">
                            @if($plan['price'] === 'Custom price')
                                <div>Custom Price</div>
                            @else
                                <div x-show="billing === 'monthly'">
                                    <div>{{ Aaran\Assets\Helper\ConvertTo::rupeesFormat(floatval($plan['price'])) }}</div>
                                </div>
                                <div x-show="billing === 'yearly'">
                                    <div class="text-xl line-through">
                                        {{ Aaran\Assets\Helper\ConvertTo::rupeesFormat(floatval($plan['price']) * 12) }}
                                    </div>
                                    <div>
                                        {{ Aaran\Assets\Helper\ConvertTo::rupeesFormat(floatval($plan['price']) * 12 * 0.8) }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <p class="mt-2 text-base text-slate-300">{{ $plan['description'] }}</p>

                        <a  href="{{route('client-registration',$plan['id'])}}"
                           class="mt-8 inline-flex items-center justify-center rounded-full border {{ $plan['highlighted'] ? 'bg-white text-gray-900 hover:text-white' : '' }} border-white py-2 px-4 text-sm hover:bg-white/10">
                            {{$plan['btn_text']}}
                        </a>

                            @php
                                $featureCount = count($plan['features']);
                            @endphp

                            <div x-data="{ showAll: false }">
                                <ul class="mt-10 space-y-3 text-sm">
                                    @foreach ($plan['features'] as $index => $feature)
                                        <li class="flex items-start" x-show="showAll || {{ $index }} < 5">
                                            <svg class="h-6 w-6 flex-none fill-current stroke-current text-slate-400" viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4" stroke-width="2" fill="none" stroke="currentColor"/>
                                            </svg>
                                            <span class="ml-1 flex text-left shrink-0 w-full">{{ $feature }}</span>
                                        </li>
                                    @endforeach
                                </ul>

                                @if ($featureCount > 5)
                                    <button
                                        @click="showAll = !showAll"
                                        class="text-blue-400 hover:underline text-sm mt-2"
                                    >
                                        <span x-show="!showAll">Show more</span>
                                        <span x-show="showAll">Show less</span>
                                    </button>
                                @endif
                            </div>

                    </section>
                @endforeach
            </div>

        </div>
    </div>

</section>
