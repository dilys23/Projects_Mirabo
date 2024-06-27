<?php

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
