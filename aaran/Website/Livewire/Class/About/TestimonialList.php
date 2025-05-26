<?php

namespace Aaran\Website\Livewire\Class\About;

use Aaran\Assets\Traits\ComponentStateTrait;
use Aaran\Website\Models\Testimonial;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class TestimonialList extends Component
{
    use ComponentStateTrait;
    use WithFileUploads;

    #[Validate]
    public string $vname = '';
    public string $company = '';
    #[validate('image|max:1024')]
    public $photo;
    public string $testimonial = '';
    public string $address = '';
    public string $cities = '';

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

        $photoPath = $this->photo ? $this->photo->store('photos','public') : null;

        Testimonial::updateOrCreate(
            ['id' => $this->vid],
            [
                'vname' => Str::ucfirst($this->vname),
                'company' => $this->company,
                'photo' => $photoPath ? basename($photoPath) : $this->photo,
                'testimonial' => $this->testimonial,
                'address' => $this->address,
                'cities' => $this->cities,
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
        $this->address = '';
        $this->cities = '';
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
            $this->address = $obj->address;
            $this->cities = $obj->cities;
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
