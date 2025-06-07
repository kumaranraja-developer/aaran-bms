@pushonce('custom-style')

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@11/swiper-bundle.min.css"/>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper@11/swiper-bundle.min.js"></script>

    <style>
        .autoplay-progress {
            position: absolute;
            right: 16px;
            bottom: 16px;
            z-index: 10;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 400;
            color: dodgerblue;
        }

        .autoplay-progress svg {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            stroke-width: 3px;
            stroke: dodgerblue;
            /*var(--swiper-theme-color);*/
            fill: none;
            stroke-dasharray: 125.6;
            transform: rotate(-90deg);
            transition: stroke-dashoffset 0.3s ease;
        }

        /*for progress bar*/
        /*.autoplay-progress-bar {*/
        /*    z-index: 50;*/
        /*}*/

        /*.progress-inner {*/
        /*    width: 0%;*/
        /*}*/

        [data-animatable] {
            opacity: 0;
        }

        .fade-in {
            animation: fadeInDown 0.8s ease forwards;
        }

        .zoom-in {
            animation: zoomIn 0.8s ease forwards;
        }

        .flip-in {
            animation: flipIn 0.8s ease forwards;
        }

        .scale-in {
            animation: scaleIn 0.8s ease forwards;
        }

        @keyframes fadeInDown {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes zoomIn {
            from {
                transform: scale(0.5);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes flipIn {
            from {
                transform: rotateY(90deg);
                opacity: 0;
            }
            to {
                transform: rotateY(0);
                opacity: 1;
            }
        }

        @keyframes scaleIn {
            from {
                transform: scale(0.8);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

    </style>

    <style>
        @keyframes grid {
            0% { transform: translateY(-50%); }
            100% { transform: translateY(0); }
        }
        .animate-grid {
            animation: grid 15s linear infinite;
        }
        .synthwave-grid {
            background-repeat: repeat;
            background-size: 60px 60px;
            height: 300vh;
            inset: 0% 0px;
            margin-left: -50%;
            transform-origin: 100% 0 0;
            width: 600vw;
        }
        :not(.dark) .synthwave-grid-light {
            background-image:
                linear-gradient(to right, rgba(0,0,0,0.6) 1px, transparent 0),
                linear-gradient(to bottom, rgba(0,0,0,0.6) 1px, transparent 0);
        }
        .dark .synthwave-grid-dark {
            background-image:
                linear-gradient(to right, rgba(255,255,255,0.7) 1px, transparent 0),
                linear-gradient(to bottom, rgba(255,255,255,0.7) 1px, transparent 0);
        }
    </style>

@endpushonce

<div class="swiper mySwiper h-screen group">
    <div class="swiper-wrapper">

        @foreach(Aaran\Assets\Helper\SlideQuotes::all() as $slide)
            <div class="swiper-slide {{ $slide['color']['bg'] }}" data-in="fade-in">
                <div class="h-screen flex items-center justify-center w-full animate__animated wow animate__bounceInDown">
                    <div class="text-center space-y-6" data-animatable>
                        <h1
                            class="fade-in mx-auto max-w-7xl font-display caveat-brush-regular text-5xl font-medium tracking-tight text-slate-900 sm:text-7xl">
                            {!! Aaran\Assets\Helper\SlideQuotes::highlightKeyword($slide['h1'], $slide['color']) !!}

                        </h1>

                        @foreach($slide['p'] as $para)
                            <p class="text-xl text-neutral-600" data-animatable>{{ $para }}</p>
                        @endforeach

                        <div class="mt-10 flex justify-center gap-x-6" data-animatable>

                            <div x-data="{ angle: 40 }" class="relative min-h-[420px] flex flex-col items-center justify-center w-full h-full overflow-hidden border-0" x-cloak>

                                <a class="group inline-flex items-center justify-center rounded-full py-3 px-6 text-lg font-semibold focus:outline-hidden focus-visible:outline-2
                            focus-visible:outline-offset-2 bg-primary
                             text-white hover:bg-orange-400 hover:text-slate-100 active:bg-orange-800 active:text-slate-300 focus-visible:outline-orange-900"
                                   href="{{ route('plan-details') }}">
                                    Get {{Aaran\Assets\Config\Application::AppTrialPeriod}} free
                                </a>

                                <div class="absolute inset-0 w-full h-full overflow-hidden opacity-50 pointer-events-none" style="perspective: 300px;">
                                    <div class="absolute inset-0" :style="{ transform: `rotateX(${angle}deg)` }">
                                        <div class="animate-grid synthwave-grid synthwave-grid-light synthwave-grid-dark"></div>
                                    </div>
{{--                                    <div class="absolute inset-0 bg-gradient-to-t from-white to-transparent to-90% dark:from-black"></div>--}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-pagination"></div>
    <div class="autoplay-progress">
        <svg viewBox="0 0 48 48">
            <circle cx="24" cy="24" r="20"></circle>
        </svg>
        <span></span>
    </div>
</div>


<script>
    const progressCircle = document.querySelector('.autoplay-progress circle');
    const progressContent = document.querySelector('.autoplay-progress span');

    const animateSlide = (slide) => {
        const animType = slide.dataset.in || 'fade-in';
        const animatables = slide.querySelectorAll('[data-animatable]');
        animatables.forEach((el, index) => {
            el.classList.remove('fade-in', 'zoom-in', 'flip-in', 'scale-in');
            el.style.animationDelay = `${index * 0.2}s`; // Staggered animation
            el.classList.add(animType);
        });
    };

    const swiper = new Swiper('.mySwiper', {
        loop: true,
        autoplay: {
            delay: 6000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        on: {
            slideChangeTransitionEnd: function () {
                const currentSlide = swiper.slides[swiper.activeIndex];
                animateSlide(currentSlide);
            },
            autoplayTimeLeft(s, time, progress) {
                if (progressCircle && progressContent) {
                    const offset = 125.6 * (1 - progress);
                    progressCircle.style.strokeDashoffset = offset;
                    progressContent.textContent = `${Math.ceil(time / 1000)}s`;
                }
            },
        }
    });

    // Initial animation
    window.addEventListener('DOMContentLoaded', () => {
        animateSlide(swiper.slides[swiper.activeIndex]);
    });
</script>
