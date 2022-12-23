<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Home;
use App\Http\Livewire\Login;
use App\Http\Livewire\Register;

// use Illuminate\Auth\Events\Login;

Route::get('/', Home::class)->name('home')->middleware('auth');

Route::group(['middleware'=>'guest'], function(){
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class);
});



Route::get('/phpinfo', function() {
    return phpinfo();
});



