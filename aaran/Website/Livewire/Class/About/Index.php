<?php

namespace Aaran\Website\Livewire\Class\About;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{

    public $team;

    public function mount()
    {
        $this->team = [
            ['image' => '/images/web/home/office_1.jpg',
                'name' => 'name',
                'role' => 'developer',
                'about' => 'working as a software developer',
                'fb' => '#', 'twit' => '#', 'msg' => '#'],

            ['image' => '/images/web/home/office_1.jpg', 'name' => 'name', 'role' => 'developer', 'about' => 'working as a software developer', 'fb' => '#', 'twit' => '#', 'msg' => '#'],
            ['image' => '/images/web/home/office_1.jpg', 'name' => 'name', 'role' => 'developer', 'about' => 'working as a software developer', 'fb' => '#', 'twit' => '#', 'msg' => '#'],
            ['image' => '/images/web/home/office_1.jpg', 'name' => 'name', 'role' => 'developer', 'about' => 'working as a software developer', 'fb' => '#', 'twit' => '#', 'msg' => '#']

        ];
    }


    #[Layout('Ui::components.layouts.web')]
    public function render()
    {
        return view('website::about.index');
    }

}
