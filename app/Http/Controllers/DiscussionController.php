<?php

namespace App\Http\Controllers;

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
        $video_id = decrypt($video_id);
        $data = DB::table('diskusi')->where('video_id', $video_id)->get();
        // dd($data);
        return response()->json(['status' => true, 'data' => $data, 'msg' => 'List Diskusi']);
    }

    public function store(Request $request, $video_id)
    {
        $video_id = decrypt($video_id);
        $insertData = [];
        $insertData['user_id'] = auth()->user()->id;
        $insertData['video_id'] = $video_id;
        // user_id	video_id	reply_id	komentar	created_at	time


        DB::table('diskusi')->insert($insertData);

        return response()->json(['status' => true, 'msg' => 'Diskusi ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
