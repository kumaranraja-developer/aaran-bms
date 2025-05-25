<?php

namespace Aaran\Website\Livewire\Class\About;

use Aaran\Assets\Enums\Active;
use Aaran\Website\Models\DevTeam;
use Livewire\Attributes\Layout;
use Livewire\Component;

class UserProfileView extends Component
{

    #[Layout('Ui::components.layouts.web')]
    public string $id = '';

    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $user = DevTeam::findorfail($this->id);

        return view('website::about.user-profile-view',compact('user'));
    }

}
