<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class pass extends Controller
{
    //
    public function home()
    {

        $data=["a","h","n"];
        return view('home',compact('data'));
    }
}
