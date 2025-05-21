<?php

namespace Aaran\Devops\Livewire\Class;

use Aaran\Assets\Traits\ComponentStateTrait;
use Aaran\Assets\Traits\TenantAwareTrait;
use Aaran\Devops\Models\Job;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;

class JobList extends Component
{

    use ComponentStateTrait, TenantAwareTrait;

    #[Validate]
    public string $title = '';
    public string $content = '';
    public string $status = '';
    public bool $active_id = true;

    public function rules(): array
    {
        return [
            'title' => 'required' . ($this->vid ? '' : "|unique:{$this->getTenantConnection()}.jobs,title"),
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => ':attribute is missing.',
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'title' => 'Job Name',
        ];
    }

    public function getSave(): void
    {
        $this->validate();
        $connection = $this->getTenantConnection();

        Job::on($connection)->updateOrCreate(
            ['id' => $this->vid],
            [
                'title' => Str::ucfirst($this->title),
                'content' => $this->content,
                'status' => $this->status,
                'active_id' => $this->active_id
            ],
        );

        $this->dispatch('notify', ...['type' => 'success', 'content' => ($this->vid ? 'Updated' : 'Saved') . ' Successfully']);
        $this->clearFields();
    }
    public function clearFields(): void
    {
        $this->vid = null;
        $this->title = '';
        $this->content = '';
        $this->status = '';
        $this->active_id = true;
        $this->searches = '';
    }

    public function getObj(int $id): void
    {
        if ($obj = Job::on($this->getTenantConnection())->find($id)) {
            $this->vid = $obj->id;
            $this->title = $obj->title;
            $this->content = $obj->content;
            $this->status = $obj->status;
            $this->active_id = $obj->active_id;
        }
    }

    public function getList()
    {
        return Job::on($this->getTenantConnection())
            ->active($this->activeRecord)
            ->when($this->searches, fn($query) => $query->searchByName($this->searches))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function deleteFunction(): void
    {
        if (!$this->deleteId) return;

        $obj = Job::on($this->getTenantConnection())->find($this->deleteId);
        if ($obj) {
            $obj->delete();
        }
    }

    public function render()
    {
        return view('devops::job-manager', [
            'list' => $this->getList()
        ]);
    }

}
