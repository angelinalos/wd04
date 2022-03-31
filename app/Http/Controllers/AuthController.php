<?php

namespace App\Http\Controllers;

use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function GuzzleHttp\Promise\all;

class AuthController extends Controller
{
    public function login(){
        return view('my-auth.login');
    }

    public function auth(Request $request){
//dump(all());
        Auth::attempt($request->only(['email', 'password']));
    }

    public function logout(){
       Auth::logout();
    }
}


