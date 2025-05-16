<?php

namespace Aaran\Website\Livewire\Class\Project;

use Livewire\Attributes\Layout;
use Livewire\Component;

class PlanComparison extends Component
{
    public mixed $table;

    public function mount()
    {
        $this->table=[
            ['col1'=>'User','col2'=>'10 member','col3'=>'20 member','col4'=>'50 member','col5'=>'Customize'],
            ['col1'=>'Storage','col2'=>'5 GB','col3'=>'10 GB','col4'=>'20 GB','col5'=>'Unlimited'],
            ['col1'=>'Service','col2'=>'Email','col3'=>'Small + Chat','col4'=>'no','col5'=>'Enterprise + Call'],
        ];
    }

    #[Layout('Ui::components.layouts.web')]
    public function render()
    {
        return view('website::project.plan-comparison');
    }

}
