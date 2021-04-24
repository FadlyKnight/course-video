@extends('main')

@section('title')

@section('css')
  <link rel="stylesheet" href="{{ asset('vendor/summernote/summernote-bs4.min.css') }}">
  <style>
    .hidden{
      display: none;
    }
  </style>
@endsection

@section('main-content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
        <div class="section-body">

    
@endsection

@section('content')
@php
    $sliders = \DB::table('configs_app')->where('meta_key', 'data_sliders')->first()->meta_value;
    $about = \DB::table('configs_app')->where('meta_key', 'text_about')->first()->meta_value;

@endphp


      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Users</h4>
              </div>
              <div class="card-body">
                1,120
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="fas fa-video"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Video</h4>
              </div>
              <div class="card-body">
                1,242
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="far fas fa-comments"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Comment</h4>
              </div>
              <div class="card-body">
                1,201
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-success">
              <i class="fas fa-circle"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Online Users</h4>
              </div>
              <div class="card-body">
                47
              </div>
            </div>
          </div>
        </div>
      </div>

        
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4>Slider </h4>
            </div>
            <form action="{{ route('config.slider') }}" enctype="multipart/form-data" method="POST">
              @csrf
              <div class="card-body">
                  <div class="col-12">
                      <div id="image_preview" class="row">                
                        @foreach (json_decode($sliders) as $item)
                          <img src='{{ $item }}' width='200'><br>
                        @endforeach
                      </div>
                      <a href="javascript:void(0)" id="upload_link">Upload Slider</a>
                      <input type="file" class="hidden" id="upload_file" name="slider[]" onchange="preview_image()" accept="image/*"  multiple>
                  </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Slider</button>
              </div>
            </form>

          </div>
        </div>

        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
          <div class="card">
              <div class="card-header">
                <h4>About Text</h4>
              </div>
              <form action="{{ route('config.about') }}" method="POST">
                @csrf
                <div class="card-body">
                    <textarea name="text_about" id="summernote">
                      {{ $about }}
                    </textarea>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Text</button>
                </div>
              </form>
            </div>
          </div>

@endsection

@section('js-bot')

<script src="{{ asset('vendor/summernote/summernote-bs4.min.js') }}"></script>

<script>
  $(document).ready(function() {
      $('#summernote').summernote({
        dialogsInBody: true,
        minHeight: 150,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['fontname', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
        ]
      });
  });
</script>

        <script>
            
            $("#upload_link").on('click', function(e){
                e.preventDefault();
                $("#upload_file").trigger('click');
            });

            function preview_image() 
            {
              $('#image_preview').html('');
                var total_file=document.getElementById("upload_file").files.length;
                for(var i=0;i<total_file;i++) {
                    $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"' width='200'><br>");
                }
            }

        </script>
@endsection