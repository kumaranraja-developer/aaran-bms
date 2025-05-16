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
            (object)['icon' => '/images/home/wp1.webp', 'title' => 'CRM', 'description' => 'Comprehensive CRM platform for customer-facing teams.'],
            (object)['icon' => '/images/home/wp1.webp', 'title' => 'CRM', 'description' => 'Comprehensive CRM platform for customer-facing teams.'],

        ];
        $this->upcoming = [
            (object)['icon' => '/images/home/wp1.webp', 'title' => 'Social', 'description' => 'Comprehensive CRM platform for customer-facing teams.'],
            (object)['icon' => '/images/home/wp1.webp', 'title' => 'Sites', 'description' => 'Comprehensive CRM platform for customer-facing teams.Comprehensive CRM platform for customer-facing teams.'],
            (object)['icon' => '/images/home/wp1.webp', 'title' => 'Landing Page', 'description' => 'Comprehensive CRM platform for customer-facing teams.Comprehensive CRM platform for customer-facing teams.'],
            (object)['icon' => '/images/home/wp1.webp', 'title' => 'Commerce', 'description' => 'Comprehensive CRM platform for customer-facing teams.Comprehensive CRM platform for customer-facing teams.'],
            (object)['icon' => '/images/home/wp1.webp', 'title' => 'Desk', 'description' => 'Comprehensive CRM platform for customer-facing teams.'],
            (object)['icon' => '/images/home/wp1.webp', 'title' => 'Booking', 'description' => 'Comprehensive CRM platform for customer-facing teams.'],
            (object)['icon' => '/images/home/wp1.webp', 'title' => 'Show', 'description' => 'Comprehensive CRM platform for customer-facing teams.Comprehensive CRM platform for customer-facing teams.'],

        ];

    }

    #[Layout('Ui::components.layouts.web')]
    public function render()
    {

        return view('website::project.index');
    }

}
