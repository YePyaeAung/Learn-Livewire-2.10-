<?php

namespace App\Http\Livewire;

use App\Models\User as ModelsUser;
use Livewire\Component;

class User extends Component
{
    public $users;

    public function render()
    {
        $this->users = ModelsUser::all();
        return view('livewire.user');
    }
}
