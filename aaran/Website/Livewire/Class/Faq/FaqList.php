<?php

namespace Aaran\Website\Livewire\Class\Faq;

use Aaran\Assets\Traits\ComponentStateTrait;
use Aaran\Website\Models\Faq;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('Ui::components.layouts.web')]

class FaqList extends Component
{
    use ComponentStateTrait;

    #[Validate]
    public string $question = '';
    public string $answer = '';
    public bool $is_static = false;
    public bool $is_answered = false;

// controls popup visibility
    public bool $showForm = false;
    public bool $showAskForm = false;


    public function toggleForm(): void
    {
        $this->showForm = !$this->showForm;
    }
    public function rules(): array
    {
        return [
            'question' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'question.required' => ':attribute.',
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'question' => 'Ask question',
        ];
    }

    public function getSave(): void
    {

        $this->validate();

        Faq::updateOrCreate(
            ['id' => $this->vid],
            [
                'question' => Str::ucfirst($this->question),
                'answer' => Str::ucfirst($this->answer),
                'is_static' => false,
                'is_answered' => false,

//                'showAskForm' => $this->showAskForm,

            ],
        );

        $this->dispatch('notify', ...['type' => 'success', 'content' => ($this->vid ? 'Updated' : 'Saved') . ' Successfully']);
        $this->clearFields();
        $this->showAskForm = false;
    }

    public function clearFields(): void
    {
        $this->vid = null;
        $this->question = '';
        $this->answer = '';
        $this->is_static = false;
        $this->is_answered = false;

//        $this->showAskForm = false;

    }

    public function getObj(int $id): void
    {
        if ($obj = Faq::find($id)) {
            $this->vid = $obj->id;
            $this->question = $obj->question;
            $this->answer = $obj->answer;
            $this->is_static = $obj->is_static;
            $this->is_answered = $obj->is_answered;
        }
    }

    public function getList()
    {
        return Faq::active($this->activeRecord)
            ->when($this->searches, fn($query) => $query->searchByName($this->searches))
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function deleteFunction(): void
    {
        if (!$this->deleteId) return;

        $obj = Faq::find($this->deleteId);
        if ($obj) {
            $obj->delete();
        }
    }
    public function render()
    {
        $faqs = Faq::where(function ($query) {
            $query->where('is_static', true)
                ->orWhere(function ($q) {
                    $q->where('is_static', false)
                        ->where('is_answered', true);
                });
        })->get();

        return view('website::faq.faq-list', [
            'faqs' => $faqs,
        ]);
    }

}
