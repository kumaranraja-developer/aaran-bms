<div>
    <x-Ui::menu.web.top-banner
        description="Apps"
        slogan="All the software you need to run your business."
    />

    <div class="bg-white dark:bg-dark scrollbar-hide">

        <div class="bg-gray-200 text-black dark:bg-dark dark:text-dark-9">
            <div class="grid grid-cols-1 lg:grid-cols-2 py-10 sm:py-25">
                <section class="text-gray-600 body-font bg-white h-[80vh] hidden lg:flex items-center justify-center dark:bg-dark">
                    <div class="container px-5 mx-auto">
                        <div id="customCarousel" class="carousel">
                            @foreach($quotes as $index => $quote)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <div class="w-[70%] w-full mx-auto text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                             class="inline-block w-8 h-8 text-gray-400 mb-8" viewBox="0 0 975.036 975.036">
                                            <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                                        </svg>
                                        <p class="leading-relaxed text-lg dark:text-dark-8">{{$quote['quote']}}</p>
                                        <span class="inline-block h-1 w-10 rounded bg-primary mt-8 mb-6"></span>
                                        <h2 class="text-gray-900 font-medium title-font tracking-wider text-sm dark:text-dark-8">{{$quote['name']}}</h2>
                                        <p class="text-gray-500 dark:text-dark-8">{{$quote['job']}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>

                <div class="flex flex-col gap-3">
                    <div class="text-2xl md:text-3xl block my-5 mx-auto text-center font-bold w-[80%] sm:w-[50%] lg:w-[70%]">Experience Subscription plan For 7 Days</div>
                    <div class="block mx-auto text-start w-[80%] sm:w-[50%] lg:w-[70%]">
                        <p class="w-full py-2">Company Name</p>
                        <input type="text" class="border border-gray-300 bg-white rounded-md w-full p-2"/><br>
                    </div>
                    <div class="block mx-auto text-start w-[80%] sm:w-[50%] lg:w-[70%]">
                        <p class="w-full py-2">Email Address</p>
                        <input type="text" class="border border-gray-300 bg-white rounded-md w-full p-2"/><br>
                    </div>
                    <div class="block mx-auto text-start w-[80%] sm:w-[50%] lg:w-[70%]">
                        <p class="w-full py-2">Password</p>
                        <input type="text" class="border border-gray-300 bg-white rounded-md w-full p-2"/><br>
                    </div>
                    <div class="flex justify-center my-3 ">
                        <div class="flex items-center w-[80%] sm:w-[50%] lg:w-[70%] justify-start text-start">
                            <input type="checkbox" class="mr-2"/>
                            <label>
                                I agree to the
                                <span class="text-blue-400 underline cursor-pointer">Terms of Service</span>
                                and
                                <span class="text-blue-400 underline cursor-pointer">Privacy Policy</span>
                            </label>
                        </div>
                    </div>
                    <button class="bg-green-500 w-[80%] sm:w-[50%] lg:w-[70%] p-2 my-3 text-white rounded-sm block mx-auto">Create My Account</button>
                    <hr class="border-t block m-auto border-gray-300 my-4 w-[80%] sm:w-[50%] lg:w-[70%]" />
                    <div class=" flex items-center justify-center">
                        <div class="flex justify-between w-full max-w-[300px]">
                            <img src="/images/authentication/google.png" width="30"/>
                            <img src="/images/authentication/twitter.png" width="30"/>
                            <img src="/images/authentication/linkedin.png" width="30"/>
                            <img src="/images/authentication/facebook.png" width="30"/>
                        </div>
                    </div>
                    <h1 class="text-center mt-3">Already have an account? <span href="" class="text-blue-500 ">Log in</span></h1>

                </div>
            </div>
        </div>

        <x-Ui::web.common.footer-address />
        <x-Ui::web.common.copyright/>
    </div>

</div>
<script>
    (function() {
        const items = document.querySelectorAll('#customCarousel .carousel-item');
        let currentIndex = 0;

        function showNext() {
            items[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + 1) % items.length;
            items[currentIndex].classList.add('active');
        }

        setInterval(showNext, 5000); // change slide every 5 seconds
    })();
</script>
