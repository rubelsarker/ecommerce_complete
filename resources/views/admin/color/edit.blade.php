@extends('admin.layouts.app')
@section('admin_title', '| Color')
@section('admin_css')
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{url('')}}/public/backend/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
@endsection
@section('admin_content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Starter Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-info ">
                        <div class="card-header">
                            <h3 class="card-title">Update Color</h3>
                            <a href="{{route('admin.color.index')}}" class="btn btn-success btn-flat float-right">All Colors</a>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form role="form" action="{{route('admin.color.update',$row->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input value="{{$row->name}}" name="name" type="text" class="form-control"  placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Color Code</label>
                                            <input autocomplete="off" value="{{$row->code}}" name="code" type="text" class="form-control my-colorpicker1">
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input name="status"  {{$row->status == 1 ? 'checked' : ''}} value="1" type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Status</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info btn-flat float-right">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('admin_script')
    <!-- bootstrap color picker -->
    <script src="{{url('')}}/public/backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script>
        //Colorpicker
        $('.my-colorpicker1').colorpicker();

    </script>
@endsection

