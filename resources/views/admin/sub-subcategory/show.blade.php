@extends('admin.layouts.app')
@section('admin_title', '|Sub Subcategory')
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
                            <h3 class="card-title">Sub Subcategory {{$row->name}}</h3>
                            <a href="{{route('admin.sub-subcategory.index')}}" class="btn btn-success btn-flat float-right">Back</a>
                            <a  href="{{route('admin.sub-subcategory.edit',$row->id)}}" class="btn  float-right btn-flat btn-primary">Edit</a>
                            <a id="delete" href="{{route('admin.sub-subcategory.destroy',$row->id)}}" class="btn btn-danger btn-flat float-right">Delete</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Name : {{$row->name}}</strong><br>
                                    <p class="mb-0">Slug : {{$row->slug}}</p>
                                    <p class="mb-0">Created : {{date('d-M-Y',strtotime($row->created_at))}}</p>
                                    <p class="mb-0">Updated : {{date('d-M-Y',strtotime($row->updated_at))}}</p>
                                </div>
                                <div class="col-md-6 text-right">
                                    <p class="mb-0">Category : {{$row->category->name}}</p>
                                    <p class="mb-0">Subcategory : {{$row->subcategory->name}}</p>
                                    @if($row->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection