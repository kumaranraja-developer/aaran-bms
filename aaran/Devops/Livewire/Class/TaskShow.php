<?php

namespace Aaran\Devops\Livewire\Class;

use Aaran\Assets\Enums\Active;
use Aaran\Assets\Enums\Priority;
use Aaran\Assets\Enums\Status;
use Aaran\Assets\Services\ImageService;
use Aaran\Assets\Traits\ComponentStateTrait;
use Aaran\Assets\Traits\TenantAwareTrait;
use Aaran\Core\User\Models\User;
use Aaran\Devops\Models\Task;
use Aaran\Devops\Models\TaskActivity;
use Aaran\Devops\Models\TaskActivityReply;
use Aaran\Devops\Models\TaskImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class TaskShow extends Component
{

    use ComponentStateTrait, TenantAwareTrait, WithFileUploads;


    public array $statuses = [];
    public array $priorities = [];
    public array $users = [];

//    public $list = [];


//task
    public $task;
    public $task_images;
    public $images = [];
    public $old_images;
    public $moduleCollection = [];

    public string $job_id = '';
    public string $module_id = '';
    public string $title = '';
    public string $content = '';
    public mixed $start_at = null;
    public mixed $due_date = null;
    public string $allocated_id = '';
    public string $reporter_id = '';
    public string $priority_id = '';
    public string $status_id = '';
    public string $active_id = '';
    public string $flag = '';

    // Activity
    public $activities = [];
    public string $activity_flag = '';
    public mixed $activity_task_id = null;
    public string $activity_content = '';
    public mixed $activity_start_on = '';
    public mixed $activity_end_on = '';
    public string $activity_status_id = '';
    public mixed $activity_active_id = true;

    // Reply

    public $reply_flag;
    public $reply;
    public $reply_id;
    public $task_activity_id;
    public $reply_activity_id;

    public bool $showReplyPopup = false;

    public function showReplyComments($id): void
    {
        $this->task_activity_id = $id;
        $this->showReplyPopup = true;

    }


    public function mount($id): void
    {
        if ($id) {

            $this->task = $this->getTask($id);

            $this->statuses = collect(Status::cases())->mapWithKeys(fn($case) => [$case->value => $case->getname()])->toArray();

            $this->priorities = collect(Priority::cases())->mapWithKeys(fn($case) => [$case->value => $case->getname()])->toArray();

            $this->users = User::where('active_id', Active::ACTIVE)->get()->pluck('name', 'id')->toArray();

            $this->activities = $this->getActivities($this->task->id);
        }
    }

    #[On('refresh-modules')]
    public function refreshModule($v): void
    {
        $this->module_id = $v;
    }


    public function getTask($id)
    {
        $this->task_images = TaskImage::on($this->getTenantConnection())->where('task_id', $id)->get()->toarray();

        return $this->task = DB::connection($this->getTenantConnection())->table('tasks')
            ->join('jobs', 'jobs.id', '=', 'tasks.job_id')
            ->join('modules', 'modules.id', '=', 'tasks.module_id')
            ->select(
                'tasks.id as task_id',
                'tasks.title',
                'tasks.*',
                'jobs.id as job_id',
                'modules.id as module_id',
                'jobs.title as job_title',
                'modules.vname as module_name'
            )
            ->where('tasks.id', $id)
            ->first();


    }


    public function editTask()
    {
        $obj = Task::on($this->getTenantConnection())->find($this->task->id);

        $this->vid = $obj->id;
        $this->job_id = $obj->job_id;
        $this->title = $obj->title;
        $this->content = $obj->content;
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

    public function getSave(): void
    {
//        $this->validate();
        $connection = $this->getTenantConnection();

        $this->task = Task::on($connection)->updateOrCreate(
            ['id' => $this->vid],
            [
                'job_id' => $this->job_id,
                'title' => Str::ucfirst($this->title),
                'content' => $this->content,
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

        $this->dispatch('notify', ...['type' => 'success', 'content' => ($this->vid ? 'Updated' : 'Saved') . ' Successfully']);
        $this->clearFields();
    }

    public function clearFields(): void
    {
        $this->task = $this->getTask($this->vid);
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


    public function getSaveActivity(): void
    {
        $connection = $this->getTenantConnection();

        $obj = TaskActivity::on($connection)->updateOrCreate(
            ['id' => $this->activity_task_id],
            [
                'flag' => $this->activity_flag,
                'task_id' => $this->task->id,
                'content' => $this->activity_content,
                'start_on' => \Carbon\Carbon::parse($this->activity_start_on ?? now())->format('Y-m-d'),
                'end_on' => \Carbon\Carbon::parse($this->activity_end_on ?? now())->format('Y-m-d'),
                'status_id' => $this->activity_status_id ?: '1',
                'user_id' => auth()->id(),
                'active_id' => $this->activity_active_id ?: '1',
            ],
        );

        Task::on($connection)->where('id', $this->task->id)->update([
            'status_id' => $this->status_id ?: '1',
        ]);

        $this->activities = $this->getActivities($obj->task_id);

        $this->clearActivity();

        $this->dispatch('notify', ...['type' => 'success', 'content' => 'Activity updated Successfully']);
    }

    public function getActivities(mixed $task_id)
    {
        return DB::connection($this->getTenantConnection())
            ->table('task_activities')
            ->leftJoin('task_activity_replies', 'task_activities.id', '=', 'task_activity_replies.task_activity_id')
            ->where('task_activities.task_id', $this->task->id)
            ->select(
                'task_activities.id as activity_id',
                'task_activities.flag as activity_flag',
                'task_activities.content as activity_content',
                'task_activities.start_on as activity_start_on',
                'task_activities.end_on as activity_end_on',
                'task_activities.status_id as activity_status_id',
                'task_activities.user_id as activity_user_id',
                'task_activities.active_id as activity_active_id',
                'task_activities.created_at as activity_created_at',

                'task_activity_replies.id as replies_id',
                'task_activity_replies.flag as replies_flag',
                'task_activity_replies.task_activity_id as replies_task_activity_id',
                'task_activity_replies.content as replies_content',
                'task_activity_replies.user_id as replies_user_id',
                'task_activity_replies.active_id as replies_active_id',
                'task_activity_replies.created_at as replies_created_at',
            )
            ->get();

    }

    private function clearActivity(): void
    {
        $this->activity_flag = '';
        $this->activity_task_id = '';
        $this->activity_content = '';
        $this->activity_active_id = '';
    }


    public function saveReply(): void
    {
        $connection = $this->getTenantConnection();

        $obj = TaskActivityReply::on($connection)->updateOrCreate(
            ['id' => $this->reply_id],
            [
                'flag' => $this->reply_flag ?: '',
                'task_activity_id' => $this->task_activity_id ?: '1',
                'content' => $this->reply,
                'user_id' => auth()->id(),
                'active_id' => $this->reply_activity_id ?: '1',
            ],
        );

        $this->showReplyPopup = false;

        $this->dispatch('notify', ...['type' => 'success', 'content' => 'Reply Updated Successfully']);

    }

    public function editActivity($id)
    {
        $obj = TaskActivity::on($this->getTenantConnection())->find($id);
        $this->activity_task_id = $obj->id;
        $this->activity_content = $obj->content;
        $this->activity_start_on = $obj->start_on;
        $this->activity_end_on = $obj->end_on;
        $this->activity_status_id = $obj->status_id;
    }
    public function deleteFunction($id)
    {
        $obj = TaskActivity::on($this->getTenantConnection())->find($id);
        if ($obj) {
            $obj->delete();
        }
        $this->activities = $this->getActivities($obj->task_id);
    }

    public function render()
    {
        return view('devops::task-show');
    }


}
