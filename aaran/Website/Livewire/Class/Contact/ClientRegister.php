<?php

namespace Aaran\Website\Livewire\Class\Contact;

use Aaran\BMS\Billing\Common\Models\City;
use Aaran\Website\Models\ClientRegisterModel;
use Aaran\Website\Models\Testimonial;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use phpDocumentor\Reflection\Types\Boolean;

class ClientRegister extends Component
{
    public $testimonials;
    public string $vname = '';
    public string $phone = '';
    public string $email = '';
    public string $password = '';
    public string $plan = '';
    public bool $trial = false;
    public $active_id = 1;
    public bool $agreed = false;
    public bool $showDialog = false;

    public function mount($id, $plan)
    {
        $this->plan = $plan;

        if ($id === 'trial') {
            $this->trial = true;
        }

        $this->testimonials = Testimonial::latest()->take(5)->get();
    }

    public function rules(): array
    {
        return [
            'vname' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'agreed' => 'accepted'
        ];
    }

    public function messages(): array
    {
        return [
            'vname.required' => 'Name is required.',
            'phone.required' => 'Phone is required.',
            'email.required' => 'Email is required.',
            'password.required' => 'Password is required.',
            'agreed.accepted' => 'You must accept the Terms and Privacy Policy.',
        ];
    }

    public function getSave()
    {
        $this->validate();

        // Check if phone already exists
        if (ClientRegisterModel::where('phone', $this->phone)->exists()) {
            $this->addError('phone', 'Phone number already exists.');
            return;
        }

        // Check if email already exists
        if (ClientRegisterModel::where('email', $this->email)->exists()) {
            $this->addError('email', 'Email already exists.');
            return;
        }

        ClientRegisterModel::create([
            'vname' => Str::ucfirst($this->vname),
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
            'trial' => $this->trial,
            'plan' => $this->plan,
            'active_id' => $this->active_id,
        ]);
        $this->showDialog = true;
        $this->dispatch('notify', ['type' => 'success', 'content' => 'Saved Successfully']);
        $this->clearFields();
    }

    public function clearFields()
    {
        $this->vname = '';
        $this->phone = '';
        $this->email = '';
        $this->password = '';
    }

    #[Layout('Ui::components.layouts.web')]
    public function render()
    {
        return view('website::contact.client-register');
    }
}
