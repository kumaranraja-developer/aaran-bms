<div>
    <x-Ui::menu.web.top-banner
        description="Apps"
        slogan="All the software you need to run your business."
    />

    <div class="bg-white dark:bg-dark  scrollbar-hide">

        <div class=" text-black dark:text-white grid grid-cols-1 md:grid-cols-2 my-10  p-2">
            <div class="text-6xl font-bold  break-after-auto">
                SOFTWARE TO UNLOCK BUSINESS GROWTH
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3  gap-3 mt-20 md:mt-0">
                <div class="p-4 border border-gray-400 rounded-3xl flex flex-col">
                    <div class="font-bold text-2xl my-2">GST Compliance</div>
                    <div class="my-5">qwe uaf audfgcu sdufug udf sdafu  AUFU AFG</div>
                    <img src="{{asset('/images/web/home/img1.jpg')}}" class="w-full  object-contain rounded-3xl mt-auto"/>
                </div>
                <div class="p-4 border border-gray-400 rounded-3xl  flex flex-col">
                    <div class="font-bold text-2xl my-2">Customization</div>
                    <div class="my-5">qwe uaf audfgcu sdzbfuisd sdfusbdf udfiuahsdf uasfdbad  sdufug udf sdafu  AUFU AFG</div>
                    <img src="{{asset('/images/web/home/img1.jpg')}}" class="w-full  object-contain rounded-3xl mt-auto"/>
                </div>
                <div class="p-4 border border-gray-400 rounded-3xl  flex flex-col">
                    <div class="font-bold text-2xl my-2">Collaboration</div>
                    <div class="my-5">qwe uaf audfgcu sdufug udf sdafu  AUFU AFG</div>
                    <img src="{{asset('/images/web/home/img1.jpg')}}" class="w-full  object-contain rounded-3xl mt-auto"/>
                </div>
            </div>
        </div>
        <x-Ui::web.project.price :plan_features="$plans"/>
        <x-Ui::web.common.footer-address />
        <x-Ui::web.common.copyright/>
    </div>

</div>
