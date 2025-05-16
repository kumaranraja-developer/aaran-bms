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
        $quotes=[
            ['quote'=>"Edison bulb retro cloud bread echo park, helvetica stumptown
                        taiyaki taxidermy 90's cronut +1 kinfolk. Single-origin coffee ennui shaman taiyaki vape DIY
                        tote bag drinking vinegar cronut adaptogen squid fanny pack vaporware. Man bun next level
                        coloring book skateboard four loko knausgaard. Kitsch keffiyeh master cleanse direct trade
                        indigo juice before they sold out gentrify plaid gastropub normcore XOXO 90's pickled cindigo
                        jean shorts. Slow-carb next level shoindigoitch ethical authentic, yr scenester sriracha forage
                        franzen organic drinking vinegar.",'name'=>'muthu','job'=>'developer'],
            ['quote'=>"Edison bulb retro cloud bread echo park, helvetica stumptown
                        taiyaki taxidermy 90's cronut +1 kinfolk. Single-origin coffee ennui shaman taiyaki vape DIY
                        tote bag drinlevel shoindigoitch ethical authentic, yr scenester sriracha forage
                        franzen organic drinking vinegar.",'name'=>'haris','job'=>'developer']
        ];
        return view('website::about.index',compact('team'),compact('quotes'));
    }

}
