<?php

namespace Aaran\Devops\Livewire\Class;

use Aaran\Assets\Traits\ComponentStateTrait;
use Aaran\Assets\Traits\TenantAwareTrait;
use Aaran\Devops\Models\Activities;
use Aaran\Devops\Models\Task;
use Aaran\Devops\Models\TaskImage;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class TaskShow extends Component
{
    use ComponentStateTrait, TenantAwareTrait, WithFileUploads;

    public $task;
    public $taskImage;

    public $vname;
    public $start_on;
    public $end_on;
    public $status_id;
    public $active_id;

    public function mount($id)
    {
        if ($id) {
            $this->task = DB::connection($this->getTenantConnection())
                ->table('tasks')->where('id', $id)->get();
        }

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
        dd('ag');
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
            ->get();
    }

    public function render()
    {
        return view('devops::task-show')->with([
//            'list' => $this->getList(),
            ]);
    }
}
