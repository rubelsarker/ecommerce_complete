@extends('admin.layouts.app')
@section('admin_title', '| Product')
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
                    <h3 class="card-title">All Products</h3>
                    <a href="{{route('admin.product.create')}}" class="btn btn-success float-right btn-flat">Add New Product</a>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Product Code</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rows as $key => $row)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->p_code}}</td>
                            <td>{{$row->category ? $row->category->name : ''}}</td>
                            <td>{{$row->brand ? $row->brand->name : ''}}</td>
                            <td>{{$row->quantity}}</td>
                            <td>{{$row->price}}</td>
                            @if($row->discount == 1)
                                <td><i class="fas fa-check text-success text-center"></i></td>
                            @else
                                <td>Unavailable</td>
                            @endif

                            <td>
                                @if( count($row->images) > 0 )
                                <img src="{{URL::to($row->images[0]->image)}}" class="img-thumbnail" alt="logo-image" width="100" height="50">
                                @endif
                            </td>
                            @if($row->status == 1)
                            <td><span class="badge badge-success">Active</span></td>
                            @else
                                <td><span class="badge badge-danger">Inactive</span></td>
                            @endif
                            <td class="text-center">
                                @if($row->status == 1)
                                    <a href="{{route('admin.product.inactive',$row->id)}}" class="btn btn-sm btn-danger"><i class="fas fa-thumbs-down"></i></a>
                                @else
                                    <a href="{{route('admin.product.active',$row->id)}}" class="btn btn-sm btn-success"><i class="fas fa-thumbs-up"></i></a>
                                @endif
                                <a  href="{{route('admin.product.show',$row->id)}}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                <a  href="{{route('admin.product.edit',$row->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                <a id="delete" href="{{route('admin.product.destroy',$row->id)}}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
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