<div>
    <x-Ui::menu.web.top-banner
        description="Apps"
        slogan="All the software you need to run your business."
    />

    <div class="bg-white dark:bg-dark  scrollbar-hide">

        <!-- Heading Section -->
        <div class="text-black dark:text-white grid grid-cols-1 md:grid-cols-2 my-10 p-2">
            <div class="text-6xl font-bold break-after-auto opacity-0 animate-fade-in-up animation-delay-0">
                SOFTWARE TO UNLOCK BUSINESS GROWTH
            </div>

            <!-- Card Container -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 mt-20 md:mt-0">

                <!-- ========== CARD 1 ========== -->
                <div class="relative peer">

                <div class="flip-card h-[400px] relative">
                    <div class="flip-inner">
                        <!-- Front -->
                        <div class="flip-front bg-orange-500 p-4 border border-gray-400 flex flex-col">
                            <div class="font-bold text-2xl my-2">Your Business at a Glance</div>
                            <div class="my-5">View real-time sales, profits, and performance insights—all in one clean dashboard.</div>
                            <div class="mt-auto h-60 flex items-center justify-center">
                                <img src="{{asset('/images/web/home/dashboard.png')}}" class="w-full object-contain rounded-1xl" />
                            </div>
                        </div>

                        <!-- Back -->
                        <div class="flip-back bg-white p-4 border border-gray-400 flex items-center justify-center">
                            <label for="popup1" class="cursor-pointer text-xl font-semibold underline text-orange-600">
                                View Image →
                            </label>
                        </div>
                    </div>
                </div>
                <input type="checkbox" id="popup1" class="peer hidden" />
                <div class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 peer-checked:opacity-100 peer-checked:pointer-events-auto">
                    <div class="bg-white p-6 rounded-2xl relative w-[90%] max-w-2xl">
                        <label for="popup1" class="absolute top-2 right-4 text-3xl cursor-pointer text-gray-700 hover:text-black">&times;</label>
                        <img src="{{asset('/images/web/home/dashboard.png')}}" class="rounded-xl w-full h-auto max-h-[80vh] object-contain" />
                    </div>
                </div>
                </div>


                <!-- ========== CARD 2 ========== -->
                <div class="relative peer">
                <div class="flip-card h-[400px] relative">
                    <div class="flip-inner">
                        <!-- Front -->
                        <div class="flip-front bg-orange-500 p-4 border border-gray-400 flex flex-col">
                            <div class="font-bold text-2xl my-2">Simple & Smart Data Entry</div>
                            <div class="my-5">Effortlessly add customer and product details with our easy-to-use form layout.</div>
                            <div class="mt-auto h-60 flex items-center justify-center">
                                <img src="{{asset('/images/web/home/detailEntryForm.png')}}" class="w-full object-contain rounded-1xl" />
                            </div>
                        </div>

                        <!-- Back -->
                        <div class="flip-back bg-white p-4 border border-gray-400 flex items-center justify-center">
                            <label for="popup2" class="cursor-pointer text-xl font-semibold underline text-orange-600">
                                View Image →
                            </label>
                        </div>
                    </div>
                </div>
                <input type="checkbox" id="popup2" class="peer hidden" />
                <div class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 peer-checked:opacity-100 peer-checked:pointer-events-auto">
                    <div class="bg-white p-6 rounded-2xl relative w-[90%] max-w-2xl">
                        <label for="popup2" class="absolute top-2 right-4 text-3xl cursor-pointer text-gray-700 hover:text-black">&times;</label>
                        <img src="{{asset('/images/web/home/detailEntryForm.png')}}" class="rounded-xl w-full h-auto max-h-[80vh] object-contain" />
                    </div>
                </div>
                </div>
                <!-- ========== CARD 3 ========== -->
                <div class="relative peer">
                <div class="flip-card h-[400px] relative">
                    <div class="flip-inner">
                        <!-- Front -->
                        <div class="flip-front bg-orange-500 p-4 border border-gray-400 flex flex-col">
                            <div class="font-bold text-2xl my-2">Professional GST Billing</div>
                            <div class="my-5">Generate clean, GST-compliant invoices in seconds ready to print or share instantly.</div>
                            <div class="mt-auto h-60 flex items-center justify-center">
                                <img src="{{asset('/images/web/home/report.png')}}" class="w-full h-40 object-contain rounded-1xl" />
                            </div>
                        </div>

                        <!-- Back -->
                        <div class="flip-back bg-white p-4 border border-gray-400 flex items-center justify-center">
                            <label for="popup3" class="cursor-pointer text-xl font-semibold underline text-orange-600">
                                View Image →
                            </label>
                        </div>
                    </div>
                </div>
                <input type="checkbox" id="popup3" class="peer hidden" />
                <div class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 peer-checked:opacity-100 peer-checked:pointer-events-auto">
                    <div class="bg-white p-6 rounded-2xl relative w-[90%] max-w-2xl">
                        <label for="popup3" class="absolute top-2 right-4 text-3xl cursor-pointer text-gray-700 hover:text-black">&times;</label>
                        <img src="{{asset('/images/web/home/report.png')}}" class="rounded-xl w-full h-auto max-h-[80vh] object-contain" />
                    </div>
                </div>
                </div>
            </div>
        </div>


        <x-Ui::web.project.price :plan_features="$plans"/>
        <x-Ui::web.common.footer-address />
        <x-Ui::web.common.copyright/>
    </div>

</div>
