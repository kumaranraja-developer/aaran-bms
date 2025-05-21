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
use Aaran\Devops\Models\TaskImage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class TaskList extends Component
{

    use ComponentStateTrait, TenantAwareTrait, WithFileUploads;

    #[Validate]
    public string $job_id = '';
    public string $title = '';
    public string $body = '';
    public mixed $start_at = null;
    public mixed $due_date = null;
    public string $module_id = '';
    public string $allocated_id = '';
    public string $reporter_id = '';
    public string $priority_id = '';
    public string $status_id = '';
    public bool $active_id = true;
    public mixed $filter = '';
    public $jobCollection = [];
    public $moduleCollection = [];

    public $image;
    public array $images = [];
    public bool $isUploaded = false;

    public $users;
    public $priorities;
    public $statuses;
    public $flag;

    public $old_images = [];
    public $jobFilter = [];


    public function rules(): array
    {
        return [
            'title' => 'required',
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
            'title' => 'Title',
        ];
    }

    public function mount($id = null): void
    {
        if ($id) {
            $this->job_id = $id;
        }

        $this->users = User::where('active_id', Active::ACTIVE)->get()->pluck('name', 'id')->toArray();

        $this->priorities = collect(Priority::cases())
            ->mapWithKeys(fn($case) => [$case->value => $case->getname()])->toArray();

        $this->statuses = collect(Status::cases())->mapWithKeys(fn($case) => [$case->value => $case->getname()])->toArray();

        $this->due_date = Carbon::now()->format('Y-m-d');
    }

    public function getSave(): void
    {
        $this->validate();
        $connection = $this->getTenantConnection();

        $obj = Task::on($connection)->updateOrCreate(
            ['id' => $this->vid],
            [
                'job_id' => $this->job_id,
                'title' => Str::ucfirst($this->title),
                'body' => $this->body,
                'start_at' => $this->start_at ?: now()->format("Y-m-d"),
                'due_date' => $this->due_date ?: now()->format("Y-m-d"),
                'module_id' => $this->module_id ?:'1',
                'allocated_id' => $this->allocated_id ?:'1',
                'priority_id' => $this->priority_id ?:'1',
                'reporter_id' => $this->reporter_id ?:'1',
                'status_id' => $this->status_id ?:'1',
                'active_id' => $this->active_id ?:'1',
            ],
        );

        $this->saveImage($obj->id, $this->images);

        $this->dispatch('notify', ...['type' => 'success', 'body' => ($this->vid ? 'Updated' : 'Saved') . ' Successfully']);
        $this->clearFields();
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


    public function clearFields(): void
    {
        $this->vid = null;
        $this->title = '';
        $this->body = '';
        $this->start_at = Carbon::now()->format('Y-m-d');;
        $this->due_date = Carbon::now()->addDay(1)->format('Y-m-d');
        $this->module_id = '';
        $this->allocated_id = '';
        $this->reporter_id = '';
        $this->priority_id = '';
        $this->status_id = '';
        $this->active_id = true;
        $this->searches = '';
        $this->images = [];
        $this->isUploaded = false;
        $this->dispatch('refresh-modules-lookup', '');
    }

    public function getObj(int $id): void
    {
        if ($obj = Task::on($this->getTenantConnection())->find($id)) {
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
                ->where('task_id', $id)
                ->get(['id', 'image'])
                ->toArray();
        }
        $this->dispatch('refresh-modules-lookup', $obj->module->vname);

    }

    public function DeleteImage($id)
    {
        $image = TaskImage::on($this->getTenantConnection())->find($id);

        if ($image) {
            // Delete the file from storage
            Storage::disk('public')->delete('images/' . $image->image);

            $image->delete();
        }
    }


    public function getTaskImage($id)
    {
        $data = TaskImage::on($this->getTenantConnection())->where('task_id', $id)->get();
        $arrayImage = [];
        foreach ($data as $key => $value) {
            $arrayImage[$key]['imgSrc'] = URL(\Illuminate\Support\Facades\Storage::url('images/' . $value->image));
        }
        return $arrayImage;
    }

    public function getList()
    {
        return Task::on($this->getTenantConnection())
            ->where('job_id', $this->job_id)
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

    #[On('refresh-modules')]
    public function refreshTransport($v): void
    {
        $this->module_id = $v;
    }

    public function render()
    {
        return view('devops::task-list', [
            'list' => $this->getList()
        ]);
    }

}
