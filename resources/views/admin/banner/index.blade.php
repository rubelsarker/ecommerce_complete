@extends('admin.layouts.app')
@section('admin_title', '| Banner')
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
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Banners</h3>
                    <a href="{{route('admin.banner.create')}}" class="btn btn-success float-right btn-flat">Add New Banner</a>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Banner</th>
                            <th>Banner Product</th>
                            <th>Banner Text</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rows as $key => $row)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td><img src="{{URL::to($row->banner)}}" class="img-thumbnail" alt="logo-image" width="100" height="50"></td>
                            <td><img src="{{URL::to($row->banner_product)}}" class="img-thumbnail"
                                     alt="logo-image" width="50" height="50"></td>
                            <td>{{$row->banner_text}}</td>
                            @if($row->status == 1)
                            <td><span class="badge badge-success">Active</span></td>
                            @else
                                <td><span class="badge badge-danger">Inactive</span></td>
                            @endif
                            <td class="text-center">
                                @if($row->status == 1)
                                    <a href="{{route('admin.banner.inactive',$row->id)}}" class="btn btn-sm btn-danger"><i class="fas fa-thumbs-down"></i></a>
                                @else
                                    <a href="{{route('admin.banner.active',$row->id)}}" class="btn btn-sm btn-success"><i class="fas fa-thumbs-up"></i></a>
                                @endif
                                <a  href="{{route('admin.banner.show',$row->id)}}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                <a  href="{{route('admin.banner.edit',$row->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                <a id="delete" href="{{route('admin.banner.destroy',$row->id)}}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection