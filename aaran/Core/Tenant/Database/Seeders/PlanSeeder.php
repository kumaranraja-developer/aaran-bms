<?php

namespace Aaran\Core\Tenant\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        $features = [

            ['vname' => 'Basic',
                'tag' => 'Required',
                'price' => '750',
                'billing_cycle' => 'monthly',
                'description' => 'For freelancers & beginners. Simple GST billing to get you started.',
                'active_id' => true
            ],
            ['vname' => 'Small Business',
                'tag' => 'Most Popular',
                'price' => '1500',
                'billing_cycle' => 'monthly',
                'description' => 'For growing businesses. More users, smart reports, and inventory tools.',
                'active_id' => true
            ],
            ['vname' => 'Enterprises',
                'tag' => 'Premium',
                'price' => '3000',
                'billing_cycle' => 'monthly',
                'description' => 'For power users. Full features, advanced insights, and payroll.',
                'active_id' => true
            ],
            ['vname' => 'Elite',
                'tag' => 'Exclusive',
                'price' => '-1',
                'billing_cycle' => 'monthly',
                'description' => 'For unique needs. Tailored tools, custom access, and support.',
                'active_id' => true
            ],
        ];

        DB::table('plans')->insert($features);
    }
}
