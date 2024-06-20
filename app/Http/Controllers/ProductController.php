<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function detail()
    {
        
    }
    public function about()
    {
        return 'This is About page';
    }
    //
}
