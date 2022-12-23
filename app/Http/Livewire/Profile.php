<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public function logout()
    {
        Auth::logout();

        return redirect(route('login'));
    }
    public function render()
    {
        if (session()->has('LoggedUser')){
            return view('livewire.profile', ['user' => User::where('email', session('LoggedUser'))->first()]);
        }
        return view('livewire.profile');
    }
}
