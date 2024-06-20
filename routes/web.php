<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function () {
    return "welcome to my website";
});

Route::get('/array', function()
{
    return ['xoai', 'cam', 'tofu'];
});
Route::get('/json', function()
{
    return response() -> json ([
        'name' => 'Nguyen Thi Le',
         'email' => 'lenguyen@gmail.com'
    ]);
});
