<?php

namespace App\Http\Livewire;

use App\Models\Student as ModelsStudent;
use Livewire\Component;
use Livewire\WithPagination;

class Student extends Component
{
    use WithPagination;

    public $ids;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $searchTerm;

    public function resetInputFields()
    {
        $this->firstname = '';
        $this->lastname = '';
        $this->email = '';
        $this->phone = '';
    }

    public function store()
    {
        $validatedData = $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);
        ModelsStudent::create($validatedData);
        session()->flash('message', 'Student Added Successfully!');
        $this->resetInputFields();
        // $this->reset();
        $this->emit('studentAdded');
    }

    public function edit($id)
    {
        $student = ModelsStudent::where('id', $id)->first();
        $this->ids = $student->id;
        $this->firstname = $student->firstname;
        $this->lastname = $student->lastname;
        $this->email = $student->email;
        $this->phone = $student->phone;
    }

    public function update()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);
        if($this->ids) {
            $student = ModelsStudent::find($this->ids);
            $student->update([
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'email' => $this->email,
                'phone' => $this->phone,
            ]);
            session()->flash('message', 'Student Updated Successfully!');
            $this->resetInputFields();
            // $this->reset();
            $this->emit('studentUpdated');
        }
    }

    public function delete($id)
    {
        if($id) {
            ModelsStudent::where('id', $id)->delete();
            session()->flash('message', 'Student Deleted Successfully!');
        }
    }

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $students = ModelsStudent::where('firstname', 'LIKE', $searchTerm)
            ->orWhere('lastname', 'LIKE', $searchTerm)
            ->orWhere('email', 'LIKE', $searchTerm)
            ->orWhere('phone', 'LIKE', $searchTerm)
            ->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.student', compact('students'));
    }
}
