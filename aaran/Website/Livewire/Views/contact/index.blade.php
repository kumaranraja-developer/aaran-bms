<div>
    @php
        $fill = '#ff4500';
        $confirmation_msg=true;
    @endphp

    <x-Ui::menu.web.top-banner
        :description="'Your Digital Partner for Smarter Workflows.'"
        :slogan="'Driven by Ideas, Defined by Results'"
    />

    <div class="bg-white dark:bg-dark dark:text-dark-9">

        <section class="relative z-10 overflow-hidden px-3 sm:px-15 py-20 lg:py-[120px] dark:bg-dark">
            <div class="container mx-auto">
                <div class="-mx-4 flex flex-wrap lg:justify-between">
                    <div class="w-full px-8 sm:px-4 lg:w-1/2 xl:w-6/12">
                        <div class="mb-12 max-w-[570px] lg:mb-0">
                        <span class="mb-4 block text-base font-semibold text-primary">
                          Contact Us
                        </span>
                            <h2
                                class="mb-6 text-[32px] font-bold uppercase text-dark sm:text-[40px] lg:text-[36px] xl:text-[40px] dark:text-white">
                                GET IN TOUCH WITH US
                            </h2>
                            <p class="mb-2 text-base  indent-5 leading-relaxed text-body-color dark:text-dark-8">
                                We’re here to help you streamline your business operations with effective and reliable
                                software solutions.
                                Whether you have questions about our GST Billing Software, need assistance, or are
                                interested in a custom
                                software solution tailored to your unique business needs — we’d be happy to hear from
                                you.

                            </p>

                            <p class="mb-9 text-base indent-5 leading-relaxed text-body-color dark:text-dark-8">
                                Please feel free to reach out to us through the contact form, email, or phone. We look
                                forward to connecting with you and supporting your journey towards better financial and
                                operational management.
                            </p>

                            <div class="mb-8 flex w-full max-w-[370px]">
                                <div
                                    class="mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded-sm bg-primary/5 text-primary sm:h-[70px] sm:max-w-[70px]">
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M30.6 11.8002L17.7 3.5002C16.65 2.8502 15.3 2.8502 14.3 3.5002L1.39998 11.8002C0.899983 12.1502 0.749983 12.8502 1.04998 13.3502C1.39998 13.8502 2.09998 14.0002 2.59998 13.7002L3.44998 13.1502V25.8002C3.44998 27.5502 4.84998 28.9502 6.59998 28.9502H25.4C27.15 28.9502 28.55 27.5502 28.55 25.8002V13.1502L29.4 13.7002C29.6 13.8002 29.8 13.9002 30 13.9002C30.35 13.9002 30.75 13.7002 30.95 13.4002C31.3 12.8502 31.15 12.1502 30.6 11.8002ZM13.35 26.7502V18.5002C13.35 18.0002 13.75 17.6002 14.25 17.6002H17.75C18.25 17.6002 18.65 18.0002 18.65 18.5002V26.7502H13.35ZM26.3 25.8002C26.3 26.3002 25.9 26.7002 25.4 26.7002H20.9V18.5002C20.9 16.8002 19.5 15.4002 17.8 15.4002H14.3C12.6 15.4002 11.2 16.8002 11.2 18.5002V26.7502H6.69998C6.19998 26.7502 5.79998 26.3502 5.79998 25.8502V11.7002L15.5 5.4002C15.8 5.2002 16.2 5.2002 16.5 5.4002L26.3 11.7002V25.8002Z"
                                            fill="currentColor"/>
                                    </svg>
                                </div>
                                <div class="w-full">
                                    <h4 class="mb-1 text-xl font-bold text-dark dark:text-dark-9">
                                        Our Location
                                    </h4>
                                    <p class="text-base text-body-color dark:text-dark-8">
                                        {{Aaran\Assets\Config\Application::AppCompanyAddress_1}}<br>
                                        {{Aaran\Assets\Config\Application::AppCompanyAddress_2}}
                                        ,&nbsp;{{Aaran\Assets\Config\Application::AppCompanyAddress_3}}<br>
                                        {{Aaran\Assets\Config\Application::AppCompanyAddress_4}}<br>
                                        {{Aaran\Assets\Config\Application::AppCompanyAddress_5}}<br>
                                    </p>
                                </div>
                            </div>

                            <div class="mb-8 flex w-full max-w-[370px]">
                                <div
                                    class="mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded-sm bg-primary/5 text-primary sm:h-[70px] sm:max-w-[70px]">
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_941_17577)">
                                            <path
                                                d="M24.3 31.1499C22.95 31.1499 21.4 30.7999 19.7 30.1499C16.3 28.7999 12.55 26.1999 9.19997 22.8499C5.84997 19.4999 3.24997 15.7499 1.89997 12.2999C0.39997 8.59994 0.54997 5.54994 2.29997 3.84994C2.34997 3.79994 2.44997 3.74994 2.49997 3.69994L6.69997 1.19994C7.74997 0.599942 9.09997 0.899942 9.79997 1.89994L12.75 6.29994C13.45 7.34994 13.15 8.74994 12.15 9.44994L10.35 10.6999C11.65 12.7999 15.35 17.9499 21.25 21.6499L22.35 20.0499C23.2 18.8499 24.55 18.4999 25.65 19.2499L30.05 22.1999C31.05 22.8999 31.35 24.2499 30.75 25.2999L28.25 29.4999C28.2 29.5999 28.15 29.6499 28.1 29.6999C27.2 30.6499 25.9 31.1499 24.3 31.1499ZM3.79997 5.54994C2.84997 6.59994 2.89997 8.74994 3.99997 11.4999C5.24997 14.6499 7.64997 18.0999 10.8 21.2499C13.9 24.3499 17.4 26.7499 20.5 27.9999C23.2 29.0999 25.35 29.1499 26.45 28.1999L28.85 24.0999C28.85 24.0499 28.85 24.0499 28.85 23.9999L24.45 21.0499C24.45 21.0499 24.35 21.0999 24.25 21.2499L23.15 22.8499C22.45 23.8499 21.1 24.1499 20.1 23.4999C13.8 19.5999 9.89997 14.1499 8.49997 11.9499C7.84997 10.8999 8.09997 9.54994 9.09997 8.84994L10.9 7.59994V7.54994L7.94997 3.14994C7.94997 3.09994 7.89997 3.09994 7.84997 3.14994L3.79997 5.54994Z"
                                                fill="currentColor"/>
                                            <path
                                                d="M29.3 14.25C28.7 14.25 28.25 13.8 28.2 13.2C27.8 8.15003 23.65 4.10003 18.55 3.75003C17.95 3.70003 17.45 3.20003 17.5 2.55003C17.55 1.95003 18.05 1.45003 18.7 1.50003C24.9 1.90003 29.95 6.80003 30.45 13C30.5 13.6 30.05 14.15 29.4 14.2C29.4 14.25 29.35 14.25 29.3 14.25Z"
                                                fill="currentColor"/>
                                            <path
                                                d="M24.35 14.7002C23.8 14.7002 23.3 14.3002 23.25 13.7002C22.95 11.0002 20.85 8.90018 18.15 8.55018C17.55 8.50018 17.1 7.90018 17.15 7.30018C17.2 6.70018 17.8 6.25018 18.4 6.30018C22.15 6.75018 25.05 9.65018 25.5 13.4002C25.55 14.0002 25.15 14.5502 24.5 14.6502C24.4 14.7002 24.35 14.7002 24.35 14.7002Z"
                                                fill="currentColor"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_941_17577">
                                                <rect width="32" height="32" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="w-full">
                                    <h4 class="mb-1 text-xl font-bold text-dark dark:text-dark-9">
                                        Phone Number
                                    </h4>
                                    <p class="text-base text-body-color dark:text-dark-8">
                                        {{Aaran\Assets\Config\Application::AppCompanyMobile}}
                                    </p>
                                </div>
                            </div>

                            <div class="mb-8 flex w-full max-w-[370px]">
                                <div
                                    class="mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded-sm bg-primary/5 text-primary sm:h-[70px] sm:max-w-[70px]">
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M28 4.7998H3.99998C2.29998 4.7998 0.849976 6.1998 0.849976 7.9498V24.1498C0.849976 25.8498 2.24998 27.2998 3.99998 27.2998H28C29.7 27.2998 31.15 25.8998 31.15 24.1498V7.8998C31.15 6.1998 29.7 4.7998 28 4.7998ZM28 7.0498C28.05 7.0498 28.1 7.0498 28.15 7.0498L16 14.8498L3.84998 7.0498C3.89998 7.0498 3.94998 7.0498 3.99998 7.0498H28ZM28 24.9498H3.99998C3.49998 24.9498 3.09998 24.5498 3.09998 24.0498V9.2498L14.8 16.7498C15.15 16.9998 15.55 17.0998 15.95 17.0998C16.35 17.0998 16.75 16.9998 17.1 16.7498L28.8 9.2498V24.0998C28.9 24.5998 28.5 24.9498 28 24.9498Z"
                                            fill="currentColor"/>
                                    </svg>
                                </div>
                                <div class="w-full">
                                    <h4 class="mb-1 text-xl font-bold text-dark dark:text-dark-9">
                                        Email Address
                                    </h4>
                                    <p class="text-base text-body-color dark:text-dark-8">
                                        {{Aaran\Assets\Config\Application::AppCompanyEmail}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-1/2 xl:w-5/12">
                        <div class="relative rounded-lg bg-white p-8 shadow-lg sm:p-12 dark:bg-dark-2">
                            <form wire:submit.prevent="save">
                                <div class="mb-6">
                                    <input type="text" placeholder="Your Name" wire:model="vname"
                                           class="w-full rounded-sm border border-stroke px-[14px] py-3 text-base text-body-color outline-hidden focus:border-primary dark:border-dark-9 dark:bg-dark-9 dark:text-dark-6"/>
                                    <x-Ui::input.error-text wire:model="vname"/>
                                </div>
                                <div class="mb-6">
                                    <input placeholder="Your Email" wire:model="email"
                                           class="w-full rounded-sm border border-stroke px-[14px] py-3 text-base text-body-color outline-hidden focus:border-primary dark:border-dark-9 dark:bg-dark-9 dark:text-dark-6"/>
                                    <x-Ui::input.error-text wire:model="email"/>
                                </div>
                                <div class="mb-6">
                                    <input type="text" placeholder="Your Phone" wire:model="phone"
                                           class="w-full rounded-sm border border-stroke px-[14px] py-3 text-base text-body-color outline-hidden focus:border-primary dark:border-dark-9 dark:bg-dark-9 dark:text-dark-6"/>
                                    <x-Ui::input.error-text wire:model="phone"/>
                                </div>
                                <div class="mb-6">
                                    <textarea rows="6" placeholder="Your Message" wire:model="message"
                                              class="w-full resize-none rounded-sm border border-stroke px-[14px] py-3 text-base text-body-color outline-hidden focus:border-primary dark:border-dark-9 dark:bg-dark-9 dark:text-dark-6"></textarea>
                                    <x-Ui::input.error-text wire:model="message"/>
                                </div>
                                <div>
                                    <button type="submit"
                                            class="w-full rounded-sm border cursor-pointer border-primary bg-primary p-3 text-white transition hover:bg-primary/70">
                                        Send Message
                                    </button>
                                </div>
                            </form>
                            <div class="hidden sm:block">
              <span class="absolute -right-9 -top-10 z-[-1]">
                <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0 100C0 44.7715 0 0 0 0C55.2285 0 100 44.7715 100 100C100 100 100 100 0 100Z"
                        fill="{{$fill}}"/>
                </svg>
              </span>
                                <span class="absolute -right-10 top-[90px] z-[-1]">
                <svg width="34" height="134" viewBox="0 0 34 134" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="31.9993" cy="132" r="1.66667" transform="rotate(180 31.9993 132)" fill="{{$fill}}"/>
                  <circle cx="31.9993" cy="117.333" r="1.66667" transform="rotate(180 31.9993 117.333)"
                          fill="{{$fill}}"/>
                  <circle cx="31.9993" cy="102.667" r="1.66667" transform="rotate(180 31.9993 102.667)"
                          fill="{{$fill}}"/>
                  <circle cx="31.9993" cy="88" r="1.66667" transform="rotate(180 31.9993 88)" fill="{{$fill}}"/>
                  <circle cx="31.9993" cy="73.3333" r="1.66667" transform="rotate(180 31.9993 73.3333)"
                          fill="{{$fill}}"/>
                  <circle cx="31.9993" cy="45" r="1.66667" transform="rotate(180 31.9993 45)" fill="{{$fill}}"/>
                  <circle cx="31.9993" cy="16" r="1.66667" transform="rotate(180 31.9993 16)" fill="{{$fill}}"/>
                  <circle cx="31.9993" cy="59" r="1.66667" transform="rotate(180 31.9993 59)" fill="{{$fill}}"/>
                  <circle cx="31.9993" cy="30.6666" r="1.66667" transform="rotate(180 31.9993 30.6666)"
                          fill="{{$fill}}"/>
                  <circle cx="31.9993" cy="1.66665" r="1.66667" transform="rotate(180 31.9993 1.66665)"
                          fill="{{$fill}}"/>
                  <circle cx="17.3333" cy="132" r="1.66667" transform="rotate(180 17.3333 132)" fill="{{$fill}}"/>
                  <circle cx="17.3333" cy="117.333" r="1.66667" transform="rotate(180 17.3333 117.333)"
                          fill="{{$fill}}"/>
                  <circle cx="17.3333" cy="102.667" r="1.66667" transform="rotate(180 17.3333 102.667)"
                          fill="{{$fill}}"/>
                  <circle cx="17.3333" cy="88" r="1.66667" transform="rotate(180 17.3333 88)" fill="{{$fill}}"/>
                  <circle cx="17.3333" cy="73.3333" r="1.66667" transform="rotate(180 17.3333 73.3333)"
                          fill="{{$fill}}"/>
                  <circle cx="17.3333" cy="45" r="1.66667" transform="rotate(180 17.3333 45)" fill="{{$fill}}"/>
                  <circle cx="17.3333" cy="16" r="1.66667" transform="rotate(180 17.3333 16)" fill="{{$fill}}"/>
                  <circle cx="17.3333" cy="59" r="1.66667" transform="rotate(180 17.3333 59)" fill="{{$fill}}"/>
                  <circle cx="17.3333" cy="30.6666" r="1.66667" transform="rotate(180 17.3333 30.6666)"
                          fill="{{$fill}}"/>
                  <circle cx="17.3333" cy="1.66665" r="1.66667" transform="rotate(180 17.3333 1.66665)"
                          fill="{{$fill}}"/>
                  <circle cx="2.66536" cy="132" r="1.66667" transform="rotate(180 2.66536 132)" fill="{{$fill}}"/>
                  <circle cx="2.66536" cy="117.333" r="1.66667" transform="rotate(180 2.66536 117.333)"
                          fill="{{$fill}}"/>
                  <circle cx="2.66536" cy="102.667" r="1.66667" transform="rotate(180 2.66536 102.667)"
                          fill="{{$fill}}"/>
                  <circle cx="2.66536" cy="88" r="1.66667" transform="rotate(180 2.66536 88)" fill="{{$fill}}"/>
                  <circle cx="2.66536" cy="73.3333" r="1.66667" transform="rotate(180 2.66536 73.3333)"
                          fill="{{$fill}}"/>
                  <circle cx="2.66536" cy="45" r="1.66667" transform="rotate(180 2.66536 45)" fill="{{$fill}}"/>
                  <circle cx="2.66536" cy="16" r="1.66667" transform="rotate(180 2.66536 16)" fill="{{$fill}}"/>
                  <circle cx="2.66536" cy="59" r="1.66667" transform="rotate(180 2.66536 59)" fill="{{$fill}}"/>
                  <circle cx="2.66536" cy="30.6666" r="1.66667" transform="rotate(180 2.66536 30.6666)"
                          fill="{{$fill}}"/>
                  <circle cx="2.66536" cy="1.66665" r="1.66667" transform="rotate(180 2.66536 1.66665)"
                          fill="{{$fill}}"/>
                </svg>
              </span>
                                <span class="absolute -bottom-7 -left-7 z-[-1]">
                <svg width="107" height="134" viewBox="0 0 107 134" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="104.999" cy="132" r="1.66667" transform="rotate(180 104.999 132)" fill="{{$fill}}"/>
                  <circle cx="104.999" cy="117.333" r="1.66667" transform="rotate(180 104.999 117.333)"
                          fill="{{$fill}}"/>
                  <circle cx="104.999" cy="102.667" r="1.66667" transform="rotate(180 104.999 102.667)"
                          fill="{{$fill}}"/>
                  <circle cx="104.999" cy="88" r="1.66667" transform="rotate(180 104.999 88)" fill="{{$fill}}"/>
                  <circle cx="104.999" cy="73.3333" r="1.66667" transform="rotate(180 104.999 73.3333)"
                          fill="{{$fill}}"/>
                  <circle cx="104.999" cy="45" r="1.66667" transform="rotate(180 104.999 45)" fill="{{$fill}}"/>
                  <circle cx="104.999" cy="16" r="1.66667" transform="rotate(180 104.999 16)" fill="{{$fill}}"/>
                  <circle cx="104.999" cy="59" r="1.66667" transform="rotate(180 104.999 59)" fill="{{$fill}}"/>
                  <circle cx="104.999" cy="30.6666" r="1.66667" transform="rotate(180 104.999 30.6666)"
                          fill="{{$fill}}"/>
                  <circle cx="104.999" cy="1.66665" r="1.66667" transform="rotate(180 104.999 1.66665)"
                          fill="{{$fill}}"/>
                  <circle cx="90.3333" cy="132" r="1.66667" transform="rotate(180 90.3333 132)" fill="{{$fill}}"/>
                  <circle cx="90.3333" cy="117.333" r="1.66667" transform="rotate(180 90.3333 117.333)"
                          fill="{{$fill}}"/>
                  <circle cx="90.3333" cy="102.667" r="1.66667" transform="rotate(180 90.3333 102.667)"
                          fill="{{$fill}}"/>
                  <circle cx="90.3333" cy="88" r="1.66667" transform="rotate(180 90.3333 88)" fill="{{$fill}}"/>
                  <circle cx="90.3333" cy="73.3333" r="1.66667" transform="rotate(180 90.3333 73.3333)"
                          fill="{{$fill}}"/>
                  <circle cx="90.3333" cy="45" r="1.66667" transform="rotate(180 90.3333 45)" fill="{{$fill}}"/>
                  <circle cx="90.3333" cy="16" r="1.66667" transform="rotate(180 90.3333 16)" fill="{{$fill}}"/>
                  <circle cx="90.3333" cy="59" r="1.66667" transform="rotate(180 90.3333 59)" fill="{{$fill}}"/>
                  <circle cx="90.3333" cy="30.6666" r="1.66667" transform="rotate(180 90.3333 30.6666)"
                          fill="{{$fill}}"/>
                  <circle cx="90.3333" cy="1.66665" r="1.66667" transform="rotate(180 90.3333 1.66665)"
                          fill="{{$fill}}"/>
                  <circle cx="75.6654" cy="132" r="1.66667" transform="rotate(180 75.6654 132)" fill="{{$fill}}"/>
                  <circle cx="31.9993" cy="132" r="1.66667" transform="rotate(180 31.9993 132)" fill="{{$fill}}"/>
                  <circle cx="75.6654" cy="117.333" r="1.66667" transform="rotate(180 75.6654 117.333)"
                          fill="{{$fill}}"/>
                  <circle cx="31.9993" cy="117.333" r="1.66667" transform="rotate(180 31.9993 117.333)"
                          fill="{{$fill}}"/>
                  <circle cx="75.6654" cy="102.667" r="1.66667" transform="rotate(180 75.6654 102.667)"
                          fill="{{$fill}}"/>
                  <circle cx="31.9993" cy="102.667" r="1.66667" transform="rotate(180 31.9993 102.667)"
                          fill="{{$fill}}"/>
                  <circle cx="75.6654" cy="88" r="1.66667" transform="rotate(180 75.6654 88)" fill="{{$fill}}"/>
                  <circle cx="31.9993" cy="88" r="1.66667" transform="rotate(180 31.9993 88)" fill="{{$fill}}"/>
                  <circle cx="75.6654" cy="73.3333" r="1.66667" transform="rotate(180 75.6654 73.3333)"
                          fill="{{$fill}}"/>
                  <circle cx="31.9993" cy="73.3333" r="1.66667" transform="rotate(180 31.9993 73.3333)"
                          fill="{{$fill}}"/>
                  <circle cx="75.6654" cy="45" r="1.66667" transform="rotate(180 75.6654 45)" fill="{{$fill}}"/>
                  <circle cx="31.9993" cy="45" r="1.66667" transform="rotate(180 31.9993 45)" fill="{{$fill}}"/>
                  <circle cx="75.6654" cy="16" r="1.66667" transform="rotate(180 75.6654 16)" fill="{{$fill}}"/>
                  <circle cx="31.9993" cy="16" r="1.66667" transform="rotate(180 31.9993 16)" fill="{{$fill}}"/>
                  <circle cx="75.6654" cy="59" r="1.66667" transform="rotate(180 75.6654 59)" fill="{{$fill}}"/>
                  <circle cx="31.9993" cy="59" r="1.66667" transform="rotate(180 31.9993 59)" fill="{{$fill}}"/>
                  <circle cx="75.6654" cy="30.6666" r="1.66667" transform="rotate(180 75.6654 30.6666)"
                          fill="{{$fill}}"/>
                  <circle cx="31.9993" cy="30.6666" r="1.66667" transform="rotate(180 31.9993 30.6666)"
                          fill="{{$fill}}"/>
                  <circle cx="75.6654" cy="1.66665" r="1.66667" transform="rotate(180 75.6654 1.66665)"
                          fill="{{$fill}}"/>
                  <circle cx="31.9993" cy="1.66665" r="1.66667" transform="rotate(180 31.9993 1.66665)"
                          fill="{{$fill}}"/>
                  <circle cx="60.9993" cy="132" r="1.66667" transform="rotate(180 60.9993 132)" fill="{{$fill}}"/>
                  <circle cx="17.3333" cy="132" r="1.66667" transform="rotate(180 17.3333 132)" fill="{{$fill}}"/>
                  <circle cx="60.9993" cy="117.333" r="1.66667" transform="rotate(180 60.9993 117.333)"
                          fill="{{$fill}}"/>
                  <circle cx="17.3333" cy="117.333" r="1.66667" transform="rotate(180 17.3333 117.333)"
                          fill="{{$fill}}"/>
                  <circle cx="60.9993" cy="102.667" r="1.66667" transform="rotate(180 60.9993 102.667)"
                          fill="{{$fill}}"/>
                  <circle cx="17.3333" cy="102.667" r="1.66667" transform="rotate(180 17.3333 102.667)"
                          fill="{{$fill}}"/>
                  <circle cx="60.9993" cy="88" r="1.66667" transform="rotate(180 60.9993 88)" fill="{{$fill}}"/>
                  <circle cx="17.3333" cy="88" r="1.66667" transform="rotate(180 17.3333 88)" fill="{{$fill}}"/>
                  <circle cx="60.9993" cy="73.3333" r="1.66667" transform="rotate(180 60.9993 73.3333)"
                          fill="{{$fill}}"/>
                  <circle cx="17.3333" cy="73.3333" r="1.66667" transform="rotate(180 17.3333 73.3333)"
                          fill="{{$fill}}"/>
                  <circle cx="60.9993" cy="45" r="1.66667" transform="rotate(180 60.9993 45)" fill="{{$fill}}"/>
                  <circle cx="17.3333" cy="45" r="1.66667" transform="rotate(180 17.3333 45)" fill="{{$fill}}"/>
                  <circle cx="60.9993" cy="16" r="1.66667" transform="rotate(180 60.9993 16)" fill="{{$fill}}"/>
                  <circle cx="17.3333" cy="16" r="1.66667" transform="rotate(180 17.3333 16)" fill="{{$fill}}"/>
                  <circle cx="60.9993" cy="59" r="1.66667" transform="rotate(180 60.9993 59)" fill="{{$fill}}"/>
                  <circle cx="17.3333" cy="59" r="1.66667" transform="rotate(180 17.3333 59)" fill="{{$fill}}"/>
                  <circle cx="60.9993" cy="30.6666" r="1.66667" transform="rotate(180 60.9993 30.6666)"
                          fill="{{$fill}}"/>
                  <circle cx="17.3333" cy="30.6666" r="1.66667" transform="rotate(180 17.3333 30.6666)"
                          fill="{{$fill}}"/>
                  <circle cx="60.9993" cy="1.66665" r="1.66667" transform="rotate(180 60.9993 1.66665)"
                          fill="{{$fill}}"/>
                  <circle cx="17.3333" cy="1.66665" r="1.66667" transform="rotate(180 17.3333 1.66665)"
                          fill="{{$fill}}"/>
                  <circle cx="46.3333" cy="132" r="1.66667" transform="rotate(180 46.3333 132)" fill="{{$fill}}"/>
                  <circle cx="2.66536" cy="132" r="1.66667" transform="rotate(180 2.66536 132)" fill="{{$fill}}"/>
                  <circle cx="46.3333" cy="117.333" r="1.66667" transform="rotate(180 46.3333 117.333)"
                          fill="{{$fill}}"/>
                  <circle cx="2.66536" cy="117.333" r="1.66667" transform="rotate(180 2.66536 117.333)"
                          fill="{{$fill}}"/>
                  <circle cx="46.3333" cy="102.667" r="1.66667" transform="rotate(180 46.3333 102.667)"
                          fill="{{$fill}}"/>
                  <circle cx="2.66536" cy="102.667" r="1.66667" transform="rotate(180 2.66536 102.667)"
                          fill="{{$fill}}"/>
                  <circle cx="46.3333" cy="88" r="1.66667" transform="rotate(180 46.3333 88)" fill="{{$fill}}"/>
                  <circle cx="2.66536" cy="88" r="1.66667" transform="rotate(180 2.66536 88)" fill="{{$fill}}"/>
                  <circle cx="46.3333" cy="73.3333" r="1.66667" transform="rotate(180 46.3333 73.3333)"
                          fill="{{$fill}}"/>
                  <circle cx="2.66536" cy="73.3333" r="1.66667" transform="rotate(180 2.66536 73.3333)"
                          fill="{{$fill}}"/>
                  <circle cx="46.3333" cy="45" r="1.66667" transform="rotate(180 46.3333 45)" fill="{{$fill}}"/>
                  <circle cx="2.66536" cy="45" r="1.66667" transform="rotate(180 2.66536 45)" fill="{{$fill}}"/>
                  <circle cx="46.3333" cy="16" r="1.66667" transform="rotate(180 46.3333 16)" fill="{{$fill}}"/>
                  <circle cx="2.66536" cy="16" r="1.66667" transform="rotate(180 2.66536 16)" fill="{{$fill}}"/>
                  <circle cx="46.3333" cy="59" r="1.66667" transform="rotate(180 46.3333 59)" fill="{{$fill}}"/>
                  <circle cx="2.66536" cy="59" r="1.66667" transform="rotate(180 2.66536 59)" fill="{{$fill}}"/>
                  <circle cx="46.3333" cy="30.6666" r="1.66667" transform="rotate(180 46.3333 30.6666)"
                          fill="{{$fill}}"/>
                  <circle cx="2.66536" cy="30.6666" r="1.66667" transform="rotate(180 2.66536 30.6666)"
                          fill="{{$fill}}"/>
                  <circle cx="46.3333" cy="1.66665" r="1.66667" transform="rotate(180 46.3333 1.66665)"
                          fill="{{$fill}}"/>
                  <circle cx="2.66536" cy="1.66665" r="1.66667" transform="rotate(180 2.66536 1.66665)"
                          fill="{{$fill}}"/>
                </svg>
              </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <h2 class="text-2xl sm:text-3xl font-semibold text-center text-gray-800 dark:text-dark-9">
            Find Us on the Map
        </h2>

        <section
            class="sm:w-8/12 w-full mx-auto border mt-8 border-neutral-200 shadow-md shadow-gray-300 mb-12 animate__animated wow bounceInUp"
            data-wow-duration="2s">

            <div class="container mx-auto px-2 py-4">
                <!-- Smaller Responsive Google Map -->
                <div class="relative w-full overflow-hidden mb-4" style="padding-bottom: 40%;">
                    <iframe
                        class="absolute top-0 left-0 w-full h-full"
                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d2748.015641009316!2d80.09336597438879!3d13.081369999166006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2s!5e0!3m2!1sen!2sin!4v1747328712316!5m2!1sen!2sin"
                        frameborder="0"
                        style="border:0;"
                        allowfullscreen=""
                        aria-hidden="false"
                        tabindex="0"
                    ></iframe>
                </div>
                <!-- You can add a contact form or info here -->
            </div>
        </section>


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

                <h2 class="text-2xl font-bold text-center text-green-700 mb-4">Message Sent Successfully!</h2>
                <p class="text-center text-gray-600 mb-6">Thank you for contacting us. We'll be in touch soon.</p>

                <div class="text-sm text-gray-700 space-y-2 bg-gray-50 rounded-lg p-4">
                    <p><span class="font-semibold">Name:&nbsp;&nbsp;</span> {{ $vname }}</p>
                    <p><span class="font-semibold">Email:&nbsp;&nbsp;</span> {{ $email }}</p>
                    <p><span class="font-semibold">Phone:&nbsp;&nbsp;</span> {{ $phone }}</p>
                    <p><span class="font-semibold">Message:&nbsp;&nbsp;</span> {{ $message }}</p>
                </div>


                <div class="mt-6 text-center">
                    <a href="{{ route('home') }}" @click="showDialog = false"
                       class="inline-block bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-6 rounded-lg transition-colors duration-200">
                        OK
                    </a>
                </div>
            </div>
        </div>
    @endif

    <x-Ui::setup.confetti-effect/>
    <x-Ui::web.common.footer-address/>
    <x-Ui::web.common.copyright/>
</div>
