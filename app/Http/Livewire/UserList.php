<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
class UserList extends Component
{
    public function render()
    {
        return view('livewire.user-list')
        ->with('users',User::all());
    }
}
