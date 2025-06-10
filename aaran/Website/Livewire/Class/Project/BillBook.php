<?php

namespace Aaran\Website\Livewire\Class\Project;

use Livewire\Attributes\Layout;
use Livewire\Component;

class BillBook extends Component
{
    public mixed $plans;

    public function mount()
    {
        $this->plans = BillBook::all();
    }

    #[Layout('Ui::components.layouts.web')]
    public function render()
    {
        return view('website::project.bill-book');
    }

}
