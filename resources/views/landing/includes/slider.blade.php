@php    
    $sliders = \DB::table('configs_app')->where('meta_key', 'data_sliders')->first()->meta_value;
@endphp
<aside id="fh5co-hero">
    <div class="flexslider">
        <ul class="slides">
            @foreach (json_decode($sliders) as $item)
           <li style="background-image: url('{{$item->slider}}');">
               <div class="overlay-gradient"></div>
               <div class="container">
                   <div class="row">
                       <div class="col-md-8 col-md-offset-2 text-center slider-text">
                           <div class="slider-text-inner">
                               <h1>{{ $item->title }}</h1>
                                <h2>{{ $item->subtitle }}</a></h2>
                           </div>
                       </div>
                   </div>
               </div>
           </li>
           @endforeach	   	

          </ul>
      </div>
</aside>