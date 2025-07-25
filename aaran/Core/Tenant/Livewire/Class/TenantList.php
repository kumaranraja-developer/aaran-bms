<?php

namespace Aaran\Core\Tenant\Livewire\Class;

use Aaran\Assets\Enums\Software;
use Aaran\Assets\Traits\ComponentStateTrait;
use Aaran\Assets\Traits\TenantAwareTrait;
use Aaran\Core\Tenant\Models\Tenant;
use Illuminate\Support\Str;
use Livewire\Component;

class TenantList extends Component
{
    use ComponentStateTrait, TenantAwareTrait;

    public string $b_name = '';
    public ?string $t_name = null;
    public ?string $email = null;
    public ?string $contact = null;
    public ?string $phone = null;
    public ?string $db_name = null;
    public ?string $db_host = null;
    public ?string $db_port = null;
    public ?string $db_user = 'root';
    public ?string $db_pass = 'Computer.1';
    public ?string $software_id = null;
    public ?string $remarks = null;
    public ?string $migration_status = null;
    public bool $active_id = true;

    public $software;

    public function rules(): array
    {
        return [
            'b_name' => 'required',
            't_name' => 'required' . ($this->vid ? '' : "|unique:tenants,t_name"),
            'db_name' => 'required',
            'db_user' => 'required',
            'db_pass' => 'required',
            'software_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'b_name.required' => ':attribute is missing.',

            't_name.required' => ':attribute is missing.',
            't_name.unique' => 'This :attribute is already created.',

            'db_name.required' => ':attribute is missing.',
            'db_user.required' => ':attribute is missing.',
            'db_pass.required' => ':attribute is missing.',

            'software_id.required' => ':attribute is missing.',

        ];
    }

    public function validationAttributes(): array
    {
        return [
            'b_name' => 'Business name',
            't_name' => 'Tenant name',
            'db_name' => 'Database name',
            'db_user' => 'Database user',
            'db_pass' => 'Database password',

            'software_id' => 'Software Type',
        ];
    }

    public function getSave(): void
    {
        $this->validate();
        $connection = $this->getTenantConnection();

        Tenant::updateOrCreate(
            ['id' => $this->vid],
            [
                'b_name' => Str::ucfirst($this->b_name),
                't_name' => $this->t_name,
                'email' => $this->email,
                'contact' => $this->contact,
                'phone' => $this->phone,
                'db_name' => $this->db_name,
                'db_host' => $this->db_host ?: '127.0.0.1',
                'db_port' => $this->db_port ?: '3306',
                'db_user' => $this->db_user ?: 'root',
                'db_pass' => $this->db_pass ?: 'Computer.1',
                'software_id' => $this->software_id,
                'remarks' => $this->remarks,
                'migration_status' => $this->migration_status ?: 'pending',
                'active_id' => $this->active_id ?: true,
            ],
        );

        $this->dispatch('notify', ...['type' => 'success', 'content' => ($this->vid ? 'Updated' : 'Saved') . ' Successfully']);
        $this->clearFields();
    }

    public function clearFields(): void
    {
        $this->vid = null;
        $this->b_name = '';
        $this->t_name = '';
        $this->email = '';
        $this->contact = '';
        $this->phone = '';
        $this->db_name = '';
        $this->db_host = '127.0.0.1';
        $this->db_port = '3306';
        $this->db_user = 'root';
        $this->db_pass = 'Computer.1';
        $this->software_id = '1';
        $this->remarks = '-';
        $this->migration_status = 'pending';
        $this->active_id = true;
    }

    public function getObj(int $id): void
    {
        if ($obj = Tenant::find($id)) {
            $this->vid = $obj->id;
            $this->b_name = $obj->b_name;
            $this->t_name = $obj->t_name;
            $this->email = $obj->email;
            $this->contact = $obj->contact;
            $this->phone = $obj->phone;

            $this->db_name = $obj->db_name;
            $this->db_host = $obj->db_host;
            $this->db_port = $obj->db_port;
            $this->db_user = $obj->db_user;
            $this->db_pass = $obj->db_pass;

            $this->software_id = $obj->software_id;
            $this->remarks = $obj->remarks;
            $this->migration_status = $obj->migration_status;
            $this->active_id = $obj->active_id;
        }
    }

    public function getList()
    {
        return Tenant::when($this->searches, fn($query) => $query->searchByName($this->searches))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function deleteFunction(): void
    {
        if (!$this->deleteId) return;

        $obj = Tenant::find($this->deleteId);
        if ($obj) {
            $obj->delete();
        }
    }


    public function mount(): void
    {
        $this->software = collect(Software::cases())->mapWithKeys(fn($case) => [$case->value => $case->getname()])->toArray();
    }

    public function render()
    {
        return view('tenant::tenant-list', [
            'list' => $this->getList()
        ]);
    }
}
