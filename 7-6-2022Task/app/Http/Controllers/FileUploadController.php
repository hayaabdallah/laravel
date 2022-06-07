<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileUploadController extends Controller
{
    //
    public function index()
    {
        return view('file-upload');
    }
 
    public function store(Request $request)
    {
         
        $validatedData = $request->validate([
         'file' => 'required|file|mimes:csv,txt,xlx,xls,pdf,jpg,png|max:2048',
        ]);
        
       //to retrieve the file original name
        $name = $request->file('file')->getClientOriginalName();

       // upload an file into the files folder
        $path = $request->file('file')->store('public/files');
 
       //to save name and path in database
        $save = new File;
 
        $save->name = $name;
        $save->path = $path;

        $save->save();
 
        return redirect('file-upload')->with('status', 'File Has been uploaded successfully in laravel 8');
 
    }
}
