<?php

namespace Aaran\ExternalPartners\Razorpay\Livewire\Class;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SubscriptionPayment extends Component
{
    public string $plan;
    public int $amount;
    public string $tenantId;

    public mixed $razorpayKey;
    public string $userName;
    public string $userEmail;

    public function mount(Request $request)
    {
        $this->plan = $request->get('plan', 'default-plan'); // or any default string

        $this->amount = (int)$request->get('amount');
//        $this->tenantId = $request->get('tenant_id', session('tenant_id'));
//
//        $this->razorpayKey = config('razorpay.razorpay.key');
//        $this->userName = auth()->user()->name;
//        $this->userEmail = auth()->user()->email;
        // Handle both new and authenticated users
        $user = auth()->user();

        if ($user) {
            // Existing user: get values from auth and session
            $this->userName = $user->name;
            $this->userEmail = $user->email;
            $this->tenantId = $request->get('tenant_id', session('tenant_id'));
        } else {
            // New user: fall back to request input
            $this->userName = $request->get('name', session('new_user_name'));
            $this->userEmail = $request->get('email',  session('new_user_email'));
            $this->tenantId = $request->get('tenant_id', '');
        }

        $this->razorpayKey = config('razorpay.razorpay.key');
    }
    protected $listeners = ['paymentSuccess' => 'handlePaymentSuccess','paymentFailed' => 'handlePaymentFailed',];

    public function handlePaymentSuccess($paymentId, $email)
    {
        DB::table('client_register')
            ->where('email', $email)
            ->update(['payment_status' => 'completed', 'payment_id' => $paymentId]);

        session()->flash('status', 'Payment successful!');
    }
    public function handlePaymentFailed($paymentId, $email)
    {
        DB::table('client_register')
            ->where('email', $email)
            ->update(['payment_status' => 'failed', 'payment_id' => $paymentId]);

        \Log::warning('Payment verification failed for email: ' . $email);
    }


    public function render()
    {
        return view('razorpay::subscription-payment');
    }
}
