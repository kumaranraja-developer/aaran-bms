<?php

namespace Aaran\Devops\Livewire\Class;

use Aaran\Assets\Traits\ComponentStateTrait;
use Aaran\Assets\Traits\TenantAwareTrait;
use Aaran\Devops\Models\Activities;
use Aaran\Devops\Models\Module;
use Aaran\Devops\Models\Task;
use Aaran\Devops\Models\TaskImage;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class TaskShow extends Component
{

    use ComponentStateTrait, TenantAwareTrait, WithFileUploads;

    public $task;

    public $taskImage;

    #region[property]
    public $remarks;
    public $estimated;
    public $duration;
    public $start_on;
    public $end_on;
    public $cdate;
    public $task_id;
    public $verified = '';
    public $verified_on;

    public $taskTitle;
    public $taskBody;
    public $allocated;
    public $priority;
    public $status;
    public $images = [];
    public $old_images = [];
    public $status_id;
    public $active_id;

    #endregion

    public function mount($id)
    {
        $this->task = Task::on($this->getTenantConnection())->find($id);
        $this->taskImage = TaskImage::on($this->getTenantConnection())->where('task_id', $id)->get()->toarray();

//        $this->old_images = TaskImage::on($this->getTenantConnection())->where('task_id', $id)->get();
//        $this->cdate = Carbon::now()->format('Y-m-d');
//        $this->verified_on = Carbon::now()->format('Y-m-d');
    }

    public function editTask(): void
    {
        $this->showEditModal = true;
    }

    public function getSaveActivity(): void
    {
        $connection = $this->getTenantConnection();

        $obj = Activities::on($connection)->updateOrCreate(
            ['id' => $this->vid],
            [
                'task_id' => $this->task_id,
                'start_on' => $this->start_on,
                'end_on' => $this->end_on,
                'status_id' => $this->status_id ?: '1',
                'user_id' => auth()->id(),
            ],
        );

        $this->dispatch('notify', ...['type' => 'success', 'body' => ('Actives updated Successfully')]);
    }

    public function editActivity($id)
    {
        $this->clearFields();
        $this->getObj($id);
    }

    public function getList()
    {
        return Activities::on($this->getTenantConnection())
            ->select('activities.*')
            ->where('task_id', $this->task->id)
            ->orderBy('id', 'asc')
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('devops::task-show')->with([
            'list' => $this->getList(),
            ]);
    }
}
