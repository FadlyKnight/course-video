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

Route::get('/', 'LandingController@index')->name('landing.index');

Route::middleware(['auth'])->group(function () {   
    Route::get('/video/{id}', 'LandingController@watchVideo')->name('landing.video');
    
    Route::prefix('ajax')->group(function () {    
        Route::get('/diskusi/{id}', 'DiscussionController@index')->name('diskusi.index');
        Route::post('/diskusi/store/{id}', 'DiscussionController@store')->name('diskusi.store');
        Route::post('/diskusi/update/{id}', 'DiscussionController@update')->name('diskusi.update');
        Route::post('/diskusi/destroy', 'DiscussionController@destroy')->name('diskusi.destroy');
    });
});


//Route::get('user', 'UserController@data');
Route::group(['middleware' => ['auth','role:admin'], 'prefix' => 'dashboard' ], function () {
    Route::get('/', 'ConfigAppController@dashboard')->name('admin.dashboard');

    Route::get('user', 'UserController@data')->name('user.data');
    Route::get('user/add', 'UserController@add')->name('user.add');
    Route::post('user', 'UserController@addProcess')->name('user.addProcess');
    Route::get('user/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::patch('user/{id}', 'UserController@editProcess')->name('user.editProcess');
    Route::delete('user/{id}', 'UserController@delete')->name('user.delete');

    Route::get('video','VideoController@data')->name('video.data');
    Route::get('video/add','VideoController@add')->name('video.add');
    Route::post('video','VideoController@addProcess')->name('video.addProcess');
    Route::get('video/edit/{id}','VideoController@edit')->name('video.edit');
    Route::patch('video/{id}','VideoController@editProcess')->name('video.editProcess');
    Route::delete('video/{id}','VideoController@delete')->name('video.delete');
});

Route::get('login', function () {
    return view('login');
});
Route::post('login', 'AuthCustomController@login')->name('login.post');

Route::get('register', function () {
    return view('registration');
});
Route::post('register', 'AuthCustomController@register')->name('register.post');
Route::post('logout', 'AuthCustomController@logout')->name('logout.post');

// Route::get('forget-password', function () {
//     return view('forget-password');
// });

// Route::get('reset-password', function () {
//     return view('reset-password');
// });