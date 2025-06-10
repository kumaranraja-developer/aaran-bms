<?php

namespace Aaran\Core\Setup\Livewire\Class;

use Aaran\Assets\Enums\Active;
use Aaran\Assets\Traits\ComponentStateTrait;
use Aaran\Assets\Traits\TenantAwareTrait;
use Aaran\Core\Setup\Jobs\RunTenantMigrationJob;
use Aaran\Core\Tenant\Models\Plan;
use Aaran\Core\Tenant\Models\Subscription;
use Aaran\Core\Tenant\Models\Tenant;
use Aaran\Core\User\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use function Sodium\add;

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
    public $plans;
    public $plan_id;

    public function mount($id = null)
    {
        if ($id) {
            $this->tenant = Tenant::find($id);
            $this->users = $this->tenant->users;
        }

        $this->plans = Plan::where('active_id', Active::ACTIVE)->get()->pluck('vname', 'id')->toArray();
        $this->plan_id = '1';

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

        $this->plan_id = '1';
        $this->from_date = now()->format('M d,Y');
        $this->to_date = now()->format('M d,Y');
        $this->v_days = null;
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

    public function deleteFunction()
    {
        $obj = User::find($this->vid);
        if ($obj) {
            $obj->delete();
        }
    }

    public $from_date;
    public $to_date;
    public int|null $v_days = null;

    public function setSubscription()
    {

        $id = Subscription::where('tenant_id', $this->tenant->id)->first()?->id;

        if ($this->v_days) {
            $this->to_date = now()->addDays($this->v_days);
        }

        Subscription::updateOrCreate(
            ['id' => $id],
            [
                'tenant_id' => $this->tenant->id,
                'user_id' => auth()->id() ?: '1',
                'plan_id' => $this->plan_id ?: '1',
                'status' => 'active',
                'started_at' => Carbon::parse($this->from_date)->format('Y-m-d'),
                'expires_at' => Carbon::parse($this->to_date)->format('Y-m-d'),
            ]
        );

        $this->dispatch('notify', ...['type' => 'success', 'content' => ($this->vid ? 'Updated' : 'Saved') . ' Successfully']);
        $this->clearFields();

    }


    public function createTenant()
    {
        try {
            set_time_limit(300); // 5 minutes
            RunTenantMigrationJob::dispatchSync($this->tenant->t_name);

            $this->setMigrationStatus();

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    private function setMigrationStatus()
    {
        $tenant = $this->tenant;
        $tenant->migration_status = 'completed - 1.0.0';
        $tenant->save();

        $this->from_date = now()->format('Y-m-d');
        $this->to_date = now()->addDays(7)->format('Y-m-d');
        $this->plan_id = '1';

        $this->setSubscription();
    }


    #[Layout('Ui::components.layouts.web')]
    public function render()
    {
        return view('setup::tenant-migration');
    }
}
