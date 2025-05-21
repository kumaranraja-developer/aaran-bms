<?php

namespace Aaran\Devops\Livewire\Class;

use Aaran\Assets\Enums\Active;
use Aaran\Assets\Enums\Priority;
use Aaran\Assets\Enums\Status;
use Aaran\Assets\Services\ImageService;
use Aaran\Assets\Traits\ComponentStateTrait;
use Aaran\Assets\Traits\TenantAwareTrait;
use Aaran\Core\User\Models\User;
use Aaran\Devops\Models\Activities;
use Aaran\Devops\Models\Task;
use Aaran\Devops\Models\TaskImage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class TaskActivity extends Component
{

    use ComponentStateTrait, TenantAwareTrait, WithFileUploads;

    public $users = [];
    public $priorities = [];
    public $images = [];
    public $old_images = [];
    public $task;
    public $taskImage = [];

    public $activities;
    public $statuses;

    public $vname;
    public $start_on;
    public $end_on;
    public $status_id;
    public $active_id;


    public function mount($id): void
    {
        if ($id) {
            $this->task = DB::connection($this->getTenantConnection())->table('tasks')->find($id);
            $this->taskImage = TaskImage::on($this->getTenantConnection())->where('task_id', $id)->get()->toarray();
            $this->activities = $this->getActivities($id);

            $this->statuses = collect(Status::cases())->mapWithKeys(fn($case) => [$case->value => $case->getname()])->toArray();
        }
    }


    public function getActivities($id)
    {
        return DB::connection($this->getTenantConnection())->table('activities')
            ->where('task_id', $id)->get();
    }


    public function editActivity($id)
    {
        $obj = Activities::on($this->getTenantConnection())->find($id);
        $this->vname = $obj->vname;
        $this->start_on = $obj->start_on;
        $this->end_on = $obj->end_on;
        $this->status_id = $obj->status_id;


    }

    public function getSaveActivity()
    {
        $connection = $this->getTenantConnection();

        $obj = Activities::on($connection)->updateOrCreate(
            ['id' => $this->vid],
            [
                'task_id' => $this->task->id,
                'vname' => $this->vname,
                'start_on' => $this->start_on ?: now()->format('Y-m-d'),
                'end_on' => $this->end_on ?: now()->format('Y-m-d'),
                'status_id' => $this->status_id ?: '1',
                'user_id' => auth()->id(),
            ],
        );

        $this->activities = $this->getActivities($obj->task_id);
        $this->clearActivity();

        $this->dispatch('notify', ...['type' => 'success', 'body' => ('Actives updated Successfully')]);

    }
    public function getDelete($id){
        $obj = Activities::on($this->getTenantConnection())->find($id);
        if($obj){
            $obj->delete();
        }
        $this->activities = $this->getActivities($obj->task_id);
    }

    protected function clearActivity(): void
    {
        $this->vname = '';
        $this->start_on = '';
        $this->end_on = '';
        $this->status_id = '';
    }

    public function render()
    {
        return view('devops::task-activity');
    }

}
