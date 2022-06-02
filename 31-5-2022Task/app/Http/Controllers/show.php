<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class show extends Controller
{
    //
    public function calculate(Request $request)
    {
         $result=0;
          $num1=$request->input('firstnumber');
          $num2=$request->input('secoundnumber');
          $operator=$request->input('operator');
          if($operator=='+')
            {
                $result=$num1+$num2;
            }
            elseif($operator=='-')
            {
                $result=$num1-$num2; 
            }
            elseif($operator=='*')
            {
                $result=$num1*$num2; 
            }
            elseif($operator=='/')
            {
                $result=$num1/$num2; 
            } 
             
            return view('calculate',compact('result'));    
    }
}
