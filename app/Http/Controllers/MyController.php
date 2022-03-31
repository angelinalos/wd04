<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{

    public function myPage(){
        return view('test.test');
    }

    public function auth(){
        return view('my-auth.login');
    }
}
