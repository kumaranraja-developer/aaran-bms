<?php

namespace Aaran\UI\Livewire\Class;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class MarkdownEditor extends Component
{
    use WithFileUploads;

    public $content = '';
    public $preview = false;
    public $uploads = [];
    public $uploadProgress = 0;
    public $uploadError = null;

    protected $listeners = ['insertMarkdown' => 'insertText'];

    public function togglePreview()
    {
        $this->preview = !$this->preview;
    }

    public function insertText($text)
    {
        $this->content .= $text;
        $this->dispatchBrowserEvent('markdown-focus');
    }

    public function uploadFiles()
    {
        $this->validate([
            'uploads.*' => 'image|max:2048', // 2MB max
        ]);

        $this->uploadProgress = 0;
        $this->uploadError = null;
        $totalFiles = count($this->uploads);

        foreach ($this->uploads as $upload) {
            try {
                $path = $upload->store('public/markdown-uploads');
                $url = Storage::url($path);
                $this->content .= "\n![".$upload->getClientOriginalName()."]($url)";
                $this->uploadProgress += (100 / $totalFiles);
            } catch (\Exception $e) {
                $this->uploadError = 'Failed to upload: '.$e->getMessage();
                break;
            }
        }

        $this->uploads = [];
        $this->dispatchBrowserEvent('markdown-focus');
    }

    public function render()
    {
        return view('Ui::markdown-editor');
    }
}
