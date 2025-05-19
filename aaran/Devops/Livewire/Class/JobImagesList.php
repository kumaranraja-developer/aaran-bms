<?php

namespace Aaran\Devops\Livewire\Class;

use Aaran\Assets\Traits\ComponentStateTrait;
use Aaran\Assets\Traits\TenantAwareTrait;
use Aaran\Devops\Models\JobImages;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;

class JobImagesList extends Component
{

    use ComponentStateTrait, TenantAwareTrait;

    #[Validate]
    public string $model = '';
    public string $model_id = '';
    public string $image_id = '';
    public string $path = '';
    public bool $active_id = true;

    public function rules(): array
    {
        return [
            'model' => 'required' . ($this->vid ? '' : "|unique:{$this->getTenantConnection()}.job_images,model"),
        ];
    }

    public function messages(): array
    {
        return [
            'model.required' => ':attribute is missing.',
            'model.unique' => 'This :attribute is already created.',
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'model' => 'JobImages name',
        ];
    }

    public function getSave(): void
    {
        $this->validate();
        $connection = $this->getTenantConnection();

        JobImages::on($connection)->updateOrCreate(
            ['id' => $this->vid],
            [
                'model' => Str::ucfirst($this->model),
                'model_id' => Str::ucfirst($this->model_id),
                'image_id' => Str::ucfirst($this->image_id),
                'path' => Str::ucfirst($this->path),
                'active_id' => $this->active_id
            ],
        );

        $this->dispatch('notify', ...['type' => 'success', 'content' => ($this->vid ? 'Updated' : 'Saved') . ' Successfully']);
        $this->clearFields();
    }
    public function clearFields(): void
    {
        $this->vid = null;
        $this->model = '';
        $this->model_id = '';
        $this->image_id = '';
        $this->path = '';
        $this->active_id = true;
        $this->searches = '';
    }

    public function getObj(int $id): void
    {
        if ($obj = JobImages::on($this->getTenantConnection())->find($id)) {
            $this->vid = $obj->id;
            $this->model = $obj->model;
            $this->model_id = $obj->model_id;
            $this->image_id = $obj->image_id;
            $this->path = $obj->path;
            $this->active_id = $obj->active_id;
        }
    }

    public function getList()
    {
        return JobImages::on($this->getTenantConnection())
            ->active($this->activeRecord)
            ->when($this->searches, fn($query) => $query->searchByName($this->searches))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function deleteFunction(): void
    {
        if (!$this->deleteId) return;

        $obj = JobImages::on($this->getTenantConnection())->find($this->deleteId);
        if ($obj) {
            $obj->delete();
        }
    }

    public function render()
    {
        return view('devops::job_images-list', [
            'list' => $this->getList()
        ]);
    }

}
