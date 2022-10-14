<?php

use Illuminate\Support\Facades\Route;
use App\Models\Comment;
 
Route::get('/', function () {
    return view('welcome');
});

Route::get('/phpinfo', function() {
    return phpinfo();
});

