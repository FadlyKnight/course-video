@extends('main')

@section('title','Add Data Video ')

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
                        <h4>Add Data User</h4>
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
                                <form action="{{ route('video.addProcess')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" autofocus required>
                                    </div>
                                    @php
                                        $pelatihan =  DB::table('pelatihan')->get();
                                    @endphp
                                    <div class="form-group">
                                        <label>Pelatihan</label>
                                        <select name="pelatihan_id" id="" class="form-control" required>
                                            @foreach ($pelatihan as $item)                                                
                                                <option value="{{ $item->id }}">{{ $item->title_course }}</option>
                                            @endforeach
                                        </select>

                                        {{-- <input type="text" name="pelatihan_id" class="form-control" autofocus required> --}}
                                    </div>
                                    <div class="form-group">
                                        <label>Mentor</label>
                                        <input type="text" name="name" class="form-control" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <input class="form-control" list="category" name="category">
                                            <datalist id="category">
                                                <option value="Kategori 1">
                                                <option value="Kategori 2">
                                                <option value="Kategori 3">
                                                <option value="Kategori 4">
                                            </datalist>
                                        {{-- <input type="text" name="category" class="form-control" autofocus required> --}}
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="desc" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Materi</label>
                                        <input type="text" name="url_materi" class="form-control" autofocus >
                                        <small>masukan url materi</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Url</label>
                                        <input type="text" name="url" class="form-control" autofocus required>
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