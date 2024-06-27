<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    //
}
