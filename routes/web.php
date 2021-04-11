<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;

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

Route::get('/', function () {
    return view('home');
});


//Route::get('user', 'UserController@data');
Route::get('user',[UserController::class, 'data']);
Route::get('user/add',[UserController::class, 'add']);
Route::post('user',[UserController::class, 'addProcess']);
Route::get('user/edit/{id}',[UserController::class, 'edit']);
Route::patch('user/{id}',[UserController::class, 'editProcess']);
Route::delete('user/{id}',[UserController::class, 'delete']);

Route::get('video',[VideoController::class, 'data']);
Route::get('video/add',[VideoController::class, 'add']);
Route::post('video',[VideoController::class, 'addProcess']);
Route::get('video/edit/{id}',[VideoController::class, 'edit']);
Route::patch('video/{id}',[VideoController::class, 'editProcess']);
Route::delete('video/{id}',[VideoController::class, 'delete']);

Route::get('login', function () {
    return view('login');
});

Route::get('register', function () {
    return view('registration');
});

Route::get('forget-password', function () {
    return view('forget-password');
});

Route::get('reset-password', function () {
    return view('reset-password');
});

