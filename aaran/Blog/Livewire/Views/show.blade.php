<div>
    <x-slot name="header">Blog</x-slot>

    <x-Ui::alerts.notification/>

    <!-- Delete Modal --------------------------------------------------------------------------------------------->
    <x-Ui::modal.confirm-delete/>

    <x-Ui::menu.web.top-banner
        description="Blog"
        slogan="Everything that's going on at Enfold is collected here"
    />
    <div class="grid lg:grid-cols-[80%_20%] mb-10 cursor-default">
        <div class="w-[80%] block m-auto mt-5">

            <div class="flex justify-between">

                <a role="button" href="{{route('posts')}}"
                   class="dark:text-dark-7 flex items-center text-neutral-400 hover:text-black hover:bg-neutral-100 px-1 rounded-sm my-auto cursor-pointer">
                    <x-Ui::icons.icon :icon="'chevrons-left-double'" class="w-5 block hover:text-black"/>
                    back
                </a>

                <div class="flex gap-4">
                    <x-Ui::button.edit :id="$post->id" class="text-blue-200 cursor-pointer hover:text-blue-500"
                                       wire:click="edit({{$post->id}})"/>
                    <x-Ui::button.delete wire:click="confirmDelete({{$post->id}})"
                                         class="text-red-200 cursor-pointer hover:text-red-500"/>
                </div>

            </div>
            <div
                class="text-dark-5 cursor-pointer block mt-2 my-auto text-2xl font-bold capitalize">{{$post->vname}}</div>
            <div class="relative w-full group mt-5">
                <!-- Image -->
                <img alt=""
                     class="w-full h-[80vh] object-cover"
                     src="{{ Storage::url('images/' . $post->image) }}"
                />

            </div>

            <div class="flex justify-between mt-5">
                <div class="flex gap-5">
                    <div class="flex flex-col sm:flex-row gap-2">
                        <div class="flex gap-1">
                            <div class="w-8 flex items-center b cursor-pointer">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                     stroke="#190aeb">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                       stroke-linejoin="round"
                                       stroke="#CCCCCC" stroke-width="0.144"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M12 6.00019C10.2006 3.90317 7.19377 3.2551 4.93923 5.17534C2.68468 7.09558 2.36727 10.3061 4.13778 12.5772C5.60984 14.4654 10.0648 18.4479 11.5249 19.7369C11.6882 19.8811 11.7699 19.9532 11.8652 19.9815C11.9483 20.0062 12.0393 20.0062 12.1225 19.9815C12.2178 19.9532 12.2994 19.8811 12.4628 19.7369C13.9229 18.4479 18.3778 14.4654 19.8499 12.5772C21.6204 10.3061 21.3417 7.07538 19.0484 5.17534C16.7551 3.2753 13.7994 3.90317 12 6.00019Z"
                                              class="stroke-pink-600 active:bg-pink-600" stroke-width="2"
                                              stroke-linecap="round"
                                              stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                            </div>
                            <div class="text-dark-7 text-lg block my-auto">1000</div>
                        </div>
                        <div class="flex justify-between w-full">
                            <div class="flex gap-2 mr-3">
                                <div class="text-dark-7 flex items-center">Post by</div>
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
                                <div class="text-dark-7 cursor-pointer block my-auto">{{$post->vname}}</div>
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
                                                stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </g>
                                    </svg>
                                </div>
                                <div
                                    class="text-sm text-dark-7 block my-auto">{{$post->created_at->diffForHumans()}}</div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- Include Alpine.js if not already -->

                <div class="sm:flex gap-5 hidden">

                    <div class="text-dark-7">Tag : {{ $blog_tag_name }}</div>
                    <div class="text-dark-7">Category : {{ $blog_category_name }}</div>

                </div>

            </div>

            <div class="my-10">
                <div class="text-sm">
                    {!! $post->body !!}
                </div>

            </div>

            <hr class="border-gray-300 my-5"/>

            <div class="mb-4">Comments</div>
            @forelse ($comments as $comment)
                <div class="border border-gray-200 rounded-lg dark:bg-dark-4 dark:text-dark-9 mb-2 p-2">
                    <div class="text-sm pb-3">{{ $comment->body }}</div>
                    <div class="flex justify-between">
                        <div class="text-xs text-dark-8">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</div>
                        <div class="flex items-center gap-3 self-center ">
                            <x-Ui::button.delete wire:click="deleteComment({{$comment->id}})" class="text-red-500"/>
                        </div>
                    </div>

                </div>
            @empty
                <div class="flex-col flex justify-start items-center border rounded-md">
                    <div class="w-full bg-gray-100 p-2 dark:bg-dark-4 dark:text-dark-9 rounded-md">No Activities yet
                    </div>
                    <div class="w-full px-2 py-4">Empty Remarks</div>
                </div>
            @endforelse


            <hr class="border-gray-300 my-10"/>
            <div class="text-lg">Leave a Reply</div>
            <div class="mt-3 mb-1 text-xs">Comment *</div>
            <textarea wire:model="commentMsg" class="h-[200px] p-2 w-full border-1 border-gray-300 rounded-sm"
                      placeholder="Text here..."></textarea>
            <button wire:click="getSaveComment" class="bg-primary py-2 mt-2 px-4 rounded-lg text-sm text-white cursor-pointer">Post Comment</button>

            <hr class="border-gray-300 my-10"/>

            {{--            Related Blog --}}

            <div class="text-lg">Related Posts</div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 w-[100%] gap-5 gap-y-10 mt-10 mx-auto mb-20">
                @foreach ($firstPost as $data)

                    @if($data->id != $post->id)

                        <a href="{{ route('posts.show', ['id' => $data->id]) }}"
                           class="bg-white p-2 border border-gray rounded-lg transform duration-500 hover:-translate-y-2">
                            <div class="border border-gray-200  bg-gray-100 rounded-lg  overflow-hidden">
                                <div class="relative w-full group">
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
                                            <div
                                                class="text-sm text-dark-7">   {{ $data->created_at->format('d-m-Y') }}</div>
                                        </div>
                                    </div>

                                    <div
                                        class="font-bold text-xl my-2 cursor-pointer text-dark-4">{{$data->vname}}</div>
                                    <div
                                        class="line-clamp-3 text-sm leading-relaxed text-dark-7 h-18">{!! $data->body !!}</div>
                                    <div class="flex justify-between mt-4 pb-2">
                                        <div class="flex gap-1">
                                            <div class="w-4 flex items-center b cursor-pointer">
                                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                     stroke="#190aeb">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                       stroke-linejoin="round"
                                                       stroke="#CCCCCC" stroke-width="0.144"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M12 6.00019C10.2006 3.90317 7.19377 3.2551 4.93923 5.17534C2.68468 7.09558 2.36727 10.3061 4.13778 12.5772C5.60984 14.4654 10.0648 18.4479 11.5249 19.7369C11.6882 19.8811 11.7699 19.9532 11.8652 19.9815C11.9483 20.0062 12.0393 20.0062 12.1225 19.9815C12.2178 19.9532 12.2994 19.8811 12.4628 19.7369C13.9229 18.4479 18.3778 14.4654 19.8499 12.5772C21.6204 10.3061 21.3417 7.07538 19.0484 5.17534C16.7551 3.2753 13.7994 3.90317 12 6.00019Z"
                                                              class="stroke-pink-600" stroke-width="2"
                                                              stroke-linecap="round"
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
                                                    <svg class="cursor-pointer stroke-blue-500" viewBox="0 -0.5 25 25"
                                                         fill="none"
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
                                                    <svg viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                           stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <path
                                                                d="M9 3V5M12 3V5M15 3V5M13 9H9M15 13H9M8.2 21H15.8C16.9201 21 17.4802 21 17.908 20.782C18.2843 20.5903 18.5903 20.2843 18.782 19.908C19 19.4802 19 18.9201 19 17.8V7.2C19 6.0799 19 5.51984 18.782 5.09202C18.5903 4.71569 18.2843 4.40973 17.908 4.21799C17.4802 4 16.9201 4 15.8 4H8.2C7.0799 4 6.51984 4 6.09202 4.21799C5.71569 4.40973 5.40973 4.71569 5.21799 5.09202C5 5.51984 5 6.07989 5 7.2V17.8C5 18.9201 5 19.4802 5.21799 19.908C5.40973 20.2843 5.71569 20.5903 6.09202 20.782C6.51984 21 7.07989 21 8.2 21Z"
                                                                class="stroke-blue-500" stroke-width="2"
                                                                stroke-linecap="round"
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

                    @endif
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
                                <button wire:click="getFilter({{ $tag->id }})"
                                        class="hover:text-blue-600 cursor-pointer">
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
                            <button wire:click="getCategory_id({{ $blogcategory->id }})"
                                    class="px-4 py-2 border border-gray-800 cursor-pointer hover:bg-dark-4">
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
                    <a href="https://x.com/" target="_blank">

                        <svg class="text-dark-7 stroke-dark-7" fill="currentColor" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 50 50">
                            <path d="M 5.9199219 6 L 20.582031 27.375 L 6.2304688 44 L 9.4101562 44 L 21.986328 29.421875 L 31.986328 44 L 44 44 L 28.681641 21.669922 L 42.199219 6 L 39.029297 6 L 27.275391 19.617188 L 17.933594 6 L 5.9199219 6 z M 9.7167969 8 L 16.880859 8 L 40.203125 42 L 33.039062 42 L 9.7167969 8 z"></path>
                        </svg>
                    </a>
                </div>

                <div class="w-4 hover:w-6 block my-auto">
                    <a href="https://in.linkedin.com/" target="_blank">
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

    <x-Ui::forms.create :id="$vid" :max-width="'xl'">
        <div class="flex flex-col gap-4">

            {{--                        <x-Ui::inputmodel-text wire:model="common.vname" :label="'Name'"/> --}}

            <div>
                <input type="checkbox" wire:model="visibility">
                <label for="">Public</label>
            </div>


            <x-Ui::input.floating wire:model="vname" label="Name"/>

            <x-Ui::input.rich-text wire:model="body" label="Description"/>

            <x-Ui::dropdown.wrapper label="Blog Category" type="blogcategoryTyped">
                <div class="relative ">
                    <x-Ui::dropdown.input label="Blog Category" id="blog_category_name"
                                          wire:model.live="blog_category_name"
                                          wire:keydown.arrow-up="decrementBlogcategory"
                                          wire:keydown.arrow-down="incrementBlogcategory"
                                          wire:keydown.enter="enterBlogcategory"/>
                    <x-Ui::dropdown.select>
                        @if ($blogcategoryCollection)
                            @forelse ($blogcategoryCollection as $i => $blogcategory)
                                <x-Ui::dropdown.option highlight="{{ $highlightBlogCategory === $i }}"
                                                       wire:click.prevent="setBlogcategory('{{ $blogcategory->vname }}','{{ $blogcategory->id }}')">
                                    {{ $blogcategory->vname }}
                                </x-Ui::dropdown.option>
                            @empty
                                <button wire:click.prevent="blogcategorySave('{{ $blog_category_name }}')"
                                        class="w-full text-center text-white bg-green-500">
                                    create
                                </button>
                            @endforelse
                        @endif
                    </x-Ui::dropdown.select>
                </div>
            </x-Ui::dropdown.wrapper>

            <x-Ui::dropdown.wrapper label="Blog Tag" type="blogtagTyped">
                <div class="relative ">
                    <x-Ui::dropdown.input label="Blog Tag" id="blog_tag_name" wire:model.live="blog_tag_name"
                                          wire:keydown.arrow-up="decrementBlogtag"
                                          wire:keydown.arrow-down="incrementBlogtag"
                                          wire:keydown.enter="enterBlogtag"/>
                    <x-Ui::dropdown.select>
                        @if ($blogtagCollection)
                            @forelse ($blogtagCollection as $i => $blogtag)
                                <x-Ui::dropdown.option highlight="{{ $highlightBlogCategory === $i }}"
                                                       wire:click.prevent="setBlogTag('{{ $blogtag->vname }}','{{ $blogtag->id }}')">
                                    {{ $blogtag->vname }}
                                </x-Ui::dropdown.option>
                            @empty
                                <button wire:click.prevent="blogtagSave('{{ $blog_tag_name }}')"
                                        class="w-full text-center text-blue-600 bg-blue-100  hover:font-bold">
                                    create
                                </button>
                            @endforelse
                        @endif
                    </x-Ui::dropdown.select>
                </div>
            </x-Ui::dropdown.wrapper>

            <!-- Image  ----------------------------------------------------------------------------------------------->

            <div class="flex flex-col py-2">
                <label for="bg_image" class="w-full px-2 pb-4 tracking-wide text-zinc-500">Image</label>
                <div class="flex flex-wrap gap-2">
                    <div class="flex-shrink-0">
                        <div>
                            @if ($image)
                                <div
                                    class="flex-shrink-0 p-1 overflow-hidden border-2 border-gray-300 border-dashed rounded-lg ">
                                    <img
                                        class="w-[156px] h-[89px] rounded-lg hover:brightness-110 hover:scale-105 duration-300 transition-all ease-out"
                                        src="{{ $image->temporaryUrl() }}" alt="{{ $image ?: '' }}"/>
                                </div>
                            @endif

                            @if (!$image && isset($image))
                                <img class="w-full h-24"
                                     src="{{ URL(\Illuminate\Support\Facades\Storage::url('images/' . $old_image)) }}"
                                     alt="">
                            @else
                                <x-Ui::icons.icon :icon="'logo'" class="block w-auto h-auto "/>
                            @endif
                        </div>
                    </div>
                    <div class="relative">
                        <div>
                            <label for="bg_image"
                                   class="text-gray-500 font-semibold text-base rounded flex flex-col items-center
                                   justify-center cursor-pointer border-2 border-gray-300 border-dashed p-2
                                   mx-auto font-[sans-serif]">
                                <x-Ui::icons.icon icon="cloud-upload" class="block w-8 h-auto text-gray-400"/>
                                Upload Photo
                                <input type="file" id='bg_image' wire:model="image" class="hidden"/>
                                <p class="mt-2 text-xs font-light text-gray-400">PNG and JPG are
                                    Allowed.</p>
                            </label>
                        </div>

                        <div wire:loading wire:target="image" class="absolute z-10 top-6 left-12">
                            <div
                                class="border-green-500 border-dashed rounded-full w-14 h-14 animate-spin border-y-4 border-t-transparent">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </x-Ui::forms.create>

</div>
