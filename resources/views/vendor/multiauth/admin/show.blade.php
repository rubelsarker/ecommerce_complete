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
            <div class="card-header">
                {{ ucfirst(config('multiauth.prefix')) }} List
                <span class="float-right">
                    <a href="{{route('admin.register')}}" class="btn btn-sm btn-success">New {{ ucfirst(config('multiauth.prefix')) }}</a>
                </span>
            </div>
            <div class="card-body">
@include('multiauth::message')
                <ul class="list-group">
                    @foreach ($admins as $admin)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $admin->name }}
                        <span class="badge">
                                @foreach ($admin->roles as $role)
                                    <span class="badge-warning badge-pill ml-2">
                                        {{ $role->name }}
                                    </span> @endforeach
                        </span>
                        {{ $admin->active? 'Active' : 'Inactive' }}
                        <div class="float-right">
                            <a href="#" class="btn btn-sm btn-secondary mr-3" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $admin->id }}').submit();">Delete</a>
                            <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.delete',[$admin->id]) }}" method="POST" style="display: none;">
                                @csrf @method('delete')
                            </form>

                            <a href="{{route('admin.edit',[$admin->id])}}" class="btn btn-sm btn-primary mr-3">Edit</a>
                        </div>
                    </li>
                    @endforeach @if($admins->count()==0)
                    <p>No {{ config('multiauth.prefix') }} created Yet, only super {{ config('multiauth.prefix') }} is available.</p>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection