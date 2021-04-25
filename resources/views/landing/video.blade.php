@extends('landing.layouts.content')

@section('content')
		@php
			$url = $video->url;
			$id_youtube = str_replace("https://youtu.be/", "", $url );
		@endphp
		
		<div class="container" style="text-align: -webkit-center;">
			{{-- nama pelatihan --}}
			<h3 class="text-left">{{ $video->title }}</h3> 
			<div class="row animate-box" style="max-width: 900px">
				<div class="embed-responsive embed-responsive-16by9">
					<div class="plyr__video-embed" id="player">
						{{-- src="https://www.youtube.com/embed/nc5Lj90BzSQ?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1&autoplay=1" --}}
					<iframe data-autoplay="false" src="https://www.youtube.com/embed/{{$id_youtube}}" allowfullscreen allowtransparency allow="autoplay"></iframe>
					</div>
				</div>
			</div>
	  	</div>
	

	<div id="" style="padding: 2em 0;">

		<div class="container">
			
			<div class="row animate-box">
				<div class="col-md-12  fh5co-heading">
					<h2>{{ $video->title }}</h2>
					<p class="text-justify">{{ $video->desc }}</p>  
					<p class="text-justify">Kateogri video {{ $video->category }}</p>    
					<p class="text-justify">Narasumber {{ $video->name }}</p>                
					<a href="{{ $video->url }}" class="nav-link"><span>Download Materi</span></a>
				</div> 			
				
			</div>			
			@include('landing.comment')
		</div>
	</div>


@endsection
