<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($video_id)
    {    
        try {
            if (request()->expectsJson()) { 
                $video_id = decrypt($video_id);
                $data = DB::table('diskusi')->where('video_id', $video_id)
                        ->join('users','users.id','=','diskusi.user_id')
                        ->select('diskusi.*', 'users.name')
                        ->orderBy('created_at','desc')
                        ->get();
                $data->map(function($data){
                    $data->date_human = \Carbon\Carbon::parse($data->created_at)->diffForHumans();
                    $data->canDelete = ( $data->user_id == auth()->user()->id || auth()->user()->role == 'admin' ) ? true : false;
                    $data->user_id = '-';
                    return $data;
                });
                return response()->json(['status' => true, 'data' => $data, 'msg' => 'List Diskusi']);
            } else {
                return response()->json(['status' => false, 'msg' => 'Something Wrong ::xpct_jsn::']);
            }
        } catch (DecryptException $e) {
            return response()->json(['status' => false, 'msg' => 'Something Wrong ::dcrypt_v_id::']);
        }
    }

    public function store(Request $request, $video_id)
    {
        try {
            $video_id = decrypt($video_id);
            $insertData = [];
            $insertData['user_id'] = auth()->user()->id;
            $insertData['reply_id'] = $request->reply_id ?? 0;
            $insertData['video_id'] = $video_id;
            $insertData['komentar'] = preg_replace("/[^A-Za-z0-9?!.,-_ ]/", '', $request->komentar);
            $insertData['created_at'] = date('Y-m-d H:i:s');
            $insertData['updated_at'] = date('Y-m-d H:i:s');
            $insertData['time'] = time();
            
            $id = DB::table('diskusi')->insertGetId($insertData);
            $data = DB::table('diskusi')->where('id', $id)->first();
            $data->date_human = \Carbon\Carbon::parse($data->created_at)->diffForHumans();
            $data->canDelete = ( $data->user_id == auth()->user()->id || auth()->user()->role == 'admin' ) ? true : false;
            $data->user_id = '-';
            $data->name = auth()->user()->name;

            return response()->json(['status' => true, 'data' => $data, 'msg' => 'Diskusi ditambah']);
        } catch (DecryptException $e) {
            return response()->json(['status' => false, 'msg' => 'Something Wrong ::dcrypt_v_id::']);
        }
        
    }

    public function update(Request $request, $id)
    {   
        $insertData['komentar'] = preg_replace("/[^A-Za-z0-9?!.,-_ ]/", '', $request->komentar);
        $insertData['updated_at'] = date('Y-m-d H:i:s');
        DB::table('diskusi')->where('id',$id)
                    ->where('user_id', auth()->user()->id )
                    ->update($insertData);
        return response()->json(['status' => true, 'msg' => 'Diskusi diupdate']);
    }

    public function destroy()
    {
        try {   
            $id = request()->id;
            DB::table('diskusi')->where('id',$id)
                ->where('user_id', auth()->user()->id )
                ->delete();
            return response()->json(['status' => true, 'msg' => 'Diskusi dihapus']);
        } catch (ModelNotFoundException $th) {
            return response()->json(['status' => false, 'msg' => 'Something Wrong ::mdl_xcptn::']);
        }
    }
}
