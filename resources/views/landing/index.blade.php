@extends('landing.layouts.content')

@section('css')
@endsection

@section('content')

@include('landing.includes.slider')

@include('landing.includes.about')

@include('landing.includes.list-video')

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
	{{-- <div class="modal fade" id="registrasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
	</div> --}}

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