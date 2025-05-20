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
use Aaran\Devops\Models\TaskCommentImage;
use Aaran\Devops\Models\TaskComments;
use Aaran\Devops\Models\TaskImage;
use Aaran\Devops\Models\TaskReply;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class TaskShow extends Component
{

    use ComponentStateTrait, TenantAwareTrait, WithFileUploads;

    public mixed $task = null;
    public mixed $comments = null;
    public mixed $replies = null;
    public mixed $images = null;
    public mixed $comment_images = null;

    public function mount($id = null): void
    {
        if ($id) {
            $this->task = Task::on($this->getTenantConnection())->findOrFail($id);
            $this->comments = TaskComments::on($this->getTenantConnection())->where('task_id', $this->task->id)->get();
            $this->replies = TaskReply::on($this->getTenantConnection())->where('task_id', $this->task->id)->get();
            $this->images = TaskImage::on($this->getTenantConnection())->where('task_id', $this->task->id)->get();
            $this->comment_images = TaskCommentImage::on($this->getTenantConnection())->where('task_id', $this->task->id)->get();
        }
    }

    public function render()
    {
        return view('devops::task-show');
    }

}
