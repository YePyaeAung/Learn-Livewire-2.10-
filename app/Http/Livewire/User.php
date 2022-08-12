<?php

namespace App\Http\Livewire;

use App\Models\User as ModelsUser;
use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;

    public function render()
    {
        $users = ModelsUser::paginate(5);
        return view('livewire.user', compact('users'));
    }
}
