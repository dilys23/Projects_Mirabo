<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function()
{
    return "Xin chao cac ban";
});

//Redirect Routes
Route::redirect('/here', 'there', 301);
//-> Redirect dùng để điều hướng routes sang các routes khác tránh lỗi 404

// View Routes
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);
// -> Đơn giản và ngắn gọn , giúp định nghĩa các tuyến đường trả về view ko cần tạo closure hay controller

Route::get('demo-querybuilder',  [DemoController::class, 'queryBuilder'])->name('queryBuilder');

Route::get('demo-session', 'DemoController@testSession');


Route::get('/session/store', [DemoController::class, 'store']);
Route::get('/session/show', [DemoController::class, 'show']);
Route::get('/session/destroy', [DemoController::class, 'destroy']);

Route::get('demo-eloquent', [DemoController::class, 'eloquent']);

Route::get('/register', [AuthController::class, 'showregisterForm']);
Route::post('/register', [AuthController::class, 'registerUser']);

Route::get('/login', [AuthController::class, 'showloginForm']);
Route::post('/login', [AuthController::class, 'loginUser']);
Route::get('/logout', [AuthController::class, 'logoutUser']);
Route::get('/dashboard', [AuthController::class, 'showdashboard'])->name('dashboard')->middleware('auth');
Route::get('user', [AuthController::class, 'getUser'])->middleware('jwt.verify');
