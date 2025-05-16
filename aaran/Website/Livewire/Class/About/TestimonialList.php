<?php

namespace Aaran\Website\Livewire\Class\About;

use Aaran\Assets\Traits\ComponentStateTrait;
use Aaran\Website\Models\Testimonial;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;

class TestimonialList extends Component
{
    use ComponentStateTrait;

    #[Validate]
    public string $vname = '';
    public string $company = '';
    public string $photo = '';
    public string $testimonial = '';

    public bool $active_id = true;

    public function rules(): array
    {
        return [
            'vname' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'vname.required' => ':attribute is missing.',
            'vname.unique' => 'This :attribute is already created.',
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'vname' => 'Testimonial',
        ];
    }

    public function getSave(): void
    {
        $this->validate();


        Testimonial::updateOrCreate(
            ['id' => $this->vid],
            [
                'vname' => Str::ucfirst($this->vname),
                'company' => $this->company,
                'photo' => $this->photo,
                'testimonial' => $this->testimonial,
                'active_id' => $this->active_id
            ],
        );

        $this->dispatch('notify', ...['type' => 'success', 'content' => ($this->vid ? 'Updated' : 'Saved') . ' Successfully']);
        $this->clearFields();
    }
    public function clearFields(): void
    {
        $this->vid = null;
        $this->vname = '';
        $this->company = '';
        $this->photo = '';
        $this->testimonial = '';
        $this->active_id = true;
        $this->searches = '';
    }

    public function getObj(int $id): void
    {
        if ($obj = Testimonial::find($id)) {
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->company = $obj->company;
            $this->photo = $obj->photo;
            $this->testimonial = $obj->testimonial;
            $this->active_id = $obj->active_id;
        }
    }

    public function getList()
    {
        return Testimonial::active($this->activeRecord)
            ->when($this->searches, fn($query) => $query->searchByName($this->searches))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function deleteFunction(): void
    {
        if (!$this->deleteId) return;

        $obj = Testimonial::find($this->deleteId);
        if ($obj) {
            $obj->delete();
        }
    }

    public function render()
    {
        return view('website::about.testimonial-list', [
            'list' => $this->getList()
        ]);
    }
}
