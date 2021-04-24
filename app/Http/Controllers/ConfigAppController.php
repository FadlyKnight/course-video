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
        // dd(request()->all());
        $slider = request()->slider;
        $data_slider = [];
        foreach ($slider as $key => $value) {
            $dir = 'slider/' . date('Y') . '/' . date('m');
            $file = $slider_file = $value;
            $ext = $slider_file->getClientOriginalExtension();

            $validator = Validator::make(
                ['slider' => $value], 
                ['slider' => 'mimes:jpeg,jpg,png,gif|required|max:10000'],
            );

            if($validator->fails()){
                return redirect()->back()->with('error', $validator->getMessageBag()->first());
            }
            $tipe_file = 'slider';
            $filename_slider            = $dir . '/' . Str::random(20) . '_' . date('d') . '_' . md5(time()) . $tipe_file.'.' . $ext;
            $data_slider[] = $filename_slider;             
            $file->move(public_path($dir), $filename_slider);
        }

        $data_slider = json_encode($data_slider);
        DB::table('configs_app')
                ->where('meta_key', 'data_sliders')
                ->update(['meta_value' => $data_slider]);

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
    
    // public function 
}
