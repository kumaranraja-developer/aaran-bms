<?php

namespace Aaran\Website\Database\Seeders;

use Aaran\Website\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'Is the subscription fee refundable?',
                'answer' => 'Yes, we offer a 100% refund on annual plans if requested within the first 7 days.',
                'is_static' => true,
                'is_answered' => true,
            ],
            [
                'question' => 'Can I transfer my subscription to another business?',
                'answer' => 'Yes, you can transfer your subscription to another business under certain plans.',
                'is_static' => true,
                'is_answered' => true,
            ],
            [
                'question' => 'How many users can I add?',
                'answer' => 'You can add as many as your plan allows. Contact support for higher limits.',
                'is_static' => true,
                'is_answered' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create([
                'question' => $faq['question'],
                'answer' => $faq['answer'],
                'is_static' => $faq['is_static'],
                'is_answered' => $faq['is_answered'],
            ]);
        }
    }
}
