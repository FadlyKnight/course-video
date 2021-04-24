<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function watchVideo($id){
        try {
            $id = decrypt($id);
            $video = DB::table('video')->where('id', $id)->first();
            if($video){
                return view('landing.video', compact('video'));
            }
            return redirect()->route('landing.index');
        } catch (DecryptException $e) {
            return redirect()->route('landing.index');
        }
    }

    public function index(){
        $video = DB::table('video')->get();
        return view('landing.index', compact('video'));
    }

    public function about()
    {
        return view ('landing.about');
    }
}
