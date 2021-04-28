<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class ConfigAppController extends Controller
{
    public function dashboard(){
        return view('config.dashboard');
    }
    public function configSlider()
    {
        $slider = request()->slider;
        // dd($slider, request()->all());
        // dd($slider);
        if ($slider == NULL) {
            session()->flash('slider','-');
            return redirect()->back()->with('error','Minimal 1 Gambar Slider');
        }
        $data_slider = [];
        foreach ($slider as $key => $value) {
            $set_data = [];
            $dir = 'slider/' . date('Y') . '/' . date('m');
            $file = $slider_file = $value;
            $ext = $slider_file->getClientOriginalExtension();

            $validator = Validator::make(
                ['slider' => $value], 
                ['slider' => 'mimes:jpeg,jpg,png,gif|required|max:10000'],
            );

            if($validator->fails()){
                session()->flash('slider','-');
                // session()->flash('slider','-');
                return redirect()->back()->with('error', $validator->getMessageBag()->first());
            }
            $tipe_file = 'slider';
            $filename_slider            = $dir . '/' . Str::random(20) . '_' . date('d') . '_' . md5(time()) . $tipe_file.'.' . $ext;
            $set_data['slider'] = $filename_slider;   
            $set_data['title'] = request()->title[$key];
            $set_data['subtitle'] = request()->subtitle[$key]; 
            $data_slider[] = $set_data;         
            $file->move(public_path($dir), $filename_slider);
        }
        // dd($data_slider);

        $data_slider = json_encode($data_slider);
        DB::table('configs_app')
                ->where('meta_key', 'data_sliders')
                ->update(['meta_value' => $data_slider]);
        
        // session('slider','-');
        session()->flash('slider','-');
        return redirect()->back()->with('success', 'Slider Berhasil Diupdate');
        
    }

    public function configAbout()
    {
        $text_about = request()->text_about;
        $text_about = str_replace('<script>','',$text_about);
        $text_about = str_replace('</script>','',$text_about);
        DB::table('configs_app')->where('meta_key', 'text_about')
        ->update(['meta_value' => $text_about]);

        return redirect()->back()->with('success', 'Teks About Berhasil diupdate');
    }

    public function configImageAbout()
    {
        $filename_image = DB::table('configs_app')->where('meta_key', 'img_about')->first()->meta_value;

        if (request()->hasFile('image_about') != NULL) {
            
            $dir = 'about/' . date('Y') . '/' . date('m');
            $file = $img_file = request()->image_about;
            $ext = $img_file->getClientOriginalExtension();

            $validator = Validator::make(request()->all(),
                ['image_about' => 'mimes:jpeg,jpg,png,gif|required|max:2000'],
            );

            if($validator->fails()){
                return redirect()->back()->with('error', $validator->getMessageBag()->first());
            }
            $tipe_file = 'slider';
            $filename_image            = $dir . '/' . Str::random(20) . '_' . date('d') . '_' . md5(time()) . $tipe_file.'.' . $ext;
            
            $file->move(public_path($dir), $filename_image);
            
        }        

        DB::table('configs_app')->where('meta_key', 'img_about')
        ->update(['meta_value' => $filename_image]);

        return redirect()->back()->with('success', 'Teks About Berhasil diupdate');
    }
    
    // public function 
}
