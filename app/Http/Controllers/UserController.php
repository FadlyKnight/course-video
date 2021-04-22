<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function data()
    {
        $users = DB::table('users')->where('role','!=','admin')->get();

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
            'email' => $request->email,
            'password' => Hash::make($request->password)
           // $new_pass = \Hash::make($request->password);
        ]);

        return redirect()->route('user.data')->with('status', 'Data berhasil ditambah!');
    }

    public function edit($id)
    {

        $user = DB::table('users')->where('id', $id)->first();
        //dd($user);
        return view ('user.edit', compact('user'));
    }

    public function editProcess(Request $request, $id)
    {
        $updated = [
            'name' => $request->name,
            'email' => $request->email,
            
        ];
        
        if($request->password != NULL || $request->password != ""){
           $new_pass = Hash::make($request->password);
           $updated['password'] = $new_pass;
        }
        // dd($updated);

        DB::table('users')->where('id', $id)
        ->update($updated);

        return redirect()->route('user.data')->with('status', 'Data berhasil diupdate!');
    }

    public function delete($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect()->route('user.data')->with('status', 'Data berhasil dihapus!');
    }

}
