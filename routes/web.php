<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('products', [
    ProductController::class,
    'index' // index function of ProductsController
]);

Route::get('products/{id}', [
    ProductController::class,
    'detail' // index function of ProductsController
]);

Route::get('about', [
    ProductController::class,
    'about']);
/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/homepage', function () {
    return view('home');
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
*/
