<style>
.owl-prev {
    width: 15px;
    height: 100px;
    position: absolute;
    top: 40%;
    margin-left: -20px;
    display: block !important;
    border:0px solid black;
	background-color: transparent !important;
}

.owl-next {
    width: 15px;
    height: 100px;
    position: absolute;
    top: 40%;
    right: 0px;
    display: block !important;
    border:0px solid black;
	background-color: transparent !important;
}
.owl-prev i, .owl-next i {transform : scale(9,6); color: #ccc;}
</style>
<div id="fh5co-course-categories">
	<div class="container">
		<div class="owl-carousel owl-theme owl-loaded owl-pelatihan">
			@foreach ($pelatihan as $item)
				<div class="item">
					<div class="row animate-box">
						<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
							@php
								$slug = $item['pelatihan_data']->slug;
							@endphp
							<h2>Pelatihan {{ $item['pelatihan_data']->title_course }}</h2>
							<p>{{ Str::limit($item['pelatihan_data']->desc_course, 180, '...') }}</p>
						</div> 
					</div>
					<div class="row">
						@forelse ($item['video_data'] as $item)
							@include('landing.includes.video-data')
						@empty
							<h3 class="text-center">Tidak Ada Video</h3>
						@endforelse
					</div>
					<div class="text-center">
						<a href="{{ route('landing.pelatihan', $slug) }}" class="btn btn-primary">Lihat Semua Video Latihan</a>
					</div>
				</div>
			@endforeach
			
		</div>
	</div>

</div>