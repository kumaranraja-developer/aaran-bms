<div>
    <x-slot name="header">Activity</x-slot>

    <x-Ui::forms.m-panel>

        <div>
            <a href="{{route('task-managers',$task->job_id)}}"
               class="bg-black/10 hover:bg-black/80 cursor-pointer text-white p-2 text-xs
                                rounded-xl w-5 z-10 transition duration-300">
                &#10094;&#10094;&nbsp;&nbsp;&nbsp;back
            </a>
        </div>

        <div class="px-10 py-2">

            <div class="mx-auto space-y-5 font-lex ">

                <div class="inline-flex 1space-x-2 font-merri">
                    <div
                        class="text-3xl {{ \Aaran\Assets\Enums\Status::tryFrom($task->status_id)->getStyle() }} rounded-full flex items-center justify-center  w-12 h-12 text-gray-700 dark:text-dark-9">
                        {{$task->task_id}}
                    </div>

                    <div class="text-5xl px-5 font-bold tracking-wider capitalize text-gray-700 dark:text-dark-9">
                        {{$task->title}}
                    </div>
                </div>

                <div class="hidden lg:flex justify-between">
                    <div class="flex flex-row my-1 gap-5">

                        <div class="flex flex-row gap-2 text-md capitalize">
                            <div
                                class="text-gray-600 my-0.5">Job :
                                <span
                                    class="text-blue-500">{{ $task->title}}</span>
                            </div>

                            <div
                                class="text-gray-600 my-0.5">
                                Module :
                                <span
                                    class="text-blue-500">
                                {{ $task->module_name }}
                            </span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <x-Ui::button.edit wire:click="editTask"/>
                    </div>
                </div>

                <div>
                    <x-Ui::slider.carousel-light-box :images="$taskImage"/>
                </div>

                <!--User Data ------------------------------------------------------------------------------------------------>

                <div
                    class="flex justify-between border bg-amber-50 px-8 py-2 items-center border-amber-200 rounded-full">

                    <div class="">
                        <div class="text-neutral-600 flex items-start">
                            <x-Ui::icons.icon icon="user" class="w-8 h-auto fill-orange-500"/>
                            #
                            <div>{{ \Aaran\Core\User\Models\User::getName($task->reporter_id) }}</div>
                        </div>
                        <div class="text-neutral-500 flex items-center">
                            <x-Ui::icons.icon icon="clock" class="w-4 h-auto "/>
                            &nbsp;&nbsp;{{\Carbon\Carbon::parse($task->created_at)->diffForHumans()}}
                        </div>
                    </div>


                    <div class="flex text-blue-500">

                        <x-Ui::icons.task-pad class="h-8 w-auto block"/>
                        @ {{ \Aaran\Core\User\Models\User::getName($task->allocated_id)}}
                    </div>

                    <div class="flex gap-8 items-center">
                        <div
                            class="flex gap-3 items-center {{ \Aaran\Assets\Enums\Priority::tryFrom($task->priority_id)->getTextStyle() }}">
                            <div>
                                <svg class="h-8 w-auto" fill="none" viewBox="0 0 24 24"
                                     id="Edit-Pen-Write-Paper--Streamline-Freehand">
                                    <desc>
                                        Edit Pen Write Paper Streamline Icon: https://streamlinehq.com
                                    </desc>
                                    <path fill="currentColor" fill-rule="evenodd"
                                          d="M23.0003 0.681527c-0.5329 -0.402203 -1.1935 -0.597552 -1.8594 -0.549832 -0.2417 0.026717 -0.4778 0.090794 -0.6998 0.189942 -0.2946 0.164351 -0.5667 0.365948 -0.8098 0.599817 -0.0329 0.031713 -0.0591 0.069751 -0.0771 0.111836 -0.0179 0.04209 -0.0271 0.08735 -0.0271 0.13309 0 0.04574 0.0092 0.091 0.0271 0.13309 0.018 0.04208 0.0442 0.08012 0.0771 0.11184 0.0309 0.03267 0.0681 0.0587 0.1093 0.0765 0.0413 0.01779 0.0857 0.02697 0.1307 0.02697 0.0449 0 0.0893 -0.00918 0.1306 -0.02697 0.0413 -0.0178 0.0784 -0.04383 0.1093 -0.0765 0.1646 -0.15143 0.3419 -0.28855 0.5298 -0.40988 0.1789 -0.097602 0.3766 -0.155564 0.5798 -0.169948 0.4672 -0.000913 0.9199 0.161788 1.2797 0.459858 0.1821 0.11521 0.3353 0.27064 0.448 0.45434 0.1126 0.18371 0.1817 0.39079 0.2018 0.60534 0.0036 0.34674 -0.0752 0.68937 -0.23 0.99969 -0.1613 0.31718 -0.3666 0.60999 -0.6098 0.86974l-1.2096 1.35959c-0.2999 -0.31991 -0.6098 -0.63981 -0.9397 -0.93972 -0.16 -0.14995 -0.3299 -0.27991 -0.4899 -0.41987l-0.3299 -0.21993 -0.8397 -0.48985 -0.16 -0.11997 0.2699 -0.38988 0.6798 -0.84974c0.024 -0.0327 0.0408 -0.07006 0.0494 -0.10967 0.0086 -0.0396 0.0088 -0.08057 0.0006 -0.12026 0 -0.14995 -0.1499 -0.37988 -0.4498 -0.19994 -0.29 -0.21993 -0.5399 -0.47985 -0.8198 -0.69979 -0.1702 -0.127698 -0.3547 -0.235062 -0.5498 -0.319899 -0.1584 -0.065993 -0.3283 -0.099969 -0.4999 -0.099969 -0.1716 0 -0.3414 0.033976 -0.4998 0.099969 -0.307 0.150821 -0.59 0.346209 -0.8398 0.579819 -0.3297 0.29301 -0.6402 0.60689 -0.9297 0.93972 -0.4 0.50465 -0.7706 1.03204 -1.1096 1.57952 -0.0642 0.0654 -0.1001 0.15334 -0.1001 0.24492 0 0.09159 0.0359 0.17952 0.1001 0.24493 0.0637 0.06349 0.1499 0.09914 0.2399 0.09914 0.0899 0 0.1762 -0.03565 0.2399 -0.09914 0.2999 -0.30991 0.6098 -0.58982 0.9097 -0.86974 0.4472 -0.4227 0.9178 -0.81987 1.4096 -1.18963 0.14 -0.11997 0.3099 -0.26992 0.4899 -0.39988 0.1799 -0.12996 0.1599 -0.15995 0.2699 -0.13996 0.1299 0.0192 0.2573 0.05273 0.3799 0.09997 0.2799 0.12996 0.5498 0.29991 0.8297 0.43987l-0.3499 0.40987c-1.3896 1.6295 -4.4386 5.19842 -5.6883 6.81792 -0.2833 0.32657 -0.5036 0.70285 -0.6498 1.10965 0 0.2799 -0.1299 2.2893 -0.1099 3.1091 -0.0118 0.0996 -0.0118 0.2003 0 0.2999 -0.1533 0.0935 -0.3003 0.197 -0.4399 0.3099 -0.0874 0.0758 -0.1677 0.1595 -0.2399 0.2499 -0.069 0.0893 -0.1325 0.1828 -0.19 0.2799 -0.5498 0.8997 -0.4298 0.9997 -0.4198 0.9997 0.0138 0.0765 0.0568 0.1446 0.1199 0.19 0.0575 0.0533 0.1317 0.0851 0.21 0.0899 0 0 0.1499 0.09 0.9397 -0.6098 0.0897 -0.0696 0.1703 -0.1502 0.2399 -0.2399 0.0762 -0.0825 0.1432 -0.173 0.1999 -0.2699 0.077 -0.1314 0.1438 -0.2684 0.2 -0.4099 0.2214 0.0408 0.4484 0.0408 0.6698 0 0.8636 -0.2002 1.7121 -0.4607 2.5392 -0.7798 0.1649 -0.0643 0.3098 -0.1712 0.4199 -0.3099 0.2499 -0.2699 0.7398 -0.8397 1.3496 -1.5895 1.7594 -2.15933 4.5686 -5.76823 5.6982 -7.07783 0.2909 -0.33053 0.5333 -0.70081 0.7198 -1.09966 0.2209 -0.41367 0.3472 -0.8712 0.3699 -1.3396 -0.0316 -0.33794 -0.1376 -0.66469 -0.3105 -0.95679 -0.1728 -0.29211 -0.4082 -0.542325 -0.6892 -0.732693ZM15.2427 12.5279l-0.19 0.2c-0.7307 0.3027 -1.4867 0.5402 -2.2593 0.7097v-2.7291c0.09 0 -0.6198 0.4898 5.0885 -6.78796l0.1299 0.12996 0.5399 0.6498c0.2614 0.31786 0.5602 0.60315 0.8897 0.84975 0.3583 0.23831 0.7324 0.45207 1.1196 0.6398 -0.8497 0.9997 -1.8294 2.13935 -2.7291 3.21902 -1.0997 1.34963 -2.0994 2.58923 -2.5892 3.11903Z"
                                          clip-rule="evenodd" stroke-width="1"></path>
                                    <path fill="currentColor" fill-rule="evenodd"
                                          d="m18.6316 17.5264 -0.6998 -1.5995c-0.0082 -0.0437 -0.0258 -0.0851 -0.0515 -0.1214 -0.0257 -0.0363 -0.0589 -0.0667 -0.0974 -0.089s-0.0813 -0.0361 -0.1256 -0.0404c-0.0442 -0.0043 -0.0889 0.001 -0.131 0.0155 -0.042 0.0145 -0.0804 0.0379 -0.1127 0.0685 -0.0322 0.0307 -0.0574 0.068 -0.0739 0.1092 -0.0166 0.0413 -0.024 0.0857 -0.0219 0.1301 0.0021 0.0444 0.0138 0.0879 0.0342 0.1274l0.6898 1.6995c0.5398 1.0797 0.9997 1.6295 1.2196 2.0694 0.1413 0.2189 0.1915 0.4843 0.14 0.7397 0 0.05 -0.1 0.06 -0.1999 0.12 -0.3488 0.1851 -0.7178 0.3294 -1.0997 0.4299 -2.3271 0.6111 -4.7014 1.0257 -7.0978 1.2396 -2.37019 0.2998 -4.76295 0.3801 -7.14787 0.2399 -0.33743 -0.0283 -0.67186 -0.0852 -0.99969 -0.1699 -0.09652 -0.0361 -0.1901 -0.0795 -0.27992 -0.13 -0.11716 -0.2097 -0.22068 -0.4268 -0.3099 -0.6498 -0.09698 -0.2079 -0.17074 -0.4258 -0.21994 -0.6498 -0.48414 -2.76 -0.79134 -5.5482 -0.91972 -8.3475 -0.207143 -2.6885 -0.207143 -5.38897 0 -8.0775 0.92972 -0.21993 2.18934 -0.42987 3.59891 -0.60982 1.88942 -0.23992 3.99878 -0.40987 5.99813 -0.47985 0.0455 0.00002 0.0906 -0.00909 0.1325 -0.0268 0.0419 -0.0177 0.0798 -0.04363 0.1115 -0.07626 0.0317 -0.03263 0.0565 -0.07129 0.073 -0.11369 0.0165 -0.0424 0.0243 -0.08767 0.0229 -0.13314 -0.0026 -0.09106 -0.0406 -0.17751 -0.1059 -0.24098 -0.0654 -0.06347 -0.1529 -0.09896 -0.244 -0.09892 -1.99935 0 -4.1287 0.15995 -6.04811 0.34989 -1.3436 0.12579 -2.67877 0.32941 -3.998787 0.60982 -0.086422 0.02205 -0.164568 0.06876 -0.224917 0.13443 -0.060349 0.06567 -0.100297 0.14748 -0.114979 0.23546C-0.00966499 7.04 -0.0866254 9.91431 0.0972769 12.7778 0.205629 15.6344 0.509582 18.4802 1.007 21.2952c0.05912 0.2441 0.13256 0.4844 0.21993 0.7198 0.13514 0.3218 0.28868 0.6356 0.45986 0.9397 0.21734 0.2497 0.48419 0.4515 0.78363 0.5926 0.29944 0.1411 0.62493 0.2185 0.95584 0.2272 1.97836 0.1691 3.96913 0.1255 5.93819 -0.13 3.31665 -0.2785 6.58855 -0.9497 9.74705 -1.9994 0.6798 -0.2899 0.9997 -0.6398 1.0697 -0.9097 0.0602 -0.2873 0.0359 -0.5859 -0.07 -0.8597 -0.2399 -0.4899 -0.7698 -0.9997 -1.4796 -2.3493Z"
                                          clip-rule="evenodd" stroke-width="1"></path>
                                    <path fill="currentColor" fill-rule="evenodd"
                                          d="M9.67431 11.6282c-0.03014 -0.0958 -0.0952 -0.1767 -0.18224 -0.2267 -0.08705 -0.05 -0.18972 -0.0655 -0.28762 -0.0433 -0.07998 0 0 -0.0799 -0.34989 0 -0.76977 0.09 -1.99939 0.2999 -3.05907 0.4499 -0.3199 0.05 -0.62981 0.09 -0.90972 0.15 -0.64981 0.1199 -1.13966 0.2599 -1.3296 0.2799 -0.06394 0.0122 -0.12161 0.0464 -0.16308 0.0965 -0.04148 0.0502 -0.06417 0.1133 -0.06417 0.1784s0.02269 0.1282 0.06417 0.1783c0.04147 0.0502 0.09914 0.0844 0.16308 0.0966 0.49909 0.0792 1.00437 0.1126 1.50954 0.1 0.44986 0 0.9997 -0.06 1.46955 -0.11 0.7872 -0.0756 1.56862 -0.2025 2.33929 -0.3799 0.72978 -0.2399 0.85974 -0.5498 0.79976 -0.7697Z"
                                          clip-rule="evenodd" stroke-width="1"></path>
                                    <path fill="currentColor" fill-rule="evenodd"
                                          d="M5.45568 7.7694c-0.67735 0.14942 -1.34504 0.33971 -1.99939 0.56983 -0.0719 0.01892 -0.13379 0.06475 -0.17286 0.12801 -0.03907 0.06326 -0.05235 0.13911 -0.03708 0.21188 0.01881 0.07143 0.0651 0.13253 0.12877 0.16999 0.06366 0.03745 0.13956 0.04822 0.21113 0.02995 0.88973 -0.13996 1.74947 -0.16995 2.64919 -0.23992 1.23963 -0.10997 2.52923 -0.23993 3.99876 -0.42987 0.3799 -0.04999 0.7798 -0.07998 1.1797 -0.16995 0.1278 0.00422 0.2557 -0.00924 0.3798 -0.03999 0.06 0 0.08 -0.06998 0.14 -0.10997 0.0975 -0.01716 0.1844 -0.07168 0.2423 -0.15197 0.0579 -0.08029 0.0821 -0.17999 0.0676 -0.2779 -0.06 -0.45986 -0.8597 -0.45986 -0.9397 -0.45986 -1.70948 0.11997 -3.15904 0.3299 -4.50863 0.50985 -0.45986 0.09997 -0.89972 0.15995 -1.33959 0.25992Z"
                                          clip-rule="evenodd" stroke-width="1"></path>
                                    <path fill="currentColor" fill-rule="evenodd"
                                          d="M8.81459 15.8369c-0.12996 0 -0.28991 0 -0.46985 0.05l-1.29961 0.1999c-0.67979 0.11 -1.39957 0.22 -1.94941 0.3599 -0.30474 0.077 -0.60509 0.1704 -0.89972 0.2799h-0.05998c-0.0489 -0.0147 -0.10106 -0.0147 -0.14996 0 0 0 -0.12996 0.4899 0.27992 0.5299 0.16995 0 0.49985 0.06 0.99969 0.06 0.66898 -0.0216 1.33637 -0.0783 1.99939 -0.17 0.48986 -0.06 0.9997 -0.1299 1.3296 -0.1999 0.14225 -0.0229 0.28259 -0.0563 0.41987 -0.1 0.17098 -0.0712 0.32957 -0.169 0.46986 -0.2899 0.09158 -0.049 0.16052 -0.1316 0.19224 -0.2305 0.03172 -0.0989 0.02372 -0.2062 -0.02229 -0.2993 -0.08998 -0.03 -0.12996 -0.17 -0.83975 -0.19Z"
                                          clip-rule="evenodd" stroke-width="1"></path>
                                </svg>
                            </div>

                            <div
                                class="text-xs px-4 h-max w-max block my-auto rounded-full py-1
                    {{ \Aaran\Assets\Enums\Priority::tryFrom($task->priority_id)->getStyle() }}">
                                {{ \Aaran\Assets\Enums\Priority::tryFrom($task->priority_id)->getName() }}</div>
                        </div>

                        <div
                            class="flex gap-3 items-center {{ \Aaran\Assets\Enums\Status::tryFrom($task->priority_id)->getTextStyle() }}">
                            <div>
                                <svg viewBox="0 0 16 16" class="h-8 w-auto" fill="none">
                                    <path
                                        d="m12.57035 11.8821 0.76575 0.64255a6.988 6.988 0 0 0 1.2204 -2.09105l-0.9388 -0.3418a5.98645 5.98645 0 0 1 -1.04735 1.7903Z"
                                        fill="currentColor" stroke-width="0.5"></path>
                                    <path
                                        d="m9 13.905 0.2064 0.98385a6.9444 6.9444 0 0 0 2.27075 -0.81885L11 13.20435a6.26 6.26 0 0 1 -2 0.70065Z"
                                        fill="currentColor" stroke-width="0.5"></path>
                                    <path
                                        d="M5 13.20435 4.5 14.07a7.07 7.07 0 0 0 2.2936 0.8191l0.17345 -0.98385A6.07595 6.07595 0 0 1 5 13.20435Z"
                                        fill="currentColor" stroke-width="0.5"></path>
                                    <path
                                        d="m2.3823 10.0918 -0.9388 0.3418a6.988 6.988 0 0 0 1.2204 2.09105l0.76575 -0.64255a5.98645 5.98645 0 0 1 -1.04735 -1.7903Z"
                                        fill="currentColor" stroke-width="0.5"></path>
                                    <path d="M8 11a0.75 0.75 0 1 0 0.75 0.75A0.75 0.75 0 0 0 8 11Z" fill="currentColor"
                                          stroke-width="0.5"></path>
                                    <path d="M7.5 4h1v5.5h-1Z" fill="currentColor" stroke-width="0.5"></path>
                                    <path d="M15 8h-1a6 6 0 0 0 -12 0H1a7 7 0 0 1 14 0Z" fill="currentColor"
                                          stroke-width="0.5"></path>
                                    <path id="_Transparent_Rectangle_" d="M0 0h16v16H0Z" fill="none"
                                          stroke-width="0.5"></path>
                                </svg>
                            </div>

                            <div
                                class="text-xs px-4 h-max w-max block my-auto rounded-full py-1
                         {{ \Aaran\Assets\Enums\Status::tryFrom($task->status_id)->getStyle()}}">
                                {{ \Aaran\Assets\Enums\Status::tryFrom($task->status_id)->getName() }}</div>
                        </div>
                    </div>

                </div>

                <div
                    class="text-sm text-justify leading-loose rounded-xl border bg-white border-neutral-100 p-5 mb-5">{!! $task->body !!}</div>

            </div>


            <!-- TaskActivity ----------------------------------------------------------------------------------------->

            <x-Ui::blog.comments :list="$activities"/>

            <x-Ui::blog.reply :show-popup="$showPopup" />

            <x-Ui::modal.confirm-delete/>

            <!-- Create TaskActivity -------------------------------------------------------------------------------------->

            <section>
                <div class="max-w-7xl mx-auto flex-col justify-start items-start gap-5 flex">
                    <div class="w-full rounded-3xl justify-start items-start gap-3.5 inline-flex">
                        <img class="w-10 h-10 object-cover" src="https://pagedone.io/asset/uploads/1710225753.png"
                             alt="John smith image"/>



                        <x-Ui::markdown.trix wire:model="vname" :placeholder="'write something'"/>

{{--                        <x-Ui::markdown.mark--}}
{{--                            name="content"--}}
{{--                            value="{{ old('content', $vname ?? '') }}"--}}
{{--                            preview="true"--}}
{{--                            uploadUrl="{{ route('dashboard') }}"--}}
{{--                            class="mb-4 h-36"--}}
{{--                        />--}}


                    </div>

                    <div class="w-full flex flex-row gap-3 justify-between">
                        <div class="w-full flex flex-row gap-3 justify-between">

                            <button wire:click.prevent="getSaveActivity"
                                class="px-5 py-2.5 shrink-0 bg-indigo-600 hover:bg-indigo-800 transition-all duration-700 ease-in-out rounded-xl shadow-[0px_1px_2px_0px_rgba(16,_24,_40,_0.05)] justify-center items-center flex">
                                <span class="px-2 py-px text-white text-base font-semibold leading-relaxed">Post your comment</span>
                            </button>

                            <div class="flex flex-row gap-3 items-center">
                                <x-Ui::datepicker.date wire:model="Start_On"/>

                                <x-Ui::datepicker.date wire:model="End_On"/>

                                <x-Ui::input.floating-dropdown
                                    wire:model="status_id"
                                    label="Status"
                                    id="status_id"
                                    :options="$statuses"
                                    placeholder=""
                                />

                            </div>

                        </div>
                    </div>
                </div>
            </section>

        </div>
    </x-Ui::forms.m-panel>

    <!--Create Record ------------------------------------------------------------------------------------------------->

    <x-Ui::forms.create :id="$vid" :max-width="'7xl'">

        <!--Left Side ------------------------------------------------------------------------------------------------->
        <div class="flex flex-col sm:flex-row gap-y-3 space-x-5 w-full">
            <div class="flex flex-col space-y-5 w-full">

                <div>
                    <x-Ui::input.floating wire:model="title" :label="'Title'"/>
                    @error('title')
                    <div class="text-xs text-red-500">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class=" w-2xl">
{{--                    <x-Ui::input.rich-text wire:model="body" :placeholder="'Content'"/>--}}

                    <x-Ui::markdown.trix wire:model="body" :placeholder="'Content'"/>

                    @error('body')
                    <div class="text-xs text-red-500 mt-2">
                        {{$message}}
                    </div>
                    @enderror
                </div>

            </div>

            <!--Right Side -------------------------------------------------------------------------------------------->

            <div class="flex flex-col space-y-5 w-full">

                @livewire('devops::module-lookup')

                <div>
                    <x-Ui::input.floating-dropdown
                        wire:model="allocated_id"
                        label="Allocated to"
                        id="allocated_id"
                        :options="$users"
                        placeholder="Choose a .."
                    />
                    <x-Ui::input.error-text wire:model="plan_id"/>
                </div>

                <div>
                    <x-Ui::input.floating-dropdown
                        wire:model="priority_id"
                        label="Priority"
                        id="priority_id"
                        :options="$priorities"
                        placeholder=""
                    />
                    <x-Ui::input.error-text wire:model="priority_id"/>
                </div>

                <!-- Image  ----------------------------------------------------------------------------------------------->

                <div class="flex flex-col py-2">
                    <label for="bg_image"
                           class="w-full text-zinc-500 tracking-wide pb-4 px-2">Image</label>

                    <div class="flex flex-wrap gap-2">

                        <div class="relative">
                            <div>
                                <label for="bg_image"
                                       class="text-gray-500 font-semibold text-base rounded flex flex-col items-center
                                   justify-center cursor-pointer border-2 border-gray-300 border-dashed p-2
                                   mx-auto font-[sans-serif]">
                                    <x-Ui::icons.icon icon="cloud-upload" class="w-8 h-auto block text-gray-400"/>
                                    Upload Photo
                                    <input type="file" id='bg_image' wire:model="images" class="hidden" multiple/>
                                    <p class="text-xs font-light text-gray-400 mt-2">PNG and JPG are
                                        Allowed.</p>
                                </label>
                            </div>

                            <div wire:loading wire:target="images" class="z-10 absolute top-6 left-12">
                                <div class="w-14 h-14 rounded-full animate-spin
                                                        border-y-4 border-dashed border-green-500 border-t-transparent"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-shrink-0 mt-4 w-full overflow-auto">
            <div>
                @if($images)
                    <div class="flex gap-5">
                        @foreach($images as $image)
                            <div
                                class=" flex-shrink-0 border-2 border-dashed border-gray-300 p-1 rounded-lg overflow-auto">
                                <img
                                    class="w-[156px] h-[89px] rounded-lg hover:brightness-110 hover:scale-105 duration-300 transition-all ease-out"
                                    src="{{ $image->temporaryUrl() }}"
                                    alt="{{$image?:''}}"/>
                            </div>
                        @endforeach
                    </div>
                @endif

                @if(isset($old_images))
                    <div class="flex gap-5 mt-10">
                        @foreach($old_images as $old_image)

                            <div
                                class=" flex-shrink-0 border-2 border-dashed border-gray-300 p-1 rounded-lg overflow-hidden">
                                <img
                                    class="w-[156px] h-[89px] rounded-lg hover:brightness-110 hover:scale-105 duration-300 transition-all ease-out"
                                    src="{{URL(\Illuminate\Support\Facades\Storage::url('images/'.$old_image['image']))}}"
                                    alt="">
                                <div class="flex justify-center items-center">
                                    <x-Ui::button.delete
                                        wire:click="DeleteImage({{$old_image['id']}})"
                                    />
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <x-Ui::icons.icon :icon="'logo'" class="w-auto h-auto block "/>
                @endif
            </div>
        </div>
    </x-Ui::forms.create>


</div>



