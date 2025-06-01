<div>
    <x-slot name="header">Blog</x-slot>
    <x-Ui::menu.web.top-banner
        description="Blog"
        slogan="Everything that's going on at Enfold is collected here"
    />
    <div class="grid lg:grid-cols-[80%_20%] mb-10">
        <div class="w-[80%] block m-auto mt-5">

            <div class="flex gap-1">
                <div class="w-7">
                    <svg viewBox="0 0 1024.00 1024.00" fill="#000000" class="icon dark:stroke-dark-7" version="1.1"
                         xmlns="http://www.w3.org/2000/svg" stroke="#000000" stroke-width="43.007999999999996">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M669.6 849.6c8.8 8 22.4 7.2 30.4-1.6s7.2-22.4-1.6-30.4l-309.6-280c-8-7.2-8-17.6 0-24.8l309.6-270.4c8.8-8 9.6-21.6 2.4-30.4-8-8.8-21.6-9.6-30.4-2.4L360.8 480.8c-27.2 24-28 64-0.8 88.8l309.6 280z"
                                fill=""></path>
                        </g>
                    </svg>
                </div>
                <div class="dark:text-dark-7 block my-auto">back</div>
            </div>
            <div class="flex justify-between  mt-5">
                <div class="flex gap-5">
                    <div class="flex gap-2">
                        <div class="text-dark-7 flex items-center">Published by</div>
                        <div class="w-4 flex items-center">
                            <svg class="text-dark-7 " fill="currentColor" viewBox="-32 0 512 512"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm95.8 32.6L272 480l-32-136 32-56h-96l32 56-32 136-47.8-191.4C56.9 292 0 350.3 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-72.1-56.9-130.4-128.2-133.8z"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="text-dark-7 cursor-pointer block my-auto">username</div>
                    </div>
                    <div class="flex gap-1">
                        <div class="w-4 flex items-center">
                            <svg class="text-dark-7 stroke-dark-7" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M12 7V12L14.5 13.5M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                                        class="text-dark-7 stroke-dark-7" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="text-sm text-dark-7 block my-auto">date</div>
                    </div>
                </div>
                <!-- Include Alpine.js if not already -->

                <div class="md:flex gap-5 hidden">

                    <div class="text-dark-7">Tag :</div>
                    <div class="text-dark-7">Category :</div>
                </div>

            </div>

            <div class="relative w-full group mt-10">
                <!-- Image -->
                <img
                    class="w-full h-[80vh] object-cover shadow-inner transition duration-300 group-hover:brightness-80 group-hover:-translate-y-[10px]"
                    src="{{asset('images/home/wall1.webp')}}"
                />

                <!-- Hover Overlay with Icons -->
                <div
                    class="absolute bottom-0 left-0 right-0 grid grid-cols-1 bg-white opacity-0 translate-y-0 transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
                    <!-- Search Icon -->
                    <div class="flex justify-center items-center py-2">
                        <a href="#" class="text-gray-600 hover:text-black">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-10">
                <div class="text-sm">
                    Praesent nec magna ac pede. Mauris tooltip mauris. Nam quis erat id tortor. Phasellus at nibh nulla
                    nulla, egestas quam eu tortor orci, id eros. Mauris neque. Pellentesque dolor. Mauris in est.
                    Vivamus lacus sed justo. Aenean ac dignissim nibh. Suspendisse sapien.
                    Lorem ipsum dolor sit amet augue. Sed eu sem urna elit, non odio. Aenean lacus tellus quis ante.
                    Fusce enim. Aliquam ultricies porta. Aenean ac eros sed arcu. Mauris nunc posuere cubilia Curae,
                    Nullam et ipsum. Aliquam quis elit. Pellentesque habitant morbi tristique commodo. Suspendisse vitae
                    lectus varius quis, tellus.Donec ullamcorper in, dapibus quam hendrerit eget, bibendum a, bibendum
                    tempus. Pellentesque ac ipsum.
                </div>
                <div class="font-bold text-2xl my-4">Heading</div>
                <div class="text-sm">
                    Praesent nec magna ac pede. Mauris tooltip mauris. Nam quis erat id tortor. Phasellus at nibh nulla
                    nulla, egestas quam eu tortor orci, id eros. Mauris neque. Pellentesque dolor. Mauris in est.
                    Vivamus lacus sed justo. Aenean ac dignissim nibh. Suspendisse sapien.
                    Lorem ipsum dolor sit amet augue. Sed eu sem urna elit, non odio. Aenean lacus tellus quis ante.
                    Fusce enim. Aliquam ultricies porta. Aenean ac eros sed arcu. Mauris nunc posuere cubilia Curae,
                    Nullam et ipsum. Aliquam quis elit. Pellentesque habitant morbi tristique commodo. Suspendisse vitae
                    lectus varius quis, tellus.Donec ullamcorper in, dapibus quam hendrerit eget, bibendum a, bibendum
                    tempus. Pellentesque ac ipsum.
                </div>
            </div>

            <div class="text-lg">Leave a Reply</div>
            <div class="mt-3 mb-1 text-xs ">Name *</div>
            <input type="text" placeholder="Name" class="p-2 w-full border-1 border-gray-300 rounded-sm"/>
            <div class="mt-3 mb-1 text-xs">Comment *</div>
            <textarea class="h-[150px] p-2 w-full border-1 border-gray-300 rounded-sm"
                      placeholder="Text here..."></textarea>
            <button class="bg-primary py-2 mt-2 px-4 rounded-lg text-sm text-white">Post Comment</button>

            <hr class="border-gray-300 my-10"/>

            {{--            Related Blog --}}

            <div class="text-lg">Related Posts</div>
            <div class="flex flex-row w-[100%] gap-5 gap-y-10 mt-10 mx-auto mb-20">
                <div>
                    <div class="bg-white p-2 border border-gray rounded-lg">
                        <div class="border border-gray-300  bg-gray-100 rounded-lg">
                            <div class="relative w-full group">
                                <!-- Image -->
                                <img
                                    class="h-[200px] w-full object-cover group-hover:brightness-80 p-2"
                                    src="{{asset('images/home/wall1.webp')}}"
                                />

                                <!-- Hover Overlay with Icons -->
                                <div
                                    class="absolute bottom-0 left-0 right-0 grid grid-cols-2 bg-gray-100 opacity-0 translate-y-0 transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
                                    <!-- Search Icon -->
                                    <div class="flex justify-center items-center py-2">
                                        <a href="#" class="text-gray-600 hover:text-black">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                                 viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"/>
                                            </svg>
                                        </a>
                                    </div>

                                    <!-- Link Icon -->
                                    <div class="flex justify-center items-center py-2">
                                        <a href="#" class="text-gray-600 hover:text-black">
                                            <svg class="w-5 h-5" viewBox="0 0 16 16" fill="currentColor"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.05025 1.53553C8.03344 0.552348 9.36692 0 10.7574 0C13.6528 0 16 2.34721 16 5.24264C16 6.63308 15.4477 7.96656 14.4645 8.94975L12.4142 11L11 9.58579L13.0503 7.53553C13.6584 6.92742 14 6.10264 14 5.24264C14 3.45178 12.5482 2 10.7574 2C9.89736 2 9.07258 2.34163 8.46447 2.94975L6.41421 5L5 3.58579L7.05025 1.53553Z"/>
                                                <path
                                                    d="M7.53553 13.0503L9.58579 11L11 12.4142L8.94975 14.4645C7.96656 15.4477 6.63308 16 5.24264 16C2.34721 16 0 13.6528 0 10.7574C0 9.36693 0.552347 8.03344 1.53553 7.05025L3.58579 5L5 6.41421L2.94975 8.46447C2.34163 9.07258 2 9.89736 2 10.7574C2 12.5482 3.45178 14 5.24264 14C6.10264 14 6.92742 13.6584 7.53553 13.0503Z"/>
                                                <path
                                                    d="M5.70711 11.7071L11.7071 5.70711L10.2929 4.29289L4.29289 10.2929L5.70711 11.7071Z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="mx-3 flex flex-row overflow-x-auto pb-2">
                                <div>
                                    <div class="flex justify-between  mt-3">

                                        <div class="flex gap-1">
                                            <div class="w-4 flex items-center">
                                                <svg class="text-dark-7 stroke-dark-7" viewBox="0 0 24 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                       stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path
                                                            d="M12 7V12L14.5 13.5M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                                                            class="text-dark-7 stroke-dark-7" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="text-sm text-dark-7">date</div>
                                        </div>
                                    </div>

                                    <div class="font-bold text-xl my-2 cursor-pointer text-dark-3">Post Name</div>
                                    <button class="bg-gray-300 border-gray-500 px-4 py-2 text-dark-1">Read More</button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div>
                    <div class="bg-white p-2 border border-gray rounded-lg">
                        <div class="border border-gray-300  bg-gray-100 rounded-lg">
                            <div class="relative w-full group">
                                <!-- Image -->
                                <img
                                    class="h-[200px] w-full object-cover group-hover:brightness-80 p-2"
                                    src="{{asset('images/home/wall1.webp')}}"
                                />

                                <!-- Hover Overlay with Icons -->
                                <div
                                    class="absolute bottom-0 left-0 right-0 grid grid-cols-2 bg-gray-100 opacity-0 translate-y-0 transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
                                    <!-- Search Icon -->
                                    <div class="flex justify-center items-center py-2">
                                        <a href="#" class="text-gray-600 hover:text-black">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                                 viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"/>
                                            </svg>
                                        </a>
                                    </div>

                                    <!-- Link Icon -->
                                    <div class="flex justify-center items-center py-2">
                                        <a href="#" class="text-gray-600 hover:text-black">
                                            <svg class="w-5 h-5" viewBox="0 0 16 16" fill="currentColor"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.05025 1.53553C8.03344 0.552348 9.36692 0 10.7574 0C13.6528 0 16 2.34721 16 5.24264C16 6.63308 15.4477 7.96656 14.4645 8.94975L12.4142 11L11 9.58579L13.0503 7.53553C13.6584 6.92742 14 6.10264 14 5.24264C14 3.45178 12.5482 2 10.7574 2C9.89736 2 9.07258 2.34163 8.46447 2.94975L6.41421 5L5 3.58579L7.05025 1.53553Z"/>
                                                <path
                                                    d="M7.53553 13.0503L9.58579 11L11 12.4142L8.94975 14.4645C7.96656 15.4477 6.63308 16 5.24264 16C2.34721 16 0 13.6528 0 10.7574C0 9.36693 0.552347 8.03344 1.53553 7.05025L3.58579 5L5 6.41421L2.94975 8.46447C2.34163 9.07258 2 9.89736 2 10.7574C2 12.5482 3.45178 14 5.24264 14C6.10264 14 6.92742 13.6584 7.53553 13.0503Z"/>
                                                <path
                                                    d="M5.70711 11.7071L11.7071 5.70711L10.2929 4.29289L4.29289 10.2929L5.70711 11.7071Z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="mx-3 flex flex-row overflow-x-auto pb-2">
                                <div>
                                    <div class="flex justify-between  mt-3">

                                        <div class="flex gap-1">
                                            <div class="w-4 flex items-center">
                                                <svg class="text-dark-7 stroke-dark-7" viewBox="0 0 24 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                       stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path
                                                            d="M12 7V12L14.5 13.5M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                                                            class="text-dark-7 stroke-dark-7" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="text-sm text-dark-7">date</div>
                                        </div>
                                    </div>

                                    <div class="font-bold text-xl my-2 cursor-pointer text-dark-3">Post Name</div>
                                    <button class="bg-gray-300 border-gray-500 px-4 py-2 text-dark-1">Read More</button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div>
                    <div class="bg-white p-2 border border-gray rounded-lg">
                        <div class="border border-gray-300  bg-gray-100 rounded-lg">
                            <div class="relative w-full group">
                                <!-- Image -->
                                <img
                                    class="h-[200px] w-full object-cover group-hover:brightness-80 p-2"
                                    src="{{asset('images/home/wall1.webp')}}"
                                />

                                <!-- Hover Overlay with Icons -->
                                <div
                                    class="absolute bottom-0 left-0 right-0 grid grid-cols-2 bg-gray-100 opacity-0 translate-y-0 transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
                                    <!-- Search Icon -->
                                    <div class="flex justify-center items-center py-2">
                                        <a href="#" class="text-gray-600 hover:text-black">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                                 viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"/>
                                            </svg>
                                        </a>
                                    </div>

                                    <!-- Link Icon -->
                                    <div class="flex justify-center items-center py-2">
                                        <a href="#" class="text-gray-600 hover:text-black">
                                            <svg class="w-5 h-5" viewBox="0 0 16 16" fill="currentColor"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.05025 1.53553C8.03344 0.552348 9.36692 0 10.7574 0C13.6528 0 16 2.34721 16 5.24264C16 6.63308 15.4477 7.96656 14.4645 8.94975L12.4142 11L11 9.58579L13.0503 7.53553C13.6584 6.92742 14 6.10264 14 5.24264C14 3.45178 12.5482 2 10.7574 2C9.89736 2 9.07258 2.34163 8.46447 2.94975L6.41421 5L5 3.58579L7.05025 1.53553Z"/>
                                                <path
                                                    d="M7.53553 13.0503L9.58579 11L11 12.4142L8.94975 14.4645C7.96656 15.4477 6.63308 16 5.24264 16C2.34721 16 0 13.6528 0 10.7574C0 9.36693 0.552347 8.03344 1.53553 7.05025L3.58579 5L5 6.41421L2.94975 8.46447C2.34163 9.07258 2 9.89736 2 10.7574C2 12.5482 3.45178 14 5.24264 14C6.10264 14 6.92742 13.6584 7.53553 13.0503Z"/>
                                                <path
                                                    d="M5.70711 11.7071L11.7071 5.70711L10.2929 4.29289L4.29289 10.2929L5.70711 11.7071Z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="mx-3 flex flex-row overflow-x-auto pb-2">
                                <div>
                                    <div class="flex justify-between  mt-3">

                                        <div class="flex gap-1">
                                            <div class="w-4 flex items-center">
                                                <svg class="text-dark-7 stroke-dark-7" viewBox="0 0 24 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                       stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path
                                                            d="M12 7V12L14.5 13.5M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                                                            class="text-dark-7 stroke-dark-7" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="text-sm text-dark-7">date</div>
                                        </div>
                                    </div>

                                    <div class="font-bold text-xl my-2 cursor-pointer text-dark-3">Post Name</div>
                                    <button class="bg-gray-300 border-gray-500 px-4 py-2 text-dark-1">Read More</button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{--    Recent Right view    --}}
        <div class="hidden lg:block mt-10 pr-5">
            <div class="flex gap-3 pr-4">
                <x-Ui::icons.search-new/>
            </div>

            <div class="mt-5 mb-1">Recent</div>
            <div class="flex flex-col gap-3 pr-4">
                <div class="flex flex-row gap-x-2 mt-4">
                    <div class="w-16 ">
                        <img src='/../../../images/blog/modern.jpg' alt=""
                             class="w-full md:h-12 h-12 border border-gray-200 p-0.5">
                    </div>

                    <div class="flex flex-col gap-y-1">
                        <span class="line-clamp-1">Modern Single Entry sfdggeer etetyt ertertert ertertert</span>
                        <span class="text-gray-400 line-clamp-1">
                                JUl.14,2024 - 3.16pm.
                            </span>
                    </div>
                </div>

                <div class="flex flex-row gap-x-2 mt-4">
                    <div class="w-16 ">
                        <img src='/../../../images/blog/modern.jpg' alt=""
                             class="w-full md:h-12 h-12 border border-gray-200 p-0.5">
                    </div>

                    <div class="flex flex-col gap-y-1">
                        <span class="line-clamp-1">Modern Single Entry sfdggeer etetyt ertertert ertertert</span>
                        <span class="text-gray-400 line-clamp-1">
                                JUl.14,2024 - 3.16pm.
                            </span>
                    </div>
                </div>
            </div>


            <hr class="border-gray-300 my-4"/>

            <div>Tags</div>
            <div class="mt-2">
                <div>#blog</div>
            </div>

            <hr class="border-gray-300 my-4"/>

            <div>Categories</div>

            <div class="mt-2">
                <div>tech</div>
            </div>

            <hr class="border-gray-300 my-4"/>

            <div class="flex gap-3 my-3">
                <div>Share</div>
                <div class="w-4 block my-auto">
                    <svg class="text-dark-7 stroke-dark-7" fill="currentColor" viewBox="-5 0 20 20" version="1.1"
                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier"><title>facebook [#176]</title>
                            <desc>Created with Sketch.</desc>
                            <defs></defs>
                            <g id="Page-1" class="stroke-dark-7" stroke-width="1" fill-rule="evenodd">
                                <g id="Dribbble-Light-Preview" transform="translate(-385.000000, -7399.000000)"
                                   class="text-dark-7 stroke-dark-7">
                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                        <path
                                            d="M335.821282,7259 L335.821282,7250 L338.553693,7250 L339,7246 L335.821282,7246 L335.821282,7244.052 C335.821282,7243.022 335.847593,7242 337.286884,7242 L338.744689,7242 L338.744689,7239.14 C338.744689,7239.097 337.492497,7239 336.225687,7239 C333.580004,7239 331.923407,7240.657 331.923407,7243.7 L331.923407,7246 L329,7246 L329,7250 L331.923407,7250 L331.923407,7259 L335.821282,7259 Z"
                                            id="facebook-[#176]" class="stroke-dark-7"></path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="w-4 block my-auto">
                    <svg class="text-dark-7 stroke-dark-7" viewBox="0 0 24 24" fill="currentColor"
                         xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M19.7828 3.91825C20.1313 3.83565 20.3743 3.75444 20.5734 3.66915C20.8524 3.54961 21.0837 3.40641 21.4492 3.16524C21.7563 2.96255 22.1499 2.9449 22.4739 3.11928C22.7979 3.29366 23 3.6319 23 3.99986C23 5.08079 22.8653 5.96673 22.5535 6.7464C22.2911 7.40221 21.9225 7.93487 21.4816 8.41968C21.2954 11.7828 20.3219 14.4239 18.8336 16.4248C17.291 18.4987 15.2386 19.8268 13.0751 20.5706C10.9179 21.3121 8.63863 21.4778 6.5967 21.2267C4.56816 20.9773 2.69304 20.3057 1.38605 19.2892C1.02813 19.0108 0.902313 18.5264 1.07951 18.109C1.25671 17.6916 1.69256 17.4457 2.14144 17.5099C3.42741 17.6936 4.6653 17.4012 5.6832 16.9832C5.48282 16.8742 5.29389 16.7562 5.11828 16.6346C4.19075 15.9925 3.4424 15.1208 3.10557 14.4471C2.96618 14.1684 2.96474 13.8405 3.10168 13.5606C3.17232 13.4161 3.27562 13.293 3.40104 13.1991C2.04677 12.0814 1.49999 10.5355 1.49999 9.49986C1.49999 9.19192 1.64187 8.90115 1.88459 8.71165C1.98665 8.63197 2.10175 8.57392 2.22308 8.53896C2.12174 8.24222 2.0431 7.94241 1.98316 7.65216C1.71739 6.3653 1.74098 4.91284 2.02985 3.75733C2.1287 3.36191 2.45764 3.06606 2.86129 3.00952C3.26493 2.95299 3.6625 3.14709 3.86618 3.50014C4.94369 5.36782 6.93116 6.50943 8.78086 7.18568C9.6505 7.50362 10.4559 7.70622 11.0596 7.83078C11.1899 6.61019 11.5307 5.6036 12.0538 4.80411C12.7439 3.74932 13.7064 3.12525 14.74 2.84698C16.5227 2.36708 18.5008 2.91382 19.7828 3.91825ZM10.7484 9.80845C10.0633 9.67087 9.12171 9.43976 8.09412 9.06408C6.7369 8.56789 5.16088 7.79418 3.84072 6.59571C3.86435 6.81625 3.89789 7.03492 3.94183 7.24766C4.16308 8.31899 4.5742 8.91899 4.94721 9.10549C5.40342 9.3336 5.61484 9.8685 5.43787 10.3469C5.19827 10.9946 4.56809 11.0477 3.99551 10.9046C4.45603 11.595 5.28377 12.2834 6.66439 12.5135C7.14057 12.5929 7.49208 13.0011 7.49986 13.4838C7.50765 13.9665 7.16949 14.3858 6.69611 14.4805L5.82565 14.6546C5.95881 14.7703 6.103 14.8838 6.2567 14.9902C6.95362 15.4727 7.65336 15.6808 8.25746 15.5298C8.70991 15.4167 9.18047 15.6313 9.39163 16.0472C9.60278 16.463 9.49846 16.9696 9.14018 17.2681C8.49626 17.8041 7.74425 18.2342 6.99057 18.5911C6.63675 18.7587 6.24134 18.9241 5.8119 19.0697C6.14218 19.1402 6.48586 19.198 6.84078 19.2417C8.61136 19.4594 10.5821 19.3126 12.4249 18.6792C14.2614 18.0479 15.9589 16.9385 17.2289 15.2312C18.497 13.5262 19.382 11.1667 19.5007 7.96291C19.51 7.71067 19.6144 7.47129 19.7929 7.29281C20.2425 6.84316 20.6141 6.32777 20.7969 5.7143C20.477 5.81403 20.1168 5.90035 19.6878 5.98237C19.3623 6.04459 19.0272 5.94156 18.7929 5.70727C18.0284 4.94274 16.5164 4.43998 15.2599 4.77822C14.6686 4.93741 14.1311 5.28203 13.7274 5.89906C13.3153 6.52904 13 7.51045 13 8.9999C13 9.28288 12.8801 9.5526 12.6701 9.74221C12.1721 10.1917 11.334 9.92603 10.7484 9.80845Z"
                                  class="text-dark-7 stroke-dark-7"></path>
                        </g>
                    </svg>
                </div>
                <div class="w-4 block my-auto">
                    <svg class="text-dark-7 stroke-dark-7" fill="currentColor" viewBox="0 0 20 20" version="1.1"
                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier"><title>linkedin [#161]</title>
                            <desc>Created with Sketch.</desc>
                            <defs></defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill-rule="evenodd">
                                <g id="Dribbble-Light-Preview" transform="translate(-180.000000, -7479.000000)"
                                   class="text-dark-7 stroke-dark-7">
                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                        <path
                                            d="M144,7339 L140,7339 L140,7332.001 C140,7330.081 139.153,7329.01 137.634,7329.01 C135.981,7329.01 135,7330.126 135,7332.001 L135,7339 L131,7339 L131,7326 L135,7326 L135,7327.462 C135,7327.462 136.255,7325.26 139.083,7325.26 C141.912,7325.26 144,7326.986 144,7330.558 L144,7339 L144,7339 Z M126.442,7323.921 C125.093,7323.921 124,7322.819 124,7321.46 C124,7320.102 125.093,7319 126.442,7319 C127.79,7319 128.883,7320.102 128.883,7321.46 C128.884,7322.819 127.79,7323.921 126.442,7323.921 L126.442,7323.921 Z M124,7339 L129,7339 L129,7326 L124,7326 L124,7339 Z"
                                            id="linkedin-[#161]"></path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="w-4 block my-auto">
                    <svg class="text-dark-7 stroke-dark-7" fill="currentColor" viewBox="0 0 1920 1920"
                         xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M796.863 1332.48C745.587 1596.875 679.29 1787.52 494.067 1920c-57.26-399.473 84.029-699.445 149.534-1018.165-111.811-185.11 13.44-557.816 249.036-466.108 289.92 113.054-230.174 661.384 133.044 733.327 379.257 74.993 515.012-572.16 279.982-807.303-339.727-339.502-1016.584-51.615-911.21 429.74 42.466 194.034-101.986 249.262-101.986 249.262C175.46 993.318 164.28 829.1 170.265 668.838 183.705 300.31 506.49 42.24 830.293 6.438c409.525-45.177 793.864 148.066 846.833 527.548 59.859 428.16-176.979 920.019-614.965 886.588-118.588-9.035-265.298-88.094-265.298-88.094"
                                fill-rule="evenodd" class="text-dark-7 stroke-dark-7"></path>
                        </g>
                    </svg>
                </div>
            </div>
            <hr class="border-gray-300 my-4"/>
        </div>
    </div>
    <x-Ui::web.common.footer-address/>
    <x-Ui::web.common.copyright/>
</div>
