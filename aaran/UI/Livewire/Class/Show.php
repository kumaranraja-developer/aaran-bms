<?php

namespace Aaran\UI\Livewire\Class;

use Livewire\Component;

class Show extends Component
{
    public string $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $items = match($this->slug) {
            'accordion' => [
                ['question' => 'What is Laravel?', 'answer' => 'A PHP framework.'],
                ['question' => 'What is Livewire?', 'answer' => 'Full-stack for Laravel.'],
            ],
            default => [],
        };

        return view('/ui/{slug}::show', compact('items'))->with('slug', $this->slug);
    }
}
