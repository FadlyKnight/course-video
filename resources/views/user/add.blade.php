@extends('main')

@section('title','Add Data User ')

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
                        <h4>Add Data User</h4>
                    </div>

                    <div class="pull-right">
                        <a href="{{ route('user.data')}}" class="btn btn-icon btn-secondary">
                            <i class="fa fa-undo"></i> Back
                        </a>
                    </div>

                </div>
                
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="{{route('user.addProcess')}}"method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="name" class="form-control" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" id="myInput" class="form-control" autofocus required>
                                    <p><input type="checkbox" onclick="myFunction()"> Show Password</p>
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