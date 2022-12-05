<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Register extends Component
{
    public function submit()
    {
        dd('edsf');
    }


    public function render()
    {
        return view('livewire.register');
                // -> extends('any')
                // -> section('body');
    }
}
