<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\pass;
use App\Http\Controllers\show;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/task1', function () {
    return view('task1');
});

Route::get('/task2', function () {
    return view('task2');
});

Route::get('/getid', function () {
    return view('getid');
});

Route::get('/post', function () {
    return view('posts.post');
});

Route::get('/home',[pass::class,'home']);
Route::get('/getall',[RegisterController::class,'getdata']);
Route::get('/getid',[RegisterController::class,'getid']);

Route::get('/calculate',[show::class,'calculate']);