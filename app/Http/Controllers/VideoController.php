<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    public function data()
    {
<<<<<<< HEAD
        $video = DB::table('video')->get();
=======
        $video = DB::table('video')
                ->leftJoin('pelatihan', function($join){
                    $join->on('pelatihan.id','=','video.pelatihan_id');
                })->select('pelatihan.*','pelatihan.created_at as pelatihan_create',
                'pelatihan.id as pelatihan_id','video.*')
                ->get();
        // dd($video);
>>>>>>> a5d4733e5187bef6264635896eb28aedb37b0a8d
        //return $users;
        return view('video.data', ['video' => $video]);
    }

    public function add()
    {
        return view ('video.add');
    }

    public function addProcess(Request $request)
    {
        DB::table('video')->insert([
            'title' => $request->title,
            'desc' => $request->desc,
            'url' => $request->url,
            'materi' => $request->materi,
            'category' => $request->category,
            'name' => $request->name,
            'pelatihan_id' => $request->pelatihan_id,
<<<<<<< HEAD
=======
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
>>>>>>> a5d4733e5187bef6264635896eb28aedb37b0a8d
        ]);

        return redirect()->route('video.data')->with('status', 'Data berhasil ditambah!');
    }

    public function edit($id)
    {
        $video = DB::table('video')->where('id', $id)->first();
        //dd($user);
        return view('video.edit', compact('video'));
    }

    public function editProcess(Request $request, $id)
    {
        DB::table('video')->where('id', $id)
        ->update([
            'title' => $request->title,
            'desc' => $request->desc,
            'url' => $request->url,
            'category' => $request->category,
            'materi' => $request->materi,
            'name' => $request->name,
            'pelatihan_id' => $request->pelatihan_id,
<<<<<<< HEAD
=======
            'updated_at' => date('Y-m-d H:i:s'),
>>>>>>> a5d4733e5187bef6264635896eb28aedb37b0a8d
        ]);

        return redirect()->route('video.data')->with('status', 'Data berhasil diupdate!');
    }

    public function delete($id)
    {
        DB::table('video')->where('id', $id)->delete();

        return redirect()->route('video.data')->with('status', 'Data berhasil dihapus!');
    }

}
