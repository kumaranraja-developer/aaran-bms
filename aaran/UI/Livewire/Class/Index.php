<?php

namespace Aaran\UI\Livewire\Class;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $components = [
            [
                'title' => 'Accordion',
                'slug' => 'accordion',
                'description' => 'Different types of accordions.',
                'image' => asset('/storage/ui/accordion.png'),
            ],
            // Add more component entries here
        ];

        return view('show::index', compact('components'));
    }
}
