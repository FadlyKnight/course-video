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
        $pelatihan = DB::table('pelatihan')
            ->get()
            ->map(function($query){
                $data['pelatihan_data'] = $query;
                $data['video_data'] = DB::table('video')->where('pelatihan_id', $query->id)->take(4)->get(); 
                return $data;
            });
        // dd($pelatihan);
        $video = DB::table('video')->get();

        return view('landing.index', compact('video','pelatihan'));
    }

    public function about()
    {
        return view ('landing.about');
    }

    public function pelatihan($slug){
        $pelatihan = DB::table('pelatihan')->where('slug', $slug)->first();
        $filter = request()->category;
        if($pelatihan == NULL){
            return redirect()->route('landing.index')->with('error','Pelatihan Tidak Ditemukan');
        }
        $video = DB::table('video')->where('pelatihan_id', $pelatihan->id)
                        ->when($filter, function ($query, $filter) {
                            return $query->where('category', $filter);
                        })->get();
        // if ($filter != NULL) {
        //     dd($filter, $video);
        // }
        
        return view ('landing.pelatihan', compact('video','pelatihan'));
    }
}
