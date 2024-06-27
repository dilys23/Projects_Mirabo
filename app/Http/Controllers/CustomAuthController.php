<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    //
    public function login()
    {
        return view("auth.login");
    }

    public function registration()
    {
        return view("auth.registration");
    }
    public function registerUser(Request $request)
    {
        // echo "Value posted";
        $request -> validate(
            [
                'name'=> 'required',
                'email'=> 'required|email|unique:users',
                'password' => 'required|min:5|max:12'
                ]
        );
        $user = new User();
        $user->name = $request->name;
        $user->email = $request -> email;
        $user->password = Hash::make($request->password);
        $res = $user -> save();
        if($res)
        {
            return back()->with('success', 'You have register successfuly');
        }
        else {
            return back()->with('fail', 'You can not register');
        }
    }
    public function loginUser(Request $request)
    {
        $request -> validate(
            [
                'email'=> 'required|email',
                'password' => 'required|min:5|max:12'
                ]
        );
        $user = User::where('email', '=', $request->email)->first();
        if($user)
        {
            if(Hash::check($request->password, $user->password))
            {
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
                // return back()->with('success', 'Login successful');
            }else
            {
                return back()->with('fail', 'Login failed');
            }

        }else
        {
            return back()->with('fail', 'Your email can not registered');
        }
    }

    public function dashboard()
    {
        $data = array();
        if(Session::has('loginId'))
        {
            $data =  User::where('id', '=', Session::get('loginId'))->first();
            if($data)
            {
                $data = $data->toArray();
            }
        }
        return view("auth.dashboard",compact('data') );
    }

    public function logout()
    {
        if(Session::has('loginId'))
        {
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
