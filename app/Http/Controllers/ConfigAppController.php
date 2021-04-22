<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigAppController extends Controller
{
    public function dashboard(){
        return view('config.dashboard');
    }
    public function configSlider()
    {
        dd(request()->all());
    }

    public function configAbout()
    {

    }
    
    // public function 
}
