@extends('main')

@section('title')

@section('css')
  <link rel="stylesheet" href="{{ asset('vendor/summernote/summernote-bs4.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" />

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
    $user = \DB::table('users')->count();
    $video = \DB::table('video')->count();
    $diskusi = \DB::table('diskusi')->count();
    $pelatihan = \DB::table('pelatihan')->count();


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
                {{$user}}
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
                {{ $video }}
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
                {{ $diskusi }}
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
                <h4>Total Pelatihan</h4>
              </div>
              <div class="card-body">
                {{ $pelatihan }}
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
              <div class="card-body" id="slider-data">
                {{-- {{ dd(session()->all()) }} --}}
                @if (session()->has('slider'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                {{-- @foreach (json_decode($sliders) as $item) --}}
                    
                <div class="row slider-content">
                  <div class="col-6">
                    <input type="file" name="slider[]" class="dropify" data-default-file="" />
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <input type="text" class="form-control" name="title[]" value="" placeholder="Judul" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <textarea name="subtitle[]" class="form-control" style="height: 100px" placeholder="Sub Judul"></textarea>
                    </div>
                    <div class="d-flex justify-content-between">          
                      {{-- <a href="javascript:void(0)" onclick="hapusSlider(this)">+ Hapus Slider</a>           --}}
                      <a href="javascript:void(0)" onclick="tambahSlider()">+ Tambah Slider</a>
                    </div>
                  </div>
                </div>
                
                {{-- @endforeach --}}


                {{-- <input type="text" class="form-control" name="subtitle"> --}}
                {{--
                  <div class="col-12">
                      <div id="image_preview" class="row">                
                        @foreach (json_decode($sliders) as $item)
                          <img src='{{ $item }}' width='200'><br>
                        @endforeach
                      </div>
                      <a href="javascript:void(0)" id="upload_link">Upload Slider</a>
                      <input type="file" class="hidden" id="upload_file" name="slider[]" onchange="preview_image()" accept="image/*"  multiple>
                  </div>
                --}}
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous"></script>
<script src="{{ asset('vendor/summernote/summernote-bs4.min.js') }}"></script>
<script>

</script>

<script>
  // let tambahSlider ;
  
  function tambahSlider(){
    let html = `
      <div class="row slider-content">
        <div class="col-6">
          <input type="file" class="dropify" name="slider[]" data-default-file="" />
        </div>
        <div class="col-6">
          <div class="form-group">
            <input type="text" class="form-control" name="title[]" placeholder="Judul" aria-describedby="helpId">
          </div>
          <div class="form-group">
            <textarea name="subtitle[]" class="form-control" style="height: 100px" placeholder="Sub Judul"></textarea>
          </div>
          <div class="d-flex justify-content-between">          
            <a href="javascript:void(0)" onclick="hapusSlider(this)">+ Hapus Slider</a>          
            <a href="javascript:void(0)" onclick="tambahSlider()">+ Tambah Slider</a>
          </div>
        </div>
      </div>
      `; 

    $('#slider-data').append(html);
    $('.dropify').dropify();
  }

  function hapusSlider(el){
    $(el).closest( ".slider-content" ).remove();
  }
  

  $(document).ready(function() {

      $('.dropify').dropify();
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