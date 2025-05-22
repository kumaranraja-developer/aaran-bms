<?php

namespace Aaran\Core\User\Livewire\Class;

use Aaran\Assets\Traits\ComponentStateTrait;
use Aaran\Assets\Traits\TenantAwareTrait;
use Aaran\Core\User\Models\UserDetail;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UserList extends Component
{

    use ComponentStateTrait;

    #[Validate]
    public string $vname = '';
    public string $email = '';
    public string $tenant_id = '';
    public bool $active_id = true;

    public function rules(): array
    {
        return [
            'vname' => 'required',
            'email' => 'required | email'
        ];
    }

    public function messages(): array
    {
        return [
            'vname.required' => ':attribute is missing.',
            'vname.unique' => 'This :attribute is already created.',
            'email.required' => ':attribute is missing.',

        ];
    }

    public function validationAttributes(): array
    {
        return [
            'vname' => 'UserDetail name',
            'email' => 'User Email',
        ];
    }

    public function getSave(): void
    {
        $this->validate();


        UserDetail::updateOrCreate(
            ['id' => $this->vid],
            [
                'vname' => Str::ucfirst($this->vname),
                'email' => $this->email,
                'tenant_id'=>$this->tenant_id,
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
        $this->email = '';
        $this->active_id = true;
        $this->searches = '';
    }

    public function getObj(int $id): void
    {
        if ($obj = UserDetail::find($id)) {
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->email = $obj->email;
            $this->active_id = $obj->active_id;
        }
    }

    public function getList()
    {
        return UserDetail::active($this->activeRecord)
            ->when($this->searches, fn($query) => $query->searchByName($this->searches))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function deleteFunction(): void
    {
        if (!$this->deleteId) return;

        $obj = UserDetail::find($this->deleteId);
        if ($obj) {
            $obj->delete();
        }
    }

    public function render()
    {
        return view('user::user-list', [
            'list' => $this->getList()
        ]);
    }

}
