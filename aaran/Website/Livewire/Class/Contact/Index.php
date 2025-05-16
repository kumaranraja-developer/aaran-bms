<?php

namespace Aaran\Website\Livewire\Class\Contact;

use Aaran\Assets\Traits\ComponentStateTrait;
use Aaran\BMS\Billing\Common\Models\City;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Index extends Component
{
    use ComponentStateTrait;

    #[Validate]
    public string $vname = '';
    public string $vemail = '';
    public string $vphone = '';
    public string $vmessage = '';

    public bool $active_id = true;

    public function rules(): array
    {
        return [
            'vname' => 'required',
            'vemail' => 'required',
            'vphone' => 'required',
            'vmessage' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'vname.required' => ':attribute is missing.',
            'vname.unique' => 'This :attribute is already created.',
            'vemail.required' => ':attribute is missing.',
            'vphone.required' => ':attribute is missing.',
            'vmessage.required' => ':attribute is missing.',
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'vname' => 'City name',
        ];
    }

    public function getSave(): void
    {
        $this->validate();
//        $connection = $this->getTenantConnection();
        City::on()->updateOrCreate(
            ['id' => $this->vid],
            [
                'vname' => Str::ucfirst($this->vname),
                'vemail' => $this->vemail,
                'vphone' => $this->vphone,
                'vmessage' => $this->vmessage,
                'active_id' => $this->active_id
            ],
        );

        $this->dispatch('notify', ...['type' => 'success', 'content' => ($this->vid ? 'Updated' : 'Saved') . ' Successfully']);
        $this->clearFields();
    }
    public function clearFields(): void
    {
        $this->vid = null;
        $this->vname = '';
        $this->vemail = '';
        $this->vphone = '';
        $this->vmessage = '';
        $this->active_id = true;
    }

    #[Layout('Ui::components.layouts.web')]
    public function render()
    {
        return view('website::contact.index');
    }

}
