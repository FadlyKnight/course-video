<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PelatihanController extends Controller
{
    public function data()
    {
        $pelatihan = DB::table('pelatihan')->get();

        //return $pelatihan;
        return view('course.data', ['pelatihan' => $pelatihan]);
    }

    public function add()
    {
        return view ('course.add');
    }

    public function addProcess(Request $request)
    {
<<<<<<< HEAD
        $new_slug = strtolower(str_replace(" ", "-",$request->title_course));
=======
        $new_slug = Str::slug($request->title_course); //strtolower(str_replace(" ", "-",$request->title_course));
>>>>>>> a5d4733e5187bef6264635896eb28aedb37b0a8d
        DB::table('pelatihan')->insert([
            'title_course' => $request->title_course,
            'slug' => $new_slug,
            'desc_course' => $request->desc_course,
            'created_at' => date('Y-m-d H:i:s'),
            
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
            'slug' => $request->title_course,
            'desc_course' => $request->desc_course,
            'created_at' => date('Y-m-d H:i:s'),
            
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