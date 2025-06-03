@props([
    'brand',])

<span class="inline-flex justify-center items-center">
      <svg fill="none" viewBox="0 0 24 24" {{ $attributes->merge(['class' => 'w-5 h-auto block  hover:scale-110']) }}>
@switch($brand)

              @case('facebook')
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        d="M9.5 22.5h4v-9h3l1 -4h-4v-2a2 2 0 0 1 2 -2h2v-4h-4a4 4 0 0 0 -4 4v4h-3v4h3v9Z"
                        stroke-width="2"></path>
                  @break

              @case('x')
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        d="M17.2705 22.464 1.5 1.53589h5.22951L22.5 22.464h-5.2295Z" stroke-width="1"></path>
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        d="m21.7578 1.53589 -8.313 8.91461"
                        stroke-width="1"></path>
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        d="m2.24207 22.464 8.30673 -8.9078"
                        stroke-width="2"></path>
                  @break

              @case('youtube')
                  <path stroke="currentColor" stroke-linejoin="round"
                        d="M1.5 12c0 -1.477 0.071 -2.87 0.164 -4.038 0.14 -1.764 1.538 -3.12 3.303 -3.243C6.663 4.6 8.98 4.5 12 4.5c3.02 0 5.337 0.1 7.033 0.219 1.765 0.123 3.163 1.48 3.303 3.243 0.093 1.169 0.164 2.56 0.164 4.038 0 1.53 -0.076 2.969 -0.174 4.163a3.374 3.374 0 0 1 -3.166 3.121c-1.713 0.117 -4.11 0.216 -7.16 0.216s-5.447 -0.099 -7.16 -0.216a3.374 3.374 0 0 1 -3.166 -3.121A51.642 51.642 0 0 1 1.5 12Z"
                        stroke-width="1"></path>
                  <path stroke="currentColor" stroke-linejoin="round" d="M10 15V9l5.5 3 -5.5 3Z"
                        stroke-width="2"></path>
                  @break

              @case('discord')
                  <path stroke="currentColor" stroke-linejoin="round"
                        d="M7 12.75a1.5 1.75 0 1 0 3 0 1.5 1.75 0 1 0 -3 0"
                        stroke-width="1"></path>
                  <path stroke="currentColor" stroke-linejoin="round"
                        d="M14 12.75a1.5 1.75 0 1 0 3 0 1.5 1.75 0 1 0 -3 0"
                        stroke-width="1"></path>
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        d="M9.5 5.5S10.58 5 12 5s2.5 0.5 2.5 0.5L15 4c1.755 0 3.06 0.293 4.5 1 1 1.667 3 6.4 3 12 -1.864 1.924 -3.304 2.736 -5.5 3l-1.5 -2.5c-0.5 0.167 -1.9 0.5 -3.5 0.5s-3 -0.333 -3.5 -0.5L7 20c-2.196 -0.264 -3.636 -1.076 -5.5 -3 0 -5.6 2 -10.333 3 -12C5.94 4.293 7.245 4 9 4l0.5 1.5Z"
                        stroke-width="1"></path>
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        d="M8.5 17.5c-1.086 -0.277 -2 -1 -2 -1"
                        stroke-width="1"></path>
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        d="M15.5 17.5c1.086 -0.277 2 -1 2 -1"
                        stroke-width="2"></path>
                  @break

              @case('instagram')
                  <path stroke="currentColor" stroke-linejoin="round" d="M18 6.5a0.5 0.5 0 0 1 0 -1"
                        stroke-width="1"></path>
                  <path stroke="currentColor" stroke-linejoin="round" d="M18 6.5a0.5 0.5 0 0 0 0 -1"
                        stroke-width="1"></path>
                  <path stroke="currentColor" stroke-linejoin="round" d="M7 12a5 5 0 1 0 10 0 5 5 0 1 0 -10 0"
                        stroke-width="1"></path>
                  <path stroke="currentColor"
                        d="M16.5 1.5h-9a6 6 0 0 0 -6 6v9a6 6 0 0 0 6 6h9a6 6 0 0 0 6 -6v-9a6 6 0 0 0 -6 -6Z"
                        stroke-width="2"></path>
                  @break

              @case('linkedin')
                  <path stroke="currentColor" stroke-linejoin="round"
                        d="M1.5 12a10.5 10.5 0 1 0 21 0 10.5 10.5 0 1 0 -21 0"
                        stroke-width="1"></path>
                  <path stroke="currentColor" stroke-linejoin="round" d="M6.25 17V7h2.5v10h-2.5Z"
                        clip-rule="evenodd"
                        stroke-width="1"></path>
                  <path stroke="currentColor" stroke-linejoin="round"
                        d="M10.75 17h2.5v-3.75a1.5 1.5 0 0 1 3 0V17h2.5v-3.75a4 4 0 0 0 -5.5 -3.71v-0.29h-2.5V17Z"
                        stroke-width="2"></path>
                  @break

              @case('whatsapp')
                  <path stroke="currentColor" stroke-linejoin="round"
                        d="M17 16.5c-1.74 1.74 -5.749 0.257 -7.753 -1.747C7.243 12.749 5.76 8.74 7.5 7c0.504 -0.504 1.198 -0.564 1.622 -0.544 0.245 0.011 0.457 0.155 0.6 0.355l0.952 1.334a1 1 0 0 1 -0.107 1.288l-0.901 0.901c0.166 0.5 0.7 1.7 1.5 2.5s2 1.334 2.5 1.5l0.901 -0.9a1 1 0 0 1 1.288 -0.108l1.334 0.952c0.2 0.143 0.344 0.355 0.355 0.6 0.02 0.424 -0.04 1.118 -0.544 1.622Z"
                        stroke-width="1"></path>
                  <path stroke="currentColor" stroke-linejoin="round"
                        d="M12 22.5c5.799 0 10.5 -4.701 10.5 -10.5S17.799 1.5 12 1.5 1.5 6.201 1.5 12c0 1.912 0.511 3.706 1.405 5.25l-0.88 4.725 4.725 -0.88A10.452 10.452 0 0 0 12 22.5Z"
                        stroke-width="2"></path>

                  @break

              @case('c')
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        d="M14.504 13.93a3.141 3.141 0 1 1 0 -3.86L17.25 8.5a6.283 6.283 0 1 0 0 7l-2.746 -1.57Z"
                        stroke-width="1"></path>
                  <path stroke="currentColor" stroke-linejoin="round"
                        d="m2.966 6.706 8.5 -5.369a1 1 0 0 1 1.068 0l8.5 5.369a1 1 0 0 1 0.466 0.845v8.898a1 1 0 0 1 -0.466 0.845l-8.5 5.369a1 1 0 0 1 -1.068 0l-8.5 -5.369a1 1 0 0 1 -0.466 -0.845V7.55a1 1 0 0 1 0.466 -0.845Z"
                        stroke-width="2"></path>
                  @break


              @case('google')
                  <path stroke="currentColor" stroke-linejoin="round"
                        d="M16 7.005A6.082 6.082 0 0 0 12 5.5c-3.452 0 -6.25 2.91 -6.25 6.5s2.798 6.5 6.25 6.5c2.78 0 5.137 -1.889 5.949 -4.5H12.5v-4h9.564c0.122 0.648 0.186 1.316 0.186 2 0 5.799 -4.59 10.5 -10.25 10.5S1.75 17.799 1.75 12 6.34 1.5 12 1.5c2.625 0 5.02 1.01 6.832 2.673L16 7.005Z"
                        stroke-width="1"></path>
                  <path stroke="currentColor" stroke-linejoin="round" d="m15.695 17.243 3.137 2.584"
                        stroke-width="1"></path>
                  <path stroke="currentColor" stroke-linejoin="round" d="m6.051 14 -3.244 2.649"
                        stroke-width="1"></path>
                  <path stroke="currentColor" stroke-linejoin="round" d="M6.051 10 2.807 7.35"
                        stroke-width="2"></path>
                  @break

              @case('message')
                  <path stroke="currentColor" stroke-linejoin="round"
                        d="M12 20.5c5.799 0 10.5 -4.03 10.5 -9s-4.701 -9 -10.5 -9 -10.5 4.03 -10.5 9c0 3.13 1.865 5.888 4.694 7.5 0 1.412 -1.694 3 -1.694 3 1.211 0.136 3.87 -0.034 4.817 -1.797 0.856 0.194 1.756 0.297 2.683 0.297Z"
                        stroke-width="2"></path>
                  @break

              @default
                  Default case...

          @endswitch
    </svg>
</span>
