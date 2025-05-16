<?php

namespace Aaran\Website\Livewire\Class\About;

use Aaran\Assets\Traits\ComponentStateTrait;
use Aaran\Website\Models\DevTeam;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Team extends Component
{
    use ComponentStateTrait;

    #[Validate]
    public string $vname = '';
    public string $role = '';
    public mixed $photo;
    public mixed $about = '';
    public string $mail = '';
    public string $mobile = '';
    public string $fb = '';
    public string $twitter = '';
    public string $msg = '';
    public bool $active_id = true;

    public function rules(): array
    {
        return [
            'vname' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'vname.required' => ':attribute is missing.',
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'vname' => 'Team Member name',
        ];
    }

    public function getSave(): void
    {
        $this->validate();

        DevTeam::updateOrCreate(
            ['id' => $this->vid],
            [
                'vname' => Str::ucfirst($this->vname),
                'role' => $this->role,
                'photo' => $this->photo,
                'about' => $this->about,
                'mail' => $this->mail,
                'mobile' => $this->mobile,
                'fb' => $this->fb,
                'twitter' => $this->twitter,
                'msg' => $this->msg,
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
        $this->role = '';
        $this->photo = '';
        $this->about = '';
        $this->mail = '';
        $this->mobile = '';
        $this->fb = '';
        $this->twitter = '';
        $this->msg = '';
        $this->active_id = true;
        $this->searches = '';
    }

    public function getObj(int $id): void
    {
        if ($obj = DevTeam::find($id)) {
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->role = $obj->role;
            $this->photo = $obj->photo;
            $this->about = $obj->about;
            $this->mail = $obj->mail;
            $this->mobile = $obj->mobile;
            $this->fb = $obj->fb;
            $this->twitter = $obj->twitter;
            $this->msg = $obj->msg;
            $this->active_id = $obj->active_id;
        }
    }

    public function getList()
    {
        return DevTeam::active($this->activeRecord)
            ->when($this->searches, fn($query) => $query->searchByName($this->searches))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function deleteFunction(): void
    {
        if (!$this->deleteId) return;

        $obj = DevTeam::find($this->deleteId);
        if ($obj) {
            $obj->delete();
        }
    }

    public function render()
    {
        return view('website::about.team', [
            'list' => $this->getList()
        ]);
    }
}
