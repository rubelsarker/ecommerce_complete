@extends('admin.layouts.app')
@section('admin_title', '| Size')
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
                    <h3 class="card-title">All Sizes</h3>
                    <a href="{{route('admin.size.create')}}" class="btn btn-success float-right btn-flat">Add New Size</a>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Short Name</th>
                            <th>Full Name</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rows as $key => $row)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$row->short_name}}</td>
                            <td>{{$row->full_name}}</td>
                            @if($row->status == 1)
                            <td><span class="badge badge-success">Active</span></td>
                            @else
                                <td><span class="badge badge-danger">Inactive</span></td>
                            @endif
                            <td class="text-center">
                                @if($row->status == 1)
                                    <a href="{{route('admin.size.inactive',$row->id)}}" class="btn btn-sm btn-danger"><i class="fas fa-thumbs-down"></i></a>
                                @else
                                    <a href="{{route('admin.size.active',$row->id)}}" class="btn btn-sm btn-success"><i class="fas fa-thumbs-up"></i></a>
                                @endif
                                <a  href="{{route('admin.size.show',$row->id)}}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                <a  href="{{route('admin.size.edit',$row->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                <a id="delete" href="{{route('admin.size.destroy',$row->id)}}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
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