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
                <div class="card-header bg-info text-white">
                    Roles
                    @permitTo('CreateRole')
                    <span class="float-right">
                        <a href="{{ route('admin.role.create') }}" class="btn btn-sm btn-success">New Role</a>
                    </span>
                    @endpermitTo
                </div>

                <div class="card-body">
                    @include('multiauth::message')
                    <ol class="list-group">
                        @foreach ($roles as $role)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $role->name }}
                            <span class="badge badge-primary badge-pill">{{ $role->admins->count() }} {{
                                ucfirst(config('multiauth.prefix')) }}</span>
                            <span class="badge badge-warning badge-pill">{{ $role->permissions->count() }}
                                Permissions</span>
                            <div class="float-right">
                                @permitTo('DeleteRole,UpdateRole')
                                <a href="" class="btn btn-sm btn-secondary mr-3"
                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">Delete</a>
                                <form id="delete-form-{{ $role->id }}"
                                    action="{{ route('admin.role.delete',$role->id) }}" method="POST"
                                    style="display: none;">
                                    @csrf @method('delete')
                                </form>
                                @endpermitTo

                                @permitTo('UpdateRole')
                                <a href="{{ route('admin.role.edit',$role->id) }}"
                                    class="btn btn-sm btn-primary mr-3">Edit</a>
                                @endpermitTo
                            </div>
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection