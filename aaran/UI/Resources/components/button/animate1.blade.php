@props([
    'label' => ''
])
<div>
    <style>
        .ripple-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            transform: scale(0);
            animation: rippleGrowSmall 0.6s ease-out forwards;
            pointer-events: none;
        }

        @keyframes rippleGrowSmall {
            to {
                transform: scale(1.5);
                opacity: 0;
            }
        }
    </style>

    <button
        id="rippleArrowBtn" {{ $attributes->merge([ 'class' => 'relative shrink-0 overflow-hidden select-none px-6 py-3 bg-blue-500

                              rounded text-xs font-medium uppercase leading-normal
                              text-white shadow-[0_4px_9px_-4px_#3b71ca]
                              hover:bg-blue-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]
                              focus:bg-blue-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]
                              focus:outline-none focus:ring-0
                              active:bg-blue-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]
                              dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]
                              dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]
                              dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                text-white rounded flex items-center group cursor-pointer']) }}>
                          <span
                              class="relative z-10 block transition-transform transition-opacity duration-500 ease-in-out
                              group-hover:translate-x-7 group-hover:opacity-0"
                          >
                            {{$label}}
                          </span>

        <svg class="absolute left-6 top-1/2 w-6 h-6 text-white opacity-0 transform -translate-y-1/2 -translate-x-4 transition-all
            duration-500 ease-in-out group-hover:opacity-100 group-hover:translate-x-0"
            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
        >
{{--            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>--}}
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
        </svg>
    </button>

    <script>
        const btn = document.getElementById('rippleArrowBtn');

        btn.addEventListener('click', function (e) {
            const rect = btn.getBoundingClientRect();

            const circle = document.createElement('span');
            circle.classList.add('ripple-circle');

            // Smaller ripple size: 40% of max button dimension
            const size = Math.max(rect.width, rect.height) * 0.5;
            circle.style.width = circle.style.height = size + 'px';

            // Position at click
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            circle.style.left = x + 'px';
            circle.style.top = y + 'px';

            btn.appendChild(circle);

            circle.addEventListener('animationend', () => {
                circle.remove();
            });
        });
    </script>
</div>
