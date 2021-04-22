@extends('main')

@section('title', 'Data User ')


@section('css')
    <link rel="stylesheet" href="{{ asset('style/assets/vendor/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/vendor/datatable/dataTables.bootstrap4.min.css') }}">
@endsection

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

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header justify-content-between">

                    <div class="pull-left">
                        <h4>Data User</h4>
                    </div>

                    <div class="pull-right">
                        <a href="{{ route('user.add' )}}" class="btn btn-icon btn-success">
                            <i class="fa fa-plus"></i> Add
                        </a>
                    </div>


                </div>
                
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md" id="datatable">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Username</th>
                                <th>Email</th>
                                {{-- <th>Password</th> --}}
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $loop ->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    {{-- <td>{{ $item->password }}</td> --}}
                                    <td class="text-center">
                                        <a href="{{ route('user.edit',$item->id) }}" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                                        <form action="{{ route('user.delete',$item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-icon btn-danger"><i class="far fa-trash-alt"></i></button>    
                                        </form>
                                
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>


            </div>
        </div>
    </div>

    
    
@endsection

@section('js-mid')
    <script src="{{ asset('style/assets/vendor/datatable/datatables.min.js') }}"></script>    
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        } );
    </script>

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