<?php

namespace Aaran\Devops\Livewire\Class;

use Aaran\Assets\Traits\ComponentStateTrait;
use Aaran\Assets\Traits\TenantAwareTrait;
use Aaran\Devops\Models\Task;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;

class TaskList extends Component
{

    use ComponentStateTrait, TenantAwareTrait;

    #[Validate]
    public string $title = '';
    public string $content = '';
    public string $start_time = '';
    public string $due_time = '';
    public string $assigned = '';
    public string $job_id = '';
    public string $priority = '';
    public string $status = '';
    public bool $active_id = true;

    public function rules(): array
    {
        return [
            'title' => 'required' . ($this->vid ? '' : "|unique:{$this->getTenantConnection()}.task_managers,title"),
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
            'title' => 'TaskManager name',
        ];
    }

    public function getSave(): void
    {
        $this->validate();
        $connection = $this->getTenantConnection();

        Task::on($connection)->updateOrCreate(
            ['id' => $this->vid],
            [
                'title' => Str::ucfirst($this->title),
                'content' => Str::ucfirst($this->content),
                'start_time' => Str::ucfirst($this->start_time),
                'due_time' => Str::ucfirst($this->due_time),
                'assigned' => Str::ucfirst($this->assigned),
                'job_id' => Str::ucfirst($this->job_id),
                'priority' => Str::ucfirst($this->priority),
                'status' => Str::ucfirst($this->status),
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
        $this->start_time = '';
        $this->due_time = '';
        $this->assigned = '';
        $this->job_id = '';
        $this->priority = '';
        $this->status = '';
        $this->active_id = true;
        $this->searches = '';
    }

    public function getObj(int $id): void
    {
        if ($obj = Task::on($this->getTenantConnection())->find($id)) {
            $this->vid = $obj->id;
            $this->title = $obj->title;
            $this->content = $obj->content;
            $this->start_time = $obj->start_time;
            $this->due_time = $obj->due_time;
            $this->assigned = $obj->assigned;
            $this->job_id = $obj->job_id;
            $this->priority = $obj->priority;
            $this->status = $obj->status;
            $this->active_id = $obj->active_id;
        }
    }

    public function getList()
    {
        return Task::on($this->getTenantConnection())
            ->active($this->activeRecord)
            ->when($this->searches, fn($query) => $query->searchByName($this->searches))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function deleteFunction(): void
    {
        if (!$this->deleteId) return;

        $obj = Task::on($this->getTenantConnection())->find($this->deleteId);
        if ($obj) {
            $obj->delete();
        }
    }

    public function render()
    {
        return view('devops::task-list', [
            'list' => $this->getList()
        ]);
    }

}
