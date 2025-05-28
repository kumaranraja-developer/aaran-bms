<?php

namespace Aaran\Website\Livewire\Class\Contact;

use Aaran\Website\Models\Testimonial;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ClientRegister extends Component
{
//    public mixed $team;
//    public mixed $quotes;
//    public function mount()
//    {
//
//    }
 public $testimonials;

    public function __construct(){
        $this->testimonials = Testimonial::latest()->take(5)->get();
    }


    #[Layout('Ui::components.layouts.web')]
    public function render()
    {

        $quotes = [
            ['quote' => "Your GST billing software has made a real difference in how we manage our accounts. It's simple to use, accurate, and has helped us save a lot of time on paperwork. Highly recommend it for any manufacturing business looking for a reliable solution.",
                'name' => 'Mr.S.Sivasubramaniyan',
                'job' => 'UPVC Manufacturing Company',
                'location' => 'Chennai'],

            ['quote' => "We were looking for a streamlined CRM and billing tool, and this software exceeded our expectations. The team was supportive during setup, and the live sales tracking feature gives us clear visibility on our daily performance. Excellent for businesses that value efficiency.",
                'name' => 'Mr.Vijayanand',
                'job' => 'Tech Media Retail (Computer Hardware store)',
                'location' => 'Tiruppur'],

            ['quote' => "I was impressed by how well the software fits even a printing business like ours. Invoices, customer records, and reports are all organized in one place now. Very user-friendly and tailored to real business needs.",
                'name' => 'Mrs.Kala Rani',
                'job' => 'SK Printers',
                'location' => 'Tiruppur'],


//            ['quote' => "I was impressed by how well the software fits even a printing business like ours. Invoices, customer records, and reports are all organized in one place now. Very user-friendly and tailored to real business needs.",
//                'name' => 'Mr. M.Sathishkumar',
//                'job' => 'Sri Gapathi Printers',
//                'location' => 'Tiruppur'],

            ['quote' => "Billing was always a hassle at our store, especially with GST. Since using this software, things have become smooth and error-free. The customer support team is also very responsive. It's been a great help to our small business.",
                'name' => 'Veera',
                'job' => 'Veera Enterprises (Painting Shop)',
                'location' => 'Shengottai'],


        ];
        return view('website::contact.client-register',compact('quotes'));
    }

}
