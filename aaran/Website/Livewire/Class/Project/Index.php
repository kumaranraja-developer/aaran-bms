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
            (object)['icon' => '/images/web/home/img1.jpg', 'title' => 'CRM', 'description' => 'Comprehensive CRM platform for customer-facing teams.'],
            (object)['icon' => '/images/web/home/img1.jpg', 'title' => 'CRM', 'description' => 'Comprehensive CRM platform for customer-facing teams.'],

        ];
        $this->upcoming = [
            (object)['icon' => '/images/web/home/img1.jpg', 'title' => 'Social', 'description' => 'Comprehensive CRM platform for customer-facing teams.'],
            (object)['icon' => '/images/web/home/img1.jpg', 'title' => 'Sites', 'description' => 'Comprehensive CRM platform for customer-facing teams.Comprehensive CRM platform for customer-facing teams.'],
            (object)['icon' => '/images/web/home/img1.jpg', 'title' => 'Landing Page', 'description' => 'Comprehensive CRM platform for customer-facing teams.Comprehensive CRM platform for customer-facing teams.'],
            (object)['icon' => '/images/web/home/img1.jpg', 'title' => 'Commerce', 'description' => 'Comprehensive CRM platform for customer-facing teams.Comprehensive CRM platform for customer-facing teams.'],
            (object)['icon' => '/images/web/home/img1.jpg', 'title' => 'Desk', 'description' => 'Comprehensive CRM platform for customer-facing teams.'],
            (object)['icon' => '/images/web/home/img1.jpg', 'title' => 'Booking', 'description' => 'Comprehensive CRM platform for customer-facing teams.'],
            (object)['icon' => '/images/web/home/img1.jpg', 'title' => 'Show', 'description' => 'Comprehensive CRM platform for customer-facing teams.Comprehensive CRM platform for customer-facing teams.'],

        ];

    }

    #[Layout('Ui::components.layouts.web')]
    public function render()
    {

        return view('website::project.index');
    }

}
