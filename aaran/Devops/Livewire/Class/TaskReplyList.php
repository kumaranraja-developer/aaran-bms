<?php

namespace Aaran\Devops\Livewire\Class;

use Aaran\Assets\Traits\ComponentStateTrait;
use Aaran\Assets\Traits\TenantAwareTrait;
use Aaran\Devops\Models\TaskReply;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;

class TaskReplyList extends Component
{

    use ComponentStateTrait, TenantAwareTrait;

    #[Validate]
    public string $title = '';
    public string $commend = '';
    public string $job_id = '';
    public string $commend_id = '';
    public string $reply_id = '';
    public bool $active_id = true;

    public function rules(): array
    {
        return [
            'title' => 'required' . ($this->vid ? '' : "|unique:{$this->getTenantConnection()}.task_replies,title"),
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => ':attribute is missing.',
            'title.unique' => 'This :attribute is already created.',
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'title' => 'TaskReply name',
        ];
    }

    public function getSave(): void
    {
        $this->validate();
        $connection = $this->getTenantConnection();

        TaskReply::on($connection)->updateOrCreate(
            ['id' => $this->vid],
            [
                'title' => Str::ucfirst($this->title),
                'commend' => Str::ucfirst($this->commend),
                'job_id' => Str::ucfirst($this->job_id),
                'commend_id' => Str::ucfirst($this->commend_id),
                'reply_id' => Str::ucfirst($this->reply_id),
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
        $this->commend = '';
        $this->job_id = '';
        $this->commend_id = '';
        $this->reply_id = '';
        $this->active_id = true;
        $this->searches = '';
    }

    public function getObj(int $id): void
    {
        if ($obj = TaskReply::on($this->getTenantConnection())->find($id)) {
            $this->vid = $obj->id;
            $this->title = $obj->title;
            $this->commend = $obj->commend;
            $this->job_id = $obj->job_id;
            $this->commend_id = $obj->commend_id;
            $this->reply_id = $obj->reply_id;
            $this->active_id = $obj->active_id;
        }
    }

    public function getList()
    {
        return TaskReply::on($this->getTenantConnection())
            ->active($this->activeRecord)
            ->when($this->searches, fn($query) => $query->searchByName($this->searches))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function deleteFunction(): void
    {
        if (!$this->deleteId) return;

        $obj = TaskReply::on($this->getTenantConnection())->find($this->deleteId);
        if ($obj) {
            $obj->delete();
        }
    }

    public function render()
    {
        return view('devops::task-replies-list', [
            'list' => $this->getList()
        ]);
    }

}
