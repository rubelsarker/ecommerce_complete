@extends('admin.layouts.app')
@section('admin_title', '| Role')
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
        <div class="card">
            <div class="card-header bg-info text-white">Add New Role</div>

            <div class="card-body">
                @include('multiauth::message')
                <form action="{{ route('admin.role.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="role">Role Name</label>
                        <input type="text" placeholder="Give an awesome name for role" name="name"
                            class="form-control" id="role" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Assign Permissions</label>
                        <div class="container">
                            @foreach($permissions as $key => $value)
                            <label for="role">{{$key}}</label>
                            <div class="d-flex justify-content-between">
                                @foreach($value as $permission)
                                <div class="form-group">
                                    <label for="{{$permission->id}}">{{$permission->name}}</label>
                                    <input type="checkbox" name="permissions[]" class="form-control"
                                        value="{{$permission->id}}" id="{{$permission->id}}">
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Store</button>
                    <a href="{{ route('admin.roles') }}" class="btn btn-sm btn-danger float-right">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection