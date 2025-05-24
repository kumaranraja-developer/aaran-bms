<?php

namespace Aaran\Website\Livewire\Class\Home;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Faq extends Component
{
    #[Layout('Ui::components.layouts.web')]
    public function render()
    {
        return view('website::home.faq');
    }

}
