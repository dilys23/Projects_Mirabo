<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DemoController extends Controller
{
    public function queryBuilder()
    {
        $data1 = DB::table('users')->get();
        $data2 = DB::table('users')->select('name')->get();
        $data3 = DB::table('users')->where('id', 2) ->get();
        // $data4 = DB::table('users')->where ('id', 1) -> orwhere('status',1) ->get();
        $data5 = DB::table('users')->orderBy('name', 'DESC')->get();
        $data6 = DB::table('users')->where('id', 2)->update(['name'=>'Khoai ne he']);
        $data7 = DB::table('users')->where('id', 2)->delete();
        dd($data6);
    }

    public function testSession()
    {
        Session::put('user', 'Thông tin user');
        $ss = Session::get('user');
        var_dump($ss);
    }

    public function store(Request $request)
    {
        $request->session()->put('key', 'value');
        return response('Session data stored');

    }

    public function show(Request $request)
    //
    {
        if($request->session()->has('key'))
        {
            $value = $request->session()->get('key');
            return response('Session data: ', $value);
        }
        return response('No session data found');

    }

    public function destroy(Request $request)
    {
        $request->session()->forget('key');
        return response('sesssion');
    }

    //ORM
    public function eloquent()
    {
        $product = Product::all();
        $product1 = Product::find(1);
        $product2 = Product::where('status', 1)->first();
        $product3 = Product::select('id', 'name')->where('status', 1)->get();
        $product4 = Product::count();
        $product5 = Product::find(1);
        $product5->name = "Oppe A54s";
        $product5->save();
        $product6 = new Product;
        $product6->name = 'Nokia';
        $product->save();
        //delete
        $product = Product::find(1);
        $product->delete();

        Product::destroy(1);
        logger()->info('Products fetched:', $product1->toArray());
        return response()->json($product1);
    }

}
