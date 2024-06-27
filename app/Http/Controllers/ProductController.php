<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index(){
        $title = 'Hello Le nene';
        $x = '23';
        $y = '12';
        $name  = 'dilysnguyen';
        $myphone = [
            'name' => 'oppo',
            'phone' => 'abc'];

        // return view('products.index', compact('title', 'x', 'y', 'name', 'myphone'));
        // return view('products.index', ['myphone' =>$myphone]);
        // return view('products.index') ->with(['title'=> $title , 'x'=> $x,'y'=> $y, 'name'=> $name, 'myphone' => $myphone]);

        return view ('products.index', compact('myphone'));
        // print_r(route('products'));// get route's name
        // return view('products.index');

    }
    //Lưu trữ 1 biến trong session và lấy giá trị của biến đó trong Controller
    public function testSession()
    {
        // Tạo session với key là 1 mảng
        Session::put('user.id', '1');
        Session::put('user.name', 'Công nghệ 5s');
        $ss = Session::get('user');
        var_dump($ss);
    }
    public function about()
    {
        return 'This is About page';
    }
    //
}
