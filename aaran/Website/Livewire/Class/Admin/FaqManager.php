<?php

namespace Aaran\Website\Livewire\Class\Admin;

use Aaran\Website\Models\Faq;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('Ui::components.layouts.web')]
class FaqManager extends Component
{

    public $question, $answer, $editFaqId = null;



    public function saveFaq()
    {
        $this->validate([
            'question' => 'required|string|max:255',
            'answer' => 'nullable|string',
        ]);

        Faq::updateOrCreate(
            ['id' => $this->editFaqId],
            [
                'question' => $this->question,
                'answer' => $this->answer,
                'is_static' => true,
                'is_answered' => $this->answer ? true : false,
            ]
        );

        $this->reset(['question', 'answer', 'editFaqId']);
    }

    public function editFaq($id)
    {
        $faq = Faq::findOrFail($id);
        $this->editFaqId = $faq->id;
        $this->question = $faq->question;
        $this->answer = $faq->answer;
    }

    public function deleteFaq($id)
    {
        Faq::findOrFail($id)->delete();
    }

    public function render()
    {
        return view('website::admin.faq-manager', [
            'faqs' => Faq::orderByDesc('id')->get(),
        ]);
    }

}
