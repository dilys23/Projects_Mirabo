<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function showregisterForm()
    {
        return view('auth.register');
    }
    public function registerUser(Request $request)
    {
       $validator = Validator::make($request->all(),[
        'name' => 'required|string|between:2,100',
        'email' => 'required|string|email|max:100|unique:users',
        'password' => 'required|string|confirmed|min:6'
       ]);
         if($validator->fails())
         {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),]);
        Auth::login($user);
        return redirect()->route('dashboard');
    }


    public function showloginForm()
    {
        return view('auth.login');
    }
    public function loginUser(Request $request)
    {
        $login = $request->only('email','password');

        try {
            if(!$token = JWTAuth::attempt($login))
            {
               return response()->json(['error'=>'invalid_login'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
            //throw $th;
        }
        return response()->json(compact('token'));

    }

    public function logout(Request $request)
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function getUser(Request $request)
    {
        try {
            if(!$user = JWTAuth::parseToken()->authenticate())
            {
                return response()->json(['user_not_found'], 404);
            }
        } catch (TokenExpiredException $e) {
            // return response()->json(['token_expired'], $e->getStatusCode());
            //throw $th;
        } catch(TokenInvalidException $e)
        {

        } catch(JWTException $e)
        {

        }
        return response()->json(compact('user'));
    }

    //
}
