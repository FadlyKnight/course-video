@extends('main')

@section('title','Edit Data Video ')

@section('main-content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Video</h1>
            </div>

        <div class="section-body">
 
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between">

                    <div class="pull-left">
                        <h4>Edit Data Video</h4>
                    </div>

                    <div class="pull-right">
                        <a href="{{ route('video.data') }}" class="btn btn-icon btn-secondary">
                            <i class="fa fa-undo"></i> Back
                        </a>
                    </div>

                </div>
                
                <div class="card-body">
                   
                    
                        <div class="row">
                            <div class="col-md-4 offset-md-4">
                                <form action="{{ route('video.editProcess',$video->id) }}" method="POST">
                                    @method('patch')
                                    @csrf
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" value="{{ $video->title }}" class="form-control" autofocus required>
                                    </div>
                                    @php
                                    $pelatihan =  DB::table('pelatihan')->get();
                                    @endphp
                                    <div class="form-group">
                                        <label>Pelatihan</label>
<<<<<<< HEAD
                                        <select name="pelatihan_id" value="{{ $video->pelatihan_id }}" id="" class="form-control" required>
                                            @foreach ($pelatihan as $item)                                                
                                                <option value="{{ $item->id }}">{{ $item->title_course }}</option>
=======
                                        <select name="pelatihan_id" id="" class="form-control" required>
                                            @foreach ($pelatihan as $item)                                                
                                                <option value="{{ $item->id }}" @if($video->pelatihan_id == $item->id ) selected @endif >{{ $item->title_course }}</option>
>>>>>>> a5d4733e5187bef6264635896eb28aedb37b0a8d
                                            @endforeach
                                        </select>

                                        {{-- <input type="text" name="pelatihan_id" class="form-control" autofocus required> --}}
                                    </div>
                                    <div class="form-group">
                                        <label>Mentor</label>
                                        <input type="text" name="name" value="{{ $video->name }}" class="form-control" autofocus required>
                                    </div>
                                    
                                    @php
                                        $cat_video = DB::table('video')->groupBy('category')->select('category');
                                    @endphp
                                    <div class="form-group">
                                        <label>Category</label>
                                        <input class="form-control" list="category" value="{{ $video->category }}" name="category">
                                            <datalist id="category">
                                                @foreach ($cat_video->get() as $item)
                                                    <option value="{{$item->category}}">
                                                @endforeach
                                            </datalist>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="desc" class="form-control">{{ $video->desc }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Materi</label>
                                        <input type="text" name="materi" value="{{ $video->materi }}"  class="form-control" autofocus>
                                        <small>masukan url materi</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Url</label>
                                        <input type="text" name="url"  value="{{ $video->url }}" class="form-control" autofocus required>
                                        <small>contoh url : <strong>https://youtu.be/</strong>xxxxxxxxxxx</small>
                                    </div>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </form>
                            </div>
                        </div>
                 
                </div>
            </div>
        </div>
    </div>
    
@endsection