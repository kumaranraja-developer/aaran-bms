<?php

namespace Aaran\Website\Livewire\Class\About;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('Ui::components.layouts.web')]
    public function render()
    {
        $team=[
            ['image'=>'/images/web/home/office_1.jpg','name'=>'name','role'=>'developer','about'=>'working as a software developer','fb'=>'#','twit'=>'#','msg'=>'#'],
            ['image'=>'/images/web/home/office_1.jpg','name'=>'name','role'=>'developer','about'=>'working as a software developer','fb'=>'#','twit'=>'#','msg'=>'#'],
            ['image'=>'/images/web/home/office_1.jpg','name'=>'name','role'=>'developer','about'=>'working as a software developer','fb'=>'#','twit'=>'#','msg'=>'#'],
            ['image'=>'/images/web/home/office_1.jpg','name'=>'name','role'=>'developer','about'=>'working as a software developer','fb'=>'#','twit'=>'#','msg'=>'#']

        ];
        return view('website::about.index',compact('team'));
    }

}
