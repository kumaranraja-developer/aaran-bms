@php
    $confirmation_msg=true;
@endphp
<div>


    <div class="bg-stone-100 dark:bg-dark scrollbar-hide">

        <div class="bg-stone-100 text-black dark:bg-dark dark:text-dark-9">
            <div class="grid grid-cols-1 lg:grid-cols-2 py-10 sm:py-25 gap-10 lg:gap-0 bg-gray-50 dark:bg-dark-2">

                <!-- Left Section - Carousel -->
                <section
                    class="h-[80vh] hidden lg:flex items-center justify-center text-black">
                    <div class="container px-8 mx-auto">
                        <div id="customCarousel" class="carousel space-y-10">
                            @foreach($testimonials as $index => $data)
                                <div class="carousel-item  {{ $index === 0 ? 'active' : '' }}">
                                    <div class="w-[80%] mx-auto text-center bg-white dark:bg-dark-4 shadow-lg rounded-xl p-8">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                             class="inline-block w-8 h-8 text-gray-400 mb-8" viewBox="0 0 975.036 975.036">
                                            <path
                                                d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                                        </svg>
                                        <p class="leading-relaxed text-lg dark:text-dark-8">{{$data->testimonial}}</p>
                                        <span class="inline-block h-1 w-10 rounded bg-primary mt-8 mb-6"></span>
                                        <h2 class="text-gray-900 font-medium title-font tracking-wider text-xl dark:text-dark-8">{{$data->vname}}</h2>
                                        <p class="text-gray-500 text-sm dark:text-dark-8">{{$data->company}}</p>
                                        <p class="text-gray-500 dark:text-dark-8">{{$data->cities}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>

                <!-- Right Section - Form -->
                <div class="flex flex-col gap-5 bg-white text-black dark:bg-dark-3 dark:text-dark-9 mx-5 lg:mx-10 p-10 rounded-3xl shadow-md">
                    <div class="text-2xl md:text-3xl font-bold text-center w-full max-w-xl mx-auto">
                        {{\Aaran\Assets\Config\Application::AppTrialPeriod}}. All Features. Zero cost.
                    </div>

                    <!-- Company Name -->
                    <div class="w-full max-w-xl mx-auto">
                        <label class="block text-sm font-medium mb-2">Name</label>
                        <input type="text" wire:model="vname" class="w-full p-3 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-dark-4"/>
                        <x-Ui::input.error-text wire:model="vname"/>
                    </div>

                    <!-- Phone Number -->
                    <div class="w-full max-w-xl mx-auto">
                        <label class="block text-sm font-medium mb-2">Phone Number</label>
                        <input type="number" wire:model="phone" class="w-full p-3 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-dark-4"/>
                        <x-Ui::input.error-text wire:model="phone"/>
                    </div>

                    <!-- Email -->
                    <div class="w-full max-w-xl mx-auto">
                        <label class="block text-sm font-medium mb-2">Email Address</label>
                        <input type="email" wire:model="email" class="w-full p-3 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-dark-4"/>
                        <x-Ui::input.error-text wire:model="email"/>
                    </div>

                    <!-- Password -->
                    <div class="w-full max-w-xl mx-auto">
                        <label class="block text-sm font-medium mb-2">Password</label>
                        <input type="password" wire:model="password" class="w-full p-3 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-dark-4"/>
                        <x-Ui::input.error-text wire:model="password"/>
                    </div>

                    <!-- Terms Checkbox -->
                    <div class="flex items-start gap-2 w-full max-w-xl mx-auto">
                        <input type="checkbox" class="mt-1" wire:model="agreed"/>
                        <label class="text-sm leading-relaxed">
                            I agree to the
                            <a href="{{route('terms')}}" class="text-blue-500 underline">Terms of Service</a>
                            and
                            <a href="{{route('policy')}}" class="text-blue-500 underline">Privacy Policy</a>.
                        </label>
                    </div>
                    <x-Ui::input.error-text wire:model="agreed"/>


                    <!-- Submit Button -->
                    <button wire:click="getSave"  class="bg-green-600 hover:bg-green-700 text-white font-medium py-3 rounded-lg w-full max-w-xl mx-auto">
                        Create My Account
                    </button>

                    <!-- Divider -->
                    <hr class="w-full max-w-xl mx-auto border-gray-300" />

                    <!-- Login Link -->
                    <p class="text-center text-sm">
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-blue-500 font-medium underline">Log in</a>
                    </p>
                </div>
            </div>

        </div>
        @if(!empty($showDialog))
            <div
                class="fixed inset-0 bg-black/60  flex items-center justify-center z-50 {{ $confirmation_msg ? 'flex' : 'hidden' }}">
                <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-lg transform transition-all scale-100">
                    <div class="flex items-center justify-center mb-6">
                        <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>

                    <h2 class="text-2xl font-bold text-center text-green-700 mb-4">Account Create Confirmation</h2>
                    <p class="text-center text-gray-600 mb-6">Your Trial Account created Successfully!!! </p>

                    <div class="mt-6 text-center">
                        <a href="{{ route('dashboard') }}" @click="showDialog = false"
                           class="inline-block bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-6 rounded-lg transition-colors duration-200">
                            OK
                        </a>
                    </div>
                </div>
            </div>
        @endif


        <x-Ui::web.common.footer-address/>
        <x-Ui::web.common.copyright/>
    </div>

</div>
<script>
    (function () {
        const items = document.querySelectorAll('#customCarousel .carousel-item');
        let currentIndex = 0;

        function showNext() {
            items[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + 1) % items.length;
            items[currentIndex].classList.add('active');
        }

        setInterval(showNext, 5000);
    })();
</script>
