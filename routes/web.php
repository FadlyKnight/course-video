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
    return view('landing.index');
});


//Route::get('user', 'UserController@data');
Route::group(['middleware' => ['auth','role:admin'], 'prefix' => 'dashboard' ], function () {
    Route::get('user', 'UserController@data');
    Route::get('user/add', 'UserController@add');
    Route::post('user', 'UserController@addProcess');
    Route::get('user/edit/{id}', 'UserController@edit');
    Route::patch('user/{id}', 'UserController@editProcess');
    Route::delete('user/{id}', 'UserController@delete');

    Route::get('video','VideoController@data');
    Route::get('video/add','VideoController@add');
    Route::post('video','VideoController@addProcess');
    Route::get('video/edit/{id}','VideoController@edit');
    Route::patch('video/{id}','VideoController@editProcess');
    Route::delete('video/{id}','VideoController@delete');
});

Route::get('login', function () {
    return view('login');
});
Route::post('login', 'AuthCustomController@login')->name('login.post');

Route::get('register', function () {
    return view('registration');
});
Route::post('register', 'AuthCustomController@register')->name('register.post');

Route::get('forget-password', function () {
    return view('forget-password');
});

Route::get('reset-password', function () {
    return view('reset-password');
});