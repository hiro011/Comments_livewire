<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Livewire;

class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $this-> validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
        ]);

        session()->put('LoggedUser', $this->email);
        
        return redirect(route('home'));
    }

    public function render()
    {
        return view('livewire.login');
    }
}
