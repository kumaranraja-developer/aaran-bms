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
                        <div class="text-dark-7 cursor-pointer block my-auto">{{$post->vname}}</div>
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
                        <div class="text-sm text-dark-7 block my-auto">{{$post->created_at->format('d-m-Y')}}</div>
                    </div>
                </div>
                <!-- Include Alpine.js if not already -->

                <div class="md:flex gap-5 hidden">

                    <div class="text-dark-7">Tag : {{ $blog_tag_name }}</div>
                    <div class="text-dark-7">Category : {{ $blog_category_name }}</div>

                </div>

            </div>

            <div class="relative w-full group mt-10">
                <!-- Image -->
                <img
                    class="w-full h-[80vh] object-cover shadow-inner group-hover:brightness-80"
                    src="{{asset('images/home/wall1.webp')}}"
                />

            </div>

            <div class="mt-10">
                <div class="text-sm">
                    {{$post->body}}
                </div>

            </div>
            <hr class="border-gray-300 my-10"/>
            <div class="text-lg">Leave a Reply</div>
            <div class="mt-3 mb-1 text-xs">Comment *</div>
            <textarea class="h-[200px] p-2 w-full border-1 border-gray-300 rounded-sm"
                      placeholder="Text here..."></textarea>
            <button class="bg-primary py-2 mt-2 px-4 rounded-lg text-sm text-white">Post Comment</button>

            <hr class="border-gray-300 my-10"/>

            {{--            Related Blog --}}

            <div class="text-lg">Related Posts</div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 w-[100%] gap-5 gap-y-10 mt-10 mx-auto mb-20">
                @foreach ($firstPost as $data)
                    <a href="{{ route('posts.show', ['id' => $data->id]) }}"
                       class="bg-white p-2 border border-gray rounded-lg hover:-translate-y-2">
                        <div class="border border-gray-200  bg-gray-100 rounded-lg  overflow-hidden">
                            <div class="relative w-full group">
                                <!-- Image -->
                                {{--                        <img--}}
                                {{--                            class="h-[200px] w-full object-cover"--}}
                                {{--                            src="{{asset('images/home/wall1.webp')}}"--}}
                                {{--                        />--}}
                                <div class="w-full h-full overflow-hidden">
                                    @if($data->image)
                                        <img
                                            src="{{ Storage::url('images/' . $data->image) }}"
                                            alt="Task Image"
                                            class="h-[200px] w-full object-cover"
                                        />
                                    @else
                                        <img
                                            src="https://grcviewpoint.com/wp-content/uploads/2022/11/Time-to-Correct-A-Long-standing-Curriculum-Coding-Error-Say-Experts-GRCviewpoint.jpg"
                                            class="h-[200px] w-full object-cover"
                                            alt="Default image"
                                        />
                                    @endif
                                </div>

                            </div>

                            <div class="mx-3">
                                <div class="flex justify-between  mt-3">
                                    <div class="flex gap-1">
                                        <div class="w-4 flex items-center">
                                            <svg class="text-dark-7 " fill="currentColor" viewBox="-32 0 512 512"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                   stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm95.8 32.6L272 480l-32-136 32-56h-96l32 56-32 136-47.8-191.4C56.9 292 0 350.3 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-72.1-56.9-130.4-128.2-133.8z"></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="text-dark-7 cursor-pointer">{{$data->vname}}</div>
                                    </div>
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
                                        <div class="text-sm text-dark-7">   {{ $data->created_at->format('d-m-Y') }}</div>
                                    </div>
                                </div>

                                <div class="font-bold text-xl my-2 cursor-pointer text-dark-4">{{$data->vname}}</div>
                                <div class="line-clamp-3 text-sm leading-relaxed text-dark-7 h-18">{{$data->body}}</div>
                                <div class="flex justify-between mt-4 pb-2">
                                    <div class="flex gap-1">
                                        <div class="w-4 flex items-center b cursor-pointer">
                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                 stroke="#190aeb">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"
                                                   stroke="#CCCCCC" stroke-width="0.144"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M12 6.00019C10.2006 3.90317 7.19377 3.2551 4.93923 5.17534C2.68468 7.09558 2.36727 10.3061 4.13778 12.5772C5.60984 14.4654 10.0648 18.4479 11.5249 19.7369C11.6882 19.8811 11.7699 19.9532 11.8652 19.9815C11.9483 20.0062 12.0393 20.0062 12.1225 19.9815C12.2178 19.9532 12.2994 19.8811 12.4628 19.7369C13.9229 18.4479 18.3778 14.4654 19.8499 12.5772C21.6204 10.3061 21.3417 7.07538 19.0484 5.17534C16.7551 3.2753 13.7994 3.90317 12 6.00019Z"
                                                          class="stroke-pink-600" stroke-width="2" stroke-linecap="round"
                                                          stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="text-sm text-dark-7">1000</div>
                                    </div>
                                    <div class="flex">
                                        <div class=" border border-l-black mr-2 dark:border-l-gray-50"></div>
                                        <div class="flex gap-1 mr-3">
                                            <div class="w-5 flex items-center">
                                                <svg class="cursor-pointer stroke-blue-500" viewBox="0 -0.5 25 25" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path
                                                            fill-rule="evenodd"
                                                            clip-rule="evenodd"
                                                            d="M9.1631 5H15.8381C17.8757 5.01541 19.5151 6.67943 19.5001 8.717V13.23C19.5073 14.2087 19.1254 15.1501 18.4384 15.8472C17.7515 16.5442 16.8158 16.9399 15.8371 16.947H9.1631L5.5001 19V8.717C5.49291 7.73834 5.8748 6.79692 6.56175 6.09984C7.24871 5.40276 8.18444 5.00713 9.1631 5Z"
                                                            class="stroke-blue-500"
                                                            stroke-width="1.5"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                        ></path>
                                                        <path
                                                            fill-rule="evenodd"
                                                            clip-rule="evenodd"
                                                            d="M7.50009 11C7.50009 10.4477 7.94781 10 8.50009 10C9.05238 10 9.50009 10.4477 9.50009 11C9.50009 11.5523 9.05238 12 8.50009 12C8.23488 12 7.98052 11.8946 7.79298 11.7071C7.60545 11.5196 7.50009 11.2652 7.50009 11Z"
                                                            class="stroke-blue-500"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                        ></path>
                                                        <path
                                                            fill-rule="evenodd"
                                                            clip-rule="evenodd"
                                                            d="M11.5001 11C11.5001 10.4477 11.9478 10 12.5001 10C13.0524 10 13.5001 10.4477 13.5001 11C13.5001 11.5523 13.0524 12 12.5001 12C11.9478 12 11.5001 11.5523 11.5001 11Z"
                                                            class="stroke-blue-500"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                        ></path>
                                                        <path
                                                            fill-rule="evenodd"
                                                            clip-rule="evenodd"
                                                            d="M15.5001 11C15.5001 10.4477 15.9478 10 16.5001 10C17.0524 10 17.5001 10.4477 17.5001 11C17.5001 11.5523 17.0524 12 16.5001 12C15.9478 12 15.5001 11.5523 15.5001 11Z"
                                                            class="stroke-blue-500"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                        ></path>
                                                    </g>
                                                </svg>
                                            </div>

                                            <div class="text-sm text-dark-7">100</div>
                                        </div>
                                        <div class="flex gap-1">
                                            <div class="w-4 flex items-center cursor-pointer">
                                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                       stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path
                                                            d="M9 3V5M12 3V5M15 3V5M13 9H9M15 13H9M8.2 21H15.8C16.9201 21 17.4802 21 17.908 20.782C18.2843 20.5903 18.5903 20.2843 18.782 19.908C19 19.4802 19 18.9201 19 17.8V7.2C19 6.0799 19 5.51984 18.782 5.09202C18.5903 4.71569 18.2843 4.40973 17.908 4.21799C17.4802 4 16.9201 4 15.8 4H8.2C7.0799 4 6.51984 4 6.09202 4.21799C5.71569 4.40973 5.40973 4.71569 5.21799 5.09202C5 5.51984 5 6.07989 5 7.2V17.8C5 18.9201 5 19.4802 5.21799 19.908C5.40973 20.2843 5.71569 20.5903 6.09202 20.782C6.51984 21 7.07989 21 8.2 21Z"
                                                            class="stroke-blue-500" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="text-sm text-blue-500">Read more</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </a>
                @endforeach

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

            <div class="mb-2">Tags</div>
            <div class="flex gap-2.5 flex-wrap">
                @if ($tags)
                    @foreach ($tags as $tag)
                        <span class="text-gray-500 capitalize">
                                <button wire:click="getFilter({{ $tag->id }})" class="hover:text-blue-600 cursor-pointer">
                                   #{{ $tag->vname }}
                                </button>

                            </span>
                    @endforeach
                @endif
            </div>

            <hr class="border-gray-300 my-4"/>

            <div>Categories</div>

            <div class=" flex flex-wrap gap-2.5 mt-2">
                @foreach ($BlogCategories as $blogcategory)
                    <span class="text-gray-400">
                            <button wire:click="getCategory_id({{ $blogcategory->id }})" class="px-4 py-2 border border-gray-800 cursor-pointer hover:bg-dark-4">
                                {{ $blogcategory->vname }}
                            </button></span>
                @endforeach

            </div>


            <hr class="border-gray-300 my-4"/>

            <div class="flex gap-3 my-3">
                <div>Share</div>
                <div class="w-4 hover:w-6 block my-auto">
                    <a href="https://www.facebook.com/" target="_blank">
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
                    </a>
                </div>
                <div class="w-4 hover:w-6 block my-auto">
                    <a href="https://x.com/"  target="_blank">

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
                </a>
                </div>

                <div class="w-4 hover:w-6 block my-auto">
                    <a href="https://in.linkedin.com/"  target="_blank">
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
                    </a>
                </div>
                <div class="w-4 hover:w-6 block my-auto">
                    <a href="https://www.pinterest.com/" target="_blank">
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
                    </a>
                </div>
            </div>
            <hr class="border-gray-300 my-4"/>
        </div>
    </div>
    <x-Ui::web.common.footer-address/>
    <x-Ui::web.common.copyright/>
</div>
