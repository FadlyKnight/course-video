@extends('main')

@section('title', 'Data Video ')

@section('css')
    <link rel="stylesheet" href="{{ asset('style/assets/vendor/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/vendor/datatable/dataTables.bootstrap4.min.css') }}">
@endsection

@section('main-content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Video</h1>
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
                        <h4>Data Video</h4>
                    </div>

                    <div class="pull-right">
                        <a href="{{ route('video.add' )}}" class="btn btn-icon btn-success">
                            <i class="fa fa-plus"></i> Add
                        </a>
                    </div>

                </div>
                
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md" id="datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Pelatihan</th>
                                <th>Mentor</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Materi</th>
                                <th>Url</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($video as $item)
                                <tr>
                                    <td>{{ $loop ->iteration }}</td>
                                    <td>{{ $item->title }}</td>
<<<<<<< HEAD
                                    <td>{{ $item->pelatihan_id }}</td>
=======
                                    <td>{{ $item->title_course }}</td>
>>>>>>> a5d4733e5187bef6264635896eb28aedb37b0a8d
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->category }}</td>
                                    <td>{{ Str::limit($item->desc, 40, ' (...)') }}</td>
                                    <td><a href="{{ $item->materi }}" target="_blank">{{ $item->materi }}</a></td>
                                    <td><a href="{{ $item->url }}" target="_blank">{{ $item->url }}</a></td>
                                    <td class="text-center">
                                        <a href="{{ route('video.edit',$item->id )}}" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                                        <form action="{{ route('video.delete',$item->id )}}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
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
@endsection