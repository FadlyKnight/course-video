<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    public function data()
    {
        $video = DB::table('video')->get();

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
            'category' => $request->category,
            'name' => $request->name,
        ]);

        return redirect('video')->with('status', 'Data berhasil ditambah!');
    }

    public function edit($id)
    {

        $video = DB::table('video')->where('id', $id)->first();
        //dd($user);
        return view ('video.edit', compact('video'));
    }

    public function editProcess(Request $request, $id)
    {
        DB::table('video')->where('id', $id)
        ->update([
            'title' => $request->title,
            'desc' => $request->desc,
            'url' => $request->url,
            'category' => $request->category,
            'name' => $request->name
        ]);

        return redirect('video')->with('status', 'Data berhasil diupdate!');
    }

    public function delete($id)
    {
        DB::table('video')->where('id', $id)->delete();

        return redirect('video')->with('status', 'Data berhasil dihapus!');
    }

}
