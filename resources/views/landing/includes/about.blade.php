@php    
    $about = \DB::table('configs_app')->where('meta_key', 'text_about')->first()->meta_value;
@endphp
<div id="fh5co-about">
    <div class="container">
        <div class="col-md-6 animate-box fadeInUp animated-fast">
            {!! $about !!}
        </div>
        <div class="col-md-6">
            <img class="img-responsive" src="{{ asset('landing/images/img_bg_2.jpg') }}" alt="Free HTML5 Bootstrap Template">
        </div>
    </div>
</div>