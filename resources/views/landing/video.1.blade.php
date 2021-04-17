@extends('landing.layouts.content')

@section('content')
	<div id="fh5co-course" style="padding: 0;">
		<div class="container" style="text-align: -webkit-center;">
			<div class="row animate-box" style="max-width: 900px">
				<div class="row">
					<div class="col-md-12" id="player">
						@php
							$url = $video->url;
							$id_youtube = str_replace("https://youtu.be/", "", $url );
						@endphp
						<iframe style="width: 100%; height: 100vh;" src="https://www.youtube.com/embed/{{$id_youtube}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row animate-box" style="padding-top: 20px">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>{{ $video->title }}</h2>
					<p>{{ $video->desc }}</p>
				</div> 
			</div>
				

			<div class="row animate-box">
					<h2>Diskusi</h2>
				
			</div>
		</div>
	</div>


@endsection
