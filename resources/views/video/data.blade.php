@extends('main')

@section('title', 'Data Video ')

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
                        <a href="{{ url('video/add' )}}" class="btn btn-icon btn-success">
                            <i class="fa fa-plus"></i> Add
                        </a>
                    </div>

                </div>
                
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Title</th>
                                <th>Mentor</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Url</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($video as $item)
                                <tr>
                                    <td>{{ $loop ->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->category }}</td>
                                    <td>{{ $item->desc }}</td>
                                    <td>{{ $item->url }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('video/edit/' .$item->id )}}" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                                        <form action="{{ url('video/' .$item->id )}}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
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


                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        <ul class="pagination mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    
@endsection