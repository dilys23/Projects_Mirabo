<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomAuthController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    'about'
]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [
    CustomAuthController::class,
    'login'
]);
Route::get('/registration', [
    CustomAuthController::class,
    'registration'
]);

Route::post("/register-user", [
    CustomAuthController::class,
    'registerUser'])->name('register-user');

Route::post("/login-user", [
    CustomAuthController::class,
    'loginUser'])->name('login-user');

Route::get("/dashboard", [CustomAuthController::class,
'dashboard']);

Route::get("/logout", [CustomAuthController::class,
'logout']);
/*


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
