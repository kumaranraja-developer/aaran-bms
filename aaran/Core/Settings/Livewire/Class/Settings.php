<?php

namespace Aaran\Core\Settings\Livewire\Class;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Settings extends Component
{
    #[Layout('Ui::components.layouts.settings-layout')]
    public function render()
    {
        return view('settings::settings');
    }
}
