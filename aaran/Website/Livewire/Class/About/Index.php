<?php

namespace Aaran\Website\Livewire\Class\About;

use Aaran\Assets\Enums\Active;
use Aaran\Website\Models\DevTeam;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('Ui::components.layouts.web')]
    public function render()
    {
        $team= DevTeam::where('active_id', Active::ACTIVE)->get();

        $quotes=[
            ['quote'=>"Your GST billing software has made a real difference in how we manage our accounts. It's simple to use, accurate, and has helped us save a lot of time on paperwork. Highly recommend it for any manufacturing business looking for a reliable solution.",'name'=>'Sivasubramaniyan','job'=>'UPVC Manufacturing Company'],
            ['quote'=>"We were looking for a streamlined CRM and billing tool, and this software exceeded our expectations. The team was supportive during setup, and the live sales tracking feature gives us clear visibility on our daily performance. Excellent for businesses that value efficiency.",'name'=>'Vijayanand','job'=>'Tech Media (Electronics Retailer)'],
            ['quote'=>"Billing was always a hassle at our store, especially with GST. Since using this software, things have become smooth and error-free. The customer support team is also very responsive. It's been a great help to our small business.",'name'=>'Veera','job'=>'Veera Enterprises (Paint & Hardware Shop)
'],
            ['quote'=>"I was impressed by how well the software fits even a printing business like ours. Invoices, customer records, and reports are all organized in one place now. Very user-friendly and tailored to real business needs.",'name'=>'Kala Rani','job'=>'SK Printers']
        ];
        return view('website::about.index',compact('team'),compact('quotes'));
    }

}
