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
use Livewire\Attributes\On;
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


    public string $job_id = '';
    public string $title = '';
    public string $body = '';
    public mixed $start_at = null;
    public mixed $due_date = null;
    public string $module_id = '';
    public string $allocated_id = '';
    public string $reporter_id = '';
    public string $priority_id = '';
    public string $task_status_id = '';
    public string $task_active_id = '';
    public $moduleCollection = [];

    public $task_image;
    public array $task_images = [];

    public bool $isUploaded = false;


    public function mount($id): void
    {
        if ($id) {

            $this->task = DB::connection($this->getTenantConnection())->table('tasks')
                ->select('tasks.*', 'modules.*', 'jobs.*')
                ->join('jobs', 'jobs.id', '=', 'tasks.job_id')
                ->join('modules', 'modules.id', '=', 'tasks.module_id')
                ->where('tasks.id', $id)
                ->first();

            $this->taskImage = TaskImage::on($this->getTenantConnection())->where('task_id', $id)->get()->toarray();
            $this->activities = $this->getActivities($id);

            $this->statuses = collect(Status::cases())->mapWithKeys(fn($case) => [$case->value => $case->getname()])->toArray();

            $this->users = User::where('active_id', Active::ACTIVE)->get()->pluck('name', 'id')->toArray();


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

    #[On('refresh-modules')]
    public function refreshTransport($v): void
    {
        $this->module_id = $v;
    }

    public function getSave(): void
    {
//        $this->validate();
        $connection = $this->getTenantConnection();

        $this->task = Task::on($connection)->updateOrCreate(
            ['id' => $this->vid],
            [
                'job_id' => $this->job_id,
                'title' => Str::ucfirst($this->title),
                'body' => $this->body,
                'start_at' => $this->start_at ?: now()->format("Y-m-d"),
                'due_date' => $this->due_date ?: now()->format("Y-m-d"),
                'module_id' => $this->module_id ?: '1',
                'allocated_id' => $this->allocated_id ?: '1',
                'priority_id' => $this->priority_id ?: '1',
                'reporter_id' => $this->reporter_id ?: '1',
                'status_id' => $this->status_id ?: '1',
                'active_id' => $this->active_id ?: '1',
            ],
        );

        $this->saveImage($this->task->id, $this->task_images);

        $this->dispatch('notify', ...['type' => 'success', 'body' => ($this->vid ? 'Updated' : 'Saved') . ' Successfully']);
    }

    public function clearFields(): void
    {
        //
    }

    public function saveImage($id, $images): void
    {
        $imageService = app(ImageService::class);

        foreach ($this->images as $image) {
            TaskImage::on($this->getTenantConnection())->create([
                'task_id' => $id,
                'image' => $imageService->save($image),
            ]);
        }
    }

    public function taskImage(): void
    {
        $this->isUploaded = true;
    }

    public function editTask(): void
    {
        $obj = Task::on($this->getTenantConnection())->find($this->task->id);

        $this->vid = $obj->id;
        $this->job_id = $obj->job_id;
        $this->title = $obj->title;
        $this->body = $obj->body;
        $this->start_at = $obj->start_at;
        $this->due_date = $obj->due_date;
        $this->module_id = $obj->module_id;
        $this->allocated_id = $obj->allocated_id;
        $this->reporter_id = $obj->reporter_id;
        $this->priority_id = $obj->priority_id;
        $this->status_id = $obj->status_id;
        $this->active_id = $obj->active_id;

        $this->old_images = TaskImage::on($this->getTenantConnection())
            ->where('task_id', $this->task->id)
            ->get(['id', 'image'])
            ->toArray();

        $this->dispatch('refresh-modules-lookup', $obj->module->vname);

        $this->showEditModal = true;
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

    public function deleteFunction($id)
    {
        $obj = Activities::on($this->getTenantConnection())->find($id);
        if ($obj) {
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
