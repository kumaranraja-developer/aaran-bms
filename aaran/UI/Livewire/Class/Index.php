<?php

namespace Aaran\UI\Livewire\Class;

use Livewire\Component;

class Index extends Component
{
    public $blogs = [];

    public $accordions;

    public function getAccordions()
    {
        $this->accordions = [
            [
                'title' => 'What is Pines?',
                'content' => 'Pines is a UI library built for AlpineJS and TailwindCSS.',
            ],
            [
                'title' => 'How do I install Pines?',
                'content' => 'Add AlpineJS and TailwindCSS to your page and then copy and paste any of these elements into your project.',
            ],
            [
                'title' => 'Can I use Pines with other libraries or frameworks?',
                'content' => 'Absolutely! Pines works with any other library or framework. Pines works especially well with the TALL stack.',
            ],
        ];

    }

    public function render()
    {
        $this->getAccordions();

        return view('templates::index');
    }

}
