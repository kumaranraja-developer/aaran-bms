<?php

namespace Aaran\Website\Livewire\Class\Contact;

use Aaran\Assets\Traits\ComponentStateTrait;
use Aaran\Website\Models\WebEnquiry;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Index extends Component
{
    use ComponentStateTrait;

    #[Validate]
    public string $vname = '';
    public string $email = '';
    public string $phone = '';
    public string $message = '';

    public bool $active_id = true;
    public array $show = [];

    public function rules(): array
    {
        return [
            'vname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'vname.required' => ':attribute is missing.',
            'email.required' => ':attribute is missing.',
            'email.email' => 'This :attribute is not a valid email.',
            'phone.required' => ':attribute is missing.',
            'message.required' => ':attribute is missing.',
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'vname' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'message' => 'Message',
        ];
    }

    public function getSave(): void
    {
        $this->validate();

        WebEnquiry::updateOrCreate(
            ['id' => $this->vid],
            [
                'vname' => Str::ucfirst($this->vname),
                'email' => $this->email,
                'phone' => $this->phone,
                'message' => $this->message,
                'active_id' => $this->active_id
            ],
        );
        $this->show = [
            'vname' => $this->vname,
            'email' => $this->email,
            'phone' => $this->phone,
            'message' => $this->message,
        ];
        $this->dispatch('notify', ...['type' => 'success', 'content' => ($this->vid ? 'Updated' : 'Saved') . ' Successfully']);
        $this->clearFields();
    }
    public function clearFields(): void
    {
        $this->vid = null;
        $this->vname = '';
        $this->email = '';
        $this->phone = '';
        $this->message = '';
        $this->active_id = true;
    }

    #[Layout('Ui::components.layouts.web')]
    public function render()
    {
        return view('website::contact.index');
    }
}
