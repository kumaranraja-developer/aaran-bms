<?php

namespace Aaran\UI\Livewire\Class;

use Livewire\Component;

class Show extends Component
{

    public string $slug;

    public bool $bannerVisible = false;
    public string $bannerType = 'calltoaction';

    public function mount($slug)
    {


        $this->slug = $slug;


    }
    public function showBanner($type){

        $this->bannerType = $type;
        $this->bannerVisible = true;

    }
    public function render()
    {
        $items = match ($this->slug) {
            'accordion' => [
                ['question' => 'What is Laravel?', 'answer' => 'A PHP framework.'],
                ['question' => 'What is Livewire?', 'answer' => 'Full-stack for Laravel.'],
            ],
            default => [],
        };

        $slug = $this->slug;
        $bannerVisible = $this->bannerVisible;
        $bannerType = $this->bannerType;

        return view('show::show', compact('items','slug','bannerVisible','bannerType')
        );
    }

}
