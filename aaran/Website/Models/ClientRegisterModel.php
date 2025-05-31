<?php

namespace Aaran\Website\Models;
use Aaran\BMS\Billing\Common\Database\Factories\CityFactory;
use Aaran\Website\Livewire\Class\ClientRegister\ClientRegister;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientRegisterModel extends Model
{
//    use HasFactory;


    protected $table = 'client_register'; // Ensure this is correct

    protected $guarded = [];

    public $timestamps = true;

    public function handlePaymentSuccess($razorpayPaymentId)
    {
        // Validate or confirm payment with Razorpay here (optional)

        // Update payment status in client_register table
        $client = ClientRegister::where('email', $this->userEmail)->first();

        if ($client) {
            $client->payment = 'done'; // or whatever status you're using
            $client->save();
        }

        // You can also emit an event, redirect, or show a success message
        session()->flash('status', 'Payment successful and status updated!');
    }

    protected static function newFactory(): CityFactory
    {
        return new CityFactory();
    }
}
