<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function data()
    {
        $users = DB::table('users')->get();

        //return $users;
        return view('user.data', ['users' => $users]);
    }

    public function add()
    {
        return view ('user.add');
    }

    public function addProcess(Request $request)
    {
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect('user')->with('status', 'Data berhasil ditambah!');
    }

    public function edit($id)
    {

        $user = DB::table('users')->where('id', $id)->first();
        //dd($user);
        return view ('user.edit', compact('user'));
    }

    public function editProcess(Request $request, $id)
    {
        DB::table('users')->where('id', $id)
        ->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect('user')->with('status', 'Data berhasil diupdate!');
    }

    public function delete($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect('user')->with('status', 'Data berhasil dihapus!');
    }

}
