<?php

namespace Aaran\Website\Database\Seeders;

use Aaran\Website\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $teams = [
            [
                'vname' => 'Mr.S.Sivasubramaniyan',
                'company' => 'SMS UPVC Manufacturer',
                'photo' => 'sms.jpg',
                'testimonial' => "Your GST billing software has made a real difference in how we manage our accounts. It's simple to use, accurate, and has helped us save a lot of time on paperwork. Highly recommend it for any manufacturing business looking for a reliable solution.",
                'address' => 'Chennai',
                'cities' => 'Chennai',
                'active_id' => 1,
            ],
            [
                'vname' => 'Mr.Vijayanand',
                'company' => 'Tech Media',
                'photo' => 'techmedia.jpg',
                'testimonial' => "We were looking for a streamlined CRM and billing tool, and this software exceeded our expectations. The team was supportive during setup, and the live sales tracking feature gives us clear visibility on our daily performance. Excellent for businesses that value efficiency.",
                'address' => 'Tiruppur',
                'cities' => 'Tiruppur',
                'active_id' => 1,
            ],
            [
                'vname' => 'Mrs.Kala Rani',
                'company' => 'SK Printers',
                'photo' => 'sk_printers.jpg',
                'testimonial' => "I was impressed by how well the software fits even a printing business like ours. Invoices, customer records, and reports are all organized in one place now. Very user-friendly and tailored to real business needs.",
                'address' => 'Tiruppur',
                'cities' => 'Tiruppur',
                'active_id' => 1,
            ],
            [
                'vname' => 'Mrs.Veerapandian',
                'company' => 'Veera Enterprises',
                'photo' => 'veera.jpg',
                'testimonial' => "Billing was always a hassle at our store, especially with GST. Since using this software, things have become smooth and error-free. The customer support team is also very responsive. It's been a great help to our small business.",
                'address' => 'Shengottai',
                'cities' => 'Shengottai',
                'active_id' => 1,
            ],

        ];

        foreach ($teams as $team) {
            Testimonial::create($team);
        }
    }
}
