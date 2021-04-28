<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthCustomController extends Controller
{
    public function login()
    {
        $email = request()->email;
        $pass = request()->password;
        $user = User::where('name', $email)->first();
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $email)->first();
        }
        
        // dd($user);
        if ($user != NULL) {
            $check = Hash::check($pass, $user->password);
            if ($check) {
                Auth::loginUsingId($user->id, true);
                if (auth()->user()->role == 'peserta') {
                    // return 'peserta';      
                    return redirect()->route('landing.index');   
                } else {       
                    // return 'admin';             
                    return redirect()->route('video.data');
                }
            } else {
                return redirect()->back()->with('error', 'Email dan Password Tidak Cocok')->withInput();
            }
        } else {
            return redirect()->back()->with('error', 'Email Tidak Ditemukan Silahkan Daftar')->withInput();
        }

    }
    
        
    public function register(Request $request)
    {
        // $request->user
        
        try {        
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'min:8|required|confirmed',
            ]);
            if($validator->fails()){
                // return redirect()->back()->with('error', $validator->getMessageBag()->first())->withInput(); 
                return redirect()->back()->withErrors($validator)->with([
                    'error' => 'Periksa lagi inputan anda',
                    'page' => 'register'
                ])->withInput();
            }

            $data = $request->except(['_token','password_confirmation']);
            $data['password'] = Hash::make($request->password);
            // dd($data);
            User::create($data);
            $user = User::latest()->first();
            Auth::loginUsingId($user->id, true);
            if(Auth::check()){
                return redirect()->route('landing.index');   
            }
            return redirect()->back()->with('error', 'Periksa lagi inputan anda')->withInput();        
        } catch (ModelNotFoundException $th) {
            return redirect()->back()->with('error', 'Periksa lagi Data Yang Anda Masukkan')->withInput();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('landing.index');
    }

}
