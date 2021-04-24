@php    
    $sliders = \DB::table('configs_app')->where('meta_key', 'data_sliders')->first()->meta_value;
@endphp
<aside id="fh5co-hero">
    <div class="flexslider">
        <ul class="slides">
            @foreach (json_decode($sliders) as $item)
                
           <li style="background-image: url({{$item}});">
               <div class="overlay-gradient"></div>
               {{-- <div class="container">
                   <div class="row">
                       <div class="col-md-8 col-md-offset-2 text-center slider-text">
                           <div class="slider-text-inner">
                               <h1>The Roots of Education are Bitter, But the Fruit is Sweet</h1>
                                <h2>Brought to you by <a href="http://freehtml5.co/" target="_blank">freehtml5.co</a></h2>
                                <p><a class="btn btn-primary btn-lg" href="#">Start Learning Now!</a></p>
                           </div>
                       </div>
                   </div>
               </div> --}}
           </li>
           @endforeach	   	

          </ul>
      </div>
</aside>