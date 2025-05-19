<?php

namespace Aaran\Devops\Livewire\Class;

use Aaran\Assets\Enums\Active;
use Aaran\Assets\Enums\Status;
use Aaran\Assets\Traits\ComponentStateTrait;
use Aaran\Assets\Traits\TenantAwareTrait;
use Aaran\Core\User\Models\User;
use Aaran\Devops\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;

class TaskList extends Component
{

    use ComponentStateTrait, TenantAwareTrait;

    #[Validate]
    public string $job_id = '';
    public string $title = '';
    public string $body = '';
    public mixed $start_at = null;
    public mixed $due_date = null;
    public string $assigned_id = '';
    public string $priority_id = '';
    public string $status_id = '';
    public bool $active_id = true;

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

    public $users;
    public $priorities;
    public $statuses;

    public function mount($id = null): void
    {
        if ($id) {
            $this->job_id = $id;
        }

        $this->users = User::where('active_id', Active::ACTIVE)->get()->pluck('name', 'id')->toArray();

        $this->priorities = collect(Status::cases())
            ->mapWithKeys(fn($case) => [$case->value => $case->getname()])->toArray();

        $this->statuses = collect(Status::cases())->mapWithKeys(fn($case) => [$case->value => $case->getname()])->toArray();

        $this->due_date = Carbon::now()->format('Y-m-d');
    }

    public function getSave(): void
    {
        $this->validate();
        $connection = $this->getTenantConnection();

        Task::on($connection)->updateOrCreate(
            ['id' => $this->vid],
            [
                'job_id' => $this->job_id,
                'title' => Str::ucfirst($this->title),
                'body' => $this->body,
                'start_at' => $this->start_at ?: now()->format("Y-m-d"),
                'due_date' => $this->due_date ?: now()->format("Y-m-d"),
                'assigned_id' => $this->assigned_id,
                'priority_id' => $this->priority_id,
                'status_id' => $this->status_id,
                'active_id' => $this->active_id
            ],
        );

        $this->dispatch('notify', ...['type' => 'success', 'body' => ($this->vid ? 'Updated' : 'Saved') . ' Successfully']);
        $this->clearFields();
    }

    public function clearFields(): void
    {
        $this->vid = null;
        $this->title = '';
        $this->body = '';
        $this->start_at = Carbon::now()->format('Y-m-d');;
        $this->due_date = Carbon::now()->addDay(1)->format('Y-m-d');
        $this->assigned_id = '';
        $this->priority_id = '';
        $this->status_id = '';
        $this->active_id = true;
        $this->searches = '';
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
            $this->assigned_id = $obj->assigned_id;
            $this->priority_id = $obj->priority_id;
            $this->status_id = $obj->status_id;
            $this->active_id = $obj->active_id;
        }
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

    public function render()
    {
        return view('devops::task-list', [
            'list' => $this->getList()
        ]);
    }

}
