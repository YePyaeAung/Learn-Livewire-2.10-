<?php

namespace App\Http\Livewire;

use App\Models\Upload;
use Livewire\Component;
use Livewire\WithFileUploads;

class Uploads extends Component
{
    use WithFileUploads;

    public $title;
    public $file;

    public function fileUpload()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'file' => 'required',
        ]);
        $file = $this->file->store('files', 'public');
        $validatedData['file'] = $file;
        Upload::create($validatedData);
        session()->flash('message', 'File Uploaded Successfully!');
        $this->emit('fileUploaded');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.uploads');
    }
}
