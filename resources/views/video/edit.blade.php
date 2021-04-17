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
                <div class="card-header">

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
                                    <div class="form-group">
                                        <label>Mentor</label>
                                        <input type="text" name="name" value="{{ $video->name }}" class="form-control" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <input class="form-control" list="category" value="{{ $video->category }}" name="category">
                                            <datalist id="category">
                                                <option value="Kategori 1">
                                                <option value="Kategori 2">
                                                <option value="Kategori 3">
                                                <option value="Kategori 4">
                                            </datalist>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="desc" class="form-control">{{ $video->desc }}</textarea>
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