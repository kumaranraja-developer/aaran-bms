<div class="h-screen">
<x-slot name="header">Payment</x-slot>
    <div
        x-data="{
        async pay() {
            try {
                // Step 1: Get order ID from server
                const response = await fetch('{{ route('razorpay.createOrder') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        amount: {{ $amount * 100 }},
                        currency: 'INR',
                        receipt: 'receipt_{{ uniqid() }}'
                    })
                });

                const { order_id } = await response.json();

                // Step 2: Launch Razorpay
                const options = {
                    key: '{{ $razorpayKey }}',
                    amount: '{{ $amount * 100}}',
                    currency: 'INR',
                    name: 'CODEXSUN',
                    description: 'Subscription: {{ ucfirst($plan) }}',
                    order_id: order_id,
                    handler: async function (response) {
                        const verifyResponse = await fetch('{{ route('razorpay.verify') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify(response)
                        });

                        const result = await verifyResponse.json();
                        if (result.success) {
                            Livewire.emit('paymentSuccess', response.razorpay_payment_id, '{{ $userEmail }}');
                            window.location.href = '{{ route('payment.success') }}';
                            alert('Payment verification Completed!');
                        } else {
                            Livewire.emit('paymentFailed', response.razorpay_payment_id, '{{ $userEmail }}');
                            alert('Payment verification failed!');
                        }
                    },
                    prefill: {
                        name: '{{ $userName }}',
                        email: '{{ $userEmail }}',
                    },
                    theme: {
                        color: '#0d6efd'
                    }
                };

                const rzp = new Razorpay(options);
                rzp.open();
            } catch (e) {
                console.error('Payment error', e);
                alert('Payment could not be initiated.');
            }
        }
    }"
        x-init="pay()"
        class=""
    >
        <div class="absolute p-10 text-center  shadow rounded max-w-md mx-auto mt-10 bg-white top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <h1 class="text-xl font-semibold mb-4 text-black">
                Processing Payment<span class="dots"></span>
            </h1>


            <p class="text-gray-600">Launching Razorpay Checkout. Please wait.</p>
        </div>

    </div>
    <style>
        .dots::after {
            content: '';
            width: 1ch;
            text-align: left;
            animation: dots-typing 1s steps(4, end) infinite;
            white-space: nowrap;
            overflow: hidden;
        }

        @keyframes dots-typing {
            0%   { content: ''; }
            25%  { content: '.'; }
            50%  { content: '..'; }
            75%  { content: '...'; }
            100% { content: ''; }
        }

    </style>
</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

