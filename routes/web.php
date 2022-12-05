<?php

use Illuminate\Support\Facades\Route;
use App\Models\Comment; 
use App\Http\Livewire\Home;
use App\Http\Livewire\Login;
use App\Http\Livewire\Register;

// use Illuminate\Auth\Events\Login;

use function Termwind\render;

Route::get('/', Home::class);
Route::get('/login', Login::class);
Route::get('/register', Register::class);

Route::get('/phpinfo', function() {
    return phpinfo();
});



