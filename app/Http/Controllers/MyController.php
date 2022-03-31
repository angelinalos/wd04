<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{

    public function myPage(){
        $name = 'Лось Ангелина Юрьевна';
        return view('test.test', [
            'name'=>$name
        ]);
    }

}
