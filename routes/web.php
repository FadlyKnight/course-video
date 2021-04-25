<?php

use Illuminate\Support\Facades\Route;

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
Route::get('about', function () {
    return view('landing.about');
});
<<<<<<< HEAD

=======
>>>>>>> a5d4733e5187bef6264635896eb28aedb37b0a8d

Route::middleware(['auth'])->group(function () {   
    Route::get('/video/{id}', 'LandingController@watchVideo')->name('landing.video');
    Route::get('pelatihan/{slug}','LandingController@pelatihan')->name('landing.pelatihan');

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

    Route::get('course', 'PelatihanController@data')->name('course.data');
    Route::get('course/add', 'PelatihanController@add')->name('course.add');
    Route::post('course', 'PelatihanController@addProcess')->name('course.addProcess');
    Route::get('course/edit/{id}', 'PelatihanController@edit')->name('course.edit');
    Route::patch('course/{id}', 'PelatihanController@editProcess')->name('course.editProcess');
    Route::delete('course/{id}', 'PelatihanController@delete')->name('course.delete');

    
    Route::post('config/slider', 'ConfigAppController@configSlider')->name('config.slider');
    Route::post('config/about', 'ConfigAppController@configAbout')->name('config.about');
    
});

Route::get('login', function () {
    return view('login');
});
Route::post('login', 'AuthCustomController@login')->name('login.post');

// Route::post('register', 'AuthCustomController@register')->name('register.post');
Route::post('logout', 'AuthCustomController@logout')->name('logout.post');

// Route::get('forget-password', function () {
//     return view('forget-password');
// });

// Route::get('reset-password', function () {
//     return view('reset-password');
// });