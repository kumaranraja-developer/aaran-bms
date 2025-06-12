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
                'description' => 'Accordion is a collapsible component used to show and hide grouped content.',
                'image' => asset('/storage/ui/accordion.png'),
            ],
            [
                'title' => 'Banner',
                'slug' => 'banner',
                'description' => 'Banners are UI components used to display important messages or updates.
                    They typically appear at the top of the page with brief text and an action..',
                'image' => asset('/storage/ui/banner.png'),
            ],
            // Add more component entries here
        ];

        return view('show::index', compact('components'));
    }
}
