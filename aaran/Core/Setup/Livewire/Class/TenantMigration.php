<?php

namespace Aaran\Core\Setup\Livewire\Class;

use Aaran\Assets\Traits\ComponentStateTrait;
use Aaran\Assets\Traits\TenantAwareTrait;
use Aaran\Core\Setup\Jobs\RunTenantMigrationJob;
use Aaran\Core\Tenant\Models\Tenant;
use Aaran\Core\User\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

class TenantMigration extends Component
{
    use ComponentStateTrait, TenantAwareTrait;

    public mixed $tenant;
    public mixed $tenants;
    public mixed $users;

    public string $name = '';
    public string $email = '';
    public string $password = '';
    public bool $active_id = true;

    public function mount($id = null)
    {
        if ($id) {
            $this->tenant = Tenant::find($id);
            $this->users = $this->tenant->users;
        }
    }


    public function rules(): array
    {
        return [
            'email' => 'required' . ($this->vid ? '' : "|unique:users,email"),
            'password' => 'required|min:6'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => ':attribute is missing.',
            'email.unique' => 'This :attribute is already created.',

            'password.required' => ':attribute is missing.',
            'password.min' => ':attribute must be at least 6 characters.',
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Password'
        ];
    }
    public function clearFields(): void
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->active_id = true;
    }

    public function getSave()
    {
        $this->validate();

        User::updateOrCreate(
            ['id' => $this->vid],
            [
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'active_id' => $this->active_id ? '1' : null,
                'tenant_id' => $this->tenant->id,
            ]
        );
        $this->dispatch('notify', ...['type' => 'success', 'content' => ($this->vid ? 'Updated' : 'Saved') . ' Successfully']);
        $this->clearFields();

        $this->users = $this->tenant->users;
    }

    public function getObj(int $id): void
    {
        if ($obj = User::find($id)) {
            $this->vid = $obj->id;
            $this->name = $obj->name;
            $this->email = $obj->email;
            $this->password = '';
            $this->active_id = $obj->active_id;
        }
    }


    public function createTenant()
    {
        try {
            set_time_limit(300); // 5 minutes
            RunTenantMigrationJob::dispatchSync($this->tenant->t_name);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    #[Layout('Ui::components.layouts.web')]
    public function render()
    {
        return view('setup::tenant-migration');
    }
}
