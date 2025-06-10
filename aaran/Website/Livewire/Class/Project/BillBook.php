<?php

namespace Aaran\Website\Livewire\Class\Project;

use Aaran\Website\Models\Testimonial;
use Livewire\Attributes\Layout;
use Livewire\Component;

class BillBook extends Component
{
    public mixed $plans;
    public $testimonials;
    public function mount()
    {
        $this->plans = BillBook::all();
        $this->testimonials = Testimonial::latest()->take(6)->get();

    }

    #[Layout('Ui::components.layouts.web')]
    public function render()
    {
        return view('website::project.bill-book');
    }

}
