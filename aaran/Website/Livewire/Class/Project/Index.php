<?php

namespace Aaran\Website\Livewire\Class\Project;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    public array $featured;
    public array $upcoming;


    public function mount()
    {
        $this->featured = [
            (object)['icon' => '/images/web/home/crm.svg', 'title' => 'Customer Relation Management software', 'description' => 'Manage customer relationships, track leads, and streamline sales in one simple platform.'],
            (object)['icon' => '/images/web/home/gst.svg', 'title' => 'GST Billing software', 'description' => 'Easy GST billing, tax management, and real-time financial tracking for your business.'],

        ];
        $this->upcoming = [
            (object)['icon' => '/images/web/home/social.svg', 'title' => 'Social', 'description' => 'Manage and schedule your social media content from one easy-to-use dashboard.'],
            (object)['icon' => '/images/web/home/site.svg', 'title' => 'Sites', 'description' => 'Create fast, responsive, and professional websites with ease.'],
            (object)['icon' => '/images/web/home/landingPage.svg', 'title' => 'Landing Page', 'description' => 'Build high-converting landing pages to capture leads and drive sales.'],
            (object)['icon' => '/images/web/home/ecommerce.svg', 'title' => 'Commerce', 'description' => 'Launch and manage your online store with secure, scalable e-commerce tools.'],
//            (object)['icon' => '/images/web/home/img1.jpg', 'title' => 'Desk', 'description' => 'Comprehensive CRM platform for customer-facing teams.'],
            (object)['icon' => '/images/web/home/booking.svg', 'title' => 'Booking', 'description' => 'Enable seamless appointment scheduling with real-time booking management.'],
            (object)['icon' => '/images/web/home/show.svg', 'title' => 'Show', 'description' => 'Showcase your products or portfolio beautifully with customizable presentation tools.'],

        ];

    }

    #[Layout('Ui::components.layouts.web')]
    public function render()
    {

        return view('website::project.index');
    }

}
