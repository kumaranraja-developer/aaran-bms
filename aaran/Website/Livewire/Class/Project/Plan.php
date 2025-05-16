<?php

namespace Aaran\Website\Livewire\Class\Project;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Plan extends Component
{
    public mixed $plans;

    public function mount()
    {
        $this->plans = Plan::all();
    }

    #[Layout('Ui::components.layouts.web')]
    public function render()
    {
        return view('website::project.plan');
    }

}
