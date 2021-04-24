<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PelatihanController extends Controller
{
    public function data()
    {
        $pelatihan = DB::table('pelatihan')->where('role','!=','admin')->get();

        //return $pelatihan;
        return view('course.data', ['pelatihan' => $pelatihan]);
    }

    public function add()
    {
        return view ('course.add');
    }

    public function addProcess(Request $request)
    {
        DB::table('pelatihan')->insert([
            'title_course' => $request->title_course,
            'slug' => $request->slug,
            'desc_course' => $request->desc_course,
            'create_at' => date('Y-m-d H:i:s'),
            
        ]);

        return redirect()->route('course.data')->with('status', 'Data berhasil ditambah!');
    }

    public function edit($id)
    {

        $course = DB::table('pelatihan')->where('id', $id)->first();
        //dd($course);
        return view ('course.edit', compact('course'));
    }

    public function editProcess(Request $request, $id)
    {
        $updated = [
            'title_course' => $request->title_course,
            'slug' => $request->slug,
            'desc_course' => $request->desc_course,
            'create_at' => date('Y-m-d H:i:s'),
            
        ];
    
        // dd($updated);

        DB::table('pelatihan')->where('id', $id)
        ->update($updated);

        return redirect()->route('course.data')->with('status', 'Data berhasil diupdate!');
    }

    public function delete($id)
    {
        DB::table('pelatihan')->where('id', $id)->delete();

        return redirect()->route('course.data')->with('status', 'Data berhasil dihapus!');
    }

}