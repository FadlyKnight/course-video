@extends('main')

@section('title','Edit Data User ')

@section('main-content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>User</h1>
            </div>

        <div class="section-body">
 
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between">

                    <div class="pull-left">
                        <h4>Edit Data User</h4>
                    </div>

                    <div class="pull-right">
                        <a href="{{ route('user.data') }}" class="btn btn-icon btn-secondary">
                            <i class="fa fa-undo"></i> Back
                        </a>
                    </div>

                </div>
                
                <div class="card-body">
                   
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        <div class="row">
                            <div class="col-md-4 offset-md-4">
                                <form action="{{ route('user.editProcess',$user->id) }}" method="POST">
                                    @method('patch')
                                    @csrf
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" value="{{ $user->email }}" class="form-control" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" id="myInput" value="" name="password" class="form-control">
                                        <p><input type="checkbox" onclick="myFunction()"> Show Password</p>
                                        <small>Kosongkan Jika tidak ingin reset password</small>
                                    </div>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </form>
                            </div>
                        </div>
                 
                </div>
            </div>
        </div>
    </div>

    <script>
        function myFunction() {
          var x = document.getElementById("myInput");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
    </script>
    
@endsection