@extends('admin.layouts.app')
@section('admin_title', '| Admin')
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
                    <div class="card-header">Edit details of {{$admin->name}}</div>

                    <div class="card-body">
                        @include('multiauth::message')
                        <form action="{{route('admin.update',[$admin->id])}}" method="post">
                            @csrf @method('patch')
                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">Name</label>
                                <input type="text" value="{{ $admin->name }}" name="name" class="form-control col-md-6" id="role">
                            </div>

                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">Email</label>
                                <input type="text" value="{{ $admin->email }}" name="email" class="form-control col-md-6" id="role">
                            </div>

                            <div class="form-group row">
                                <label for="role_id" class="col-md-4 col-form-label text-md-right">Assign Role</label>

                                <select name="role_id[]" id="role_id" class="form-control col-md-6 {{ $errors->has('role_id') ? ' is-invalid' : '' }}" multiple>
                                    <option selected disabled>Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                                @if (in_array($role->id,$admin->roles->pluck('id')->toArray()))
                                                selected
                                                @endif >{{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('role_id'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('role_id') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="active" class="col-md-4 col-form-label text-md-right">Active</label>
                                <input type="checkbox" value="1" {{ $admin->active ? 'checked':'' }} name="activation" class="form-control col-md-6" id="active">
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        Change
                                    </button>
                                    <a href="{{ route('admin.show') }}" class="btn btn-danger btn-sm float-right">Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
