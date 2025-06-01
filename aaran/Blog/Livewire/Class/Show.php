<?php

namespace Aaran\Blog\Livewire\Class;

use Aaran\Assets\Traits\ComponentStateTrait;
use Aaran\Assets\Traits\TenantAwareTrait;
use Aaran\Blog\Models\BlogComment;
use Aaran\Blog\Models\BlogPost;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    use ComponentStateTrait, TenantAwareTrait;

    #[Layout('Ui::components.layouts.web')]
    public function render()
    {
        return view('blog::show');
    }
}
