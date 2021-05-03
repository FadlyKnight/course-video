@extends('main')

@section('title','Edit Data Course ')

@section('main-content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Course</h1>
            </div>

        <div class="section-body">
 
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between">

                    <div class="pull-left">
                        <h4>Edit Data Course</h4>
                    </div>

                    <div class="pull-right">
                        <a href="{{ route('course.data') }}" class="btn btn-icon btn-secondary">
                            <i class="fa fa-undo"></i> Back
                        </a>
                    </div>

                </div>
                
                <div class="card-body">
                   
                    
                        <div class="row">
                            <div class="col-md-4 offset-md-4">
                                <form action="{{ route('course.editProcess',$course->id) }}" method="POST">
                                    @method('patch')
                                    @csrf
                                    <div class="form-group">
                                        <label>Pelatihan</label>
                                        <input type="text" name="title_course" value="{{ $course->title_course }}" class="form-control" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="desc_course" class="form-control">{{ $course->desc_course }}</textarea>
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