<?php

namespace Aaran\Website\Livewire\Class\Project;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Aaran\Assets\Helper\SubscriptionPlanDetails;

class PlanOverview extends Component
{
    public $plan;
    public $billing = 'monthly'; // default

    public function mount($id)
    {
        $this->plan = SubscriptionPlanDetails::getById($id);
        $this->billing = request()->query('billing', 'monthly');
    }

    #[Layout('Ui::components.layouts.web')]
    public function render()
    {
        return view('website::project.plan-overview', [
            'plan' => $this->plan,
            'billing' => $this->billing,
        ]);
    }
}
