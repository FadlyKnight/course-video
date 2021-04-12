<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function watchVideo(){
        $video = DB::table('video')->get();
        return view('landing.video', compact('video'));
    }
}
