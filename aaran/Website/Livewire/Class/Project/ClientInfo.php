<?php

namespace Aaran\Website\Livewire\Class\Project;

use Livewire\Attributes\Layout;
use Livewire\Component;

class ClientInfo extends Component
{
    public mixed $plans;

    public function mount()
    {
        $this->plans = ClientInfo::all();
    }

    #[Layout('Ui::components.layouts.web')]
    public function render()
    {
        return view('website::project.client-info');
    }

}
