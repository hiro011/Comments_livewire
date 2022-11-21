<?php

use Illuminate\Support\Facades\Route;
use App\Models\Comment;
 
// Route::get('/', 'home');
Route::get('/', function () {
    return view('home');
});

Route::get('/phpinfo', function() {
    return phpinfo();
});

