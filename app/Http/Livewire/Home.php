<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Home extends Component
{
    // public $user = session('LoggedUser');
    public function render()
    {
        return view('livewire.home');
    }
}
