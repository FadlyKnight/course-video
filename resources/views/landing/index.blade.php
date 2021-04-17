@extends('landing.layouts.content')

@section('css')
			{{-- 		
		<style>
			.col{
				flex-basis: 50%;
				min-width: 250px;
			}
			.small-img-row{
				display: flex;
				background: #efefee;
				margin: 20px 0;
				align-items: center;
				border-radius: 6px;
				overflow: hidden;
				width: 250px;
			}
			.small-img{
				position: relative;
			}
			.small-img img{
				height: 150px;
			}
			.play-btn{
				width: 65px;
				position: absolute;
				left: 50%;
				top: 50%;
				transform: translate(-50%, -50%);
				cursor: pointer;
			}

			.icon-play4{
				width: 65px;
				position: absolute;
				left: 50%;
				top: 50%;
				transform: translate(-50%, -50%);
				cursor: pointer;
			}

			.play {
				width: 90px;
				height: 90px;
				background: rgba(0, 0, 0, 0.04);
				display: table;
				text-align: center;
				margin: 0 auto;
				margin-bottom: 30px;
				-webkit-border-radius: 50%;
				-moz-border-radius: 50%;
				-ms-border-radius: 50%;
				border-radius: 50%;
				-webkit-transition: 0.3s;
				-o-transition: 0.3s;
				transition: 0.3s;
			}

			.video-player{
				width: 80%;
				position: absolute;
				left: 50%;
				top: 35%;
				transform: translate(-50%, -50%);
				cursor: pointer;
				display: none;
			}

			video:focus{
				outline: none;
			}

			.close-btn{
				position: absolute;
				right: 10px;
				top: 10px;
				width: 30px;
				cursor: pointer;
			}

		
		
		</style>
		--}}
@endsection

@section('content')

<div id="fh5co-course-categories">
	<div class="container">

		<div class="row animate-box">
			 <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
				<h2>Pelatihan Bioetika</h2>
			</div> 
		</div>
			@foreach ($video as $item)

				@php
					$thumbnail = $item->url;
					$thumbnail_fix = str_replace("https://youtu.be/", "https://img.youtube.com/vi/", $thumbnail );
				@endphp

				<div class="col-md-3 col-sm-6 col-xs-6 animate-box">
					<div class="services">
						<div class="col">
							<div  class="text-center small-img-row">
								<div class="small-img" style="background-image: url({{$thumbnail_fix}}/0.jpg);
																background-position: center;
																background-size: contain;
																background-repeat: no-repeat;">
									<div style="padding: 2em">
										<a href="{{ route('landing.video', encrypt($item->id)) }}" style="">
										<div class="icon play-btn">
											<i class="icon-play4"></i>
										</div>
										</a>
									</div>
									{{-- <img width="100%" src=""> --}}
									{{-- <div style="height: 100vh"></div> --}}
								</div>
							</div>
						</div>	
						<div class="desc">
							<h3 class="text-center"><a href="{{ route('landing.video', encrypt($item->id)) }}">{{ $item->title }}</a></h3>
							<p>Narasumber : {{ $item->name }} <br/> Kategori : {{ $item->category }}<br/>5 comments <i class="icon-messages"> </i></p>
						</div>
					</div>
				</div>	
				
			@endforeach
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
  
  <!-- Modal REGISTER -->
  <div class="modal fade" id="registrasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		
		<form method="POST" action="{{ route('register.post') }}">
			
		<div class="modal-body">
			@csrf
			@if (\Session::has('error'))
				<div class="alert alert-danger">{{ \Session::get('error') }}</div>
			@endif
			<div class="form-group">
			  <label for="name">Username</label>
			  <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>
			  @error('name')
				  <div class="invalid-feedback text-danger d-block">{{ $message }}</div>
			  @enderror
			</div>

			<div class="form-group">
			  <label for="email">Email</label>
			  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
			  @error('email')
				  <div class="invalid-feedback text-danger d-block">{{ $message }}</div>
			  @enderror
			</div>

			  <div class="form-group col-6">
				<label for="password" class="d-block">Password</label>
				<input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
				@error('password')
					<div class="invalid-feedback text-danger d-block">{{ $message }}</div>
				@enderror
			  </div>
			  <div class="form-group col-6">
				<label for="password_confirmation" class="d-block">Password Confirmation</label>
				<input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
				@error('password_confirmation')
					<div class="invalid-feedback text-danger d-block">{{ $message }}</div>
				@enderror
			  </div>
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Submit</button>
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