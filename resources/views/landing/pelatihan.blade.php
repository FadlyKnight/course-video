@extends('landing.layouts.content')

@section('css')
@endsection

@section('content')


<div id="fh5co-course-categories">
	<div class="container">
    <div class="row animate-box">
       
		<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
            <h2>Pelatihan {{ $pelatihan->title_course }}</h2>
            <p>{{ Str::limit($pelatihan->desc_course, 180, '...') }}</p>
		
			
       		 </div> 
    </div>
	
	<div class="row">
		@php
			$cat_video = DB::table('video')->groupBy('category')->select('category');
		@endphp

		<form  class="col-md-offset-9 text-right fh5co-heading" action="{{ route('landing.pelatihan', $pelatihan->slug ) }}" method="get">
			<div class="row">
				<div style="display: flex">
					<select name="category" style="margin-right: 2opx" class="form-control">
						<option value="">Semua</option>
						@foreach ($cat_video->get() as $item)
							<option value="{{$item->category}}" {{ request()->category == $item->category ? 'selected' : '' }} >{{$item->category}}</option>
						@endforeach
					</select>
					<button style="margin-left: 20px;" class="btn btn-icon btn-primary" type="submit"><i class="fa fa-search"></i></button>
				</div>
			</div>
		</form>
	</div>
	
    <div class="row">
        @forelse ($video as $item)
            @include('landing.includes.video-data')
        @empty
            <h3 class="text-center">Tidak Ada Video</h3>
        @endforelse
    </div>
    </div>
</div>

    

  @auth
  
  @else
	<!-- Modal LOGIN-->
	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<form method="POST" action="{{ route('login.post') }}" class="needs-validation" novalidate="">
				<div class="modal-body">
				@csrf
				@if (\Session::has('error'))
					<div class="alert alert-danger">{{ \Session::get('error') }}</div>
				@endif
				<div class="form-group">
				<label for="email">Email</label>
				<input required id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
				<div class="invalid-feedback">
					Please fill in your email
				</div>
				</div>

				<div class="form-group">
				<div class="d-block">
					<label for="password" class="control-label">Password</label>
				</div>
				<input required id="password" type="password" class="form-control" name="password" tabindex="2" required>
				<div class="invalid-feedback">
					please fill in your password
				</div>
				</div>

				<div class="form-group">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
					<label class="custom-control-label" for="remember-me">Remember Me</label>
				</div>
				</div>
						
			</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Login</button>
				</div>
			</form>

		</div>
		</div>
	</div>
	

	@section('js-bot')  
		<script>
			@if (\Session::has('error') && \Session::has('page'))
				$('#registrasiModal').modal('show');
			@endif
			
			@if (\Session::has('error'))
				$('#loginModal').modal('show');
			@endif
			
		</script>
	@endsection
  @endauth

@endsection