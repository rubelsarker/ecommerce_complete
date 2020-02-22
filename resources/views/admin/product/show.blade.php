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
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-header">
                <h3 class="card-title">{{$row->name}} Details</h3>
                <a href="{{route('admin.product.index')}}" class="btn btn-success btn-flat float-right">Back</a>
                <a  href="{{route('admin.product.edit',$row->id)}}" class="btn btn-flat float-right btn-primary">Edit</a>
                <a id="delete" href="{{route('admin.product.destroy',$row->id)}}" class="btn btn-danger btn-flat float-right">Delete</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-4">
                        <h3 class="my-3"><strong>Product Name : </strong> {{$row->name}}</h3>
                        <p><strong>Product code : </strong> {{$row->p_code}}</p>
                        <p><strong>Category : </strong> {{$row->category ? $row->category->name : ''}}</p>
                        <p><strong>Subcategory : </strong> {{$row->subcategory ? $row->subcategory->name : ''}}</p>
                        <p><strong>Sub Subcategory : </strong> {{$row->subsubcategory ? $row->subsubcategory->name : ''}}</p>
                        <p><strong>Brand : </strong> {{$row->brand ? $row->brand->name : ''}}</p>
                        <p><strong>Unit : </strong> {{$row->unit}}</p>
                        <p><strong>Slug : </strong> {{$row->slug}}</p>
                        <p><strong>Size : </strong> {{$row->size}}</p>
                        <p><strong>Color : </strong> {{$row->color}} </p>

                        @if($row->discount == 1)
                        <p>
                            <strong>Discount : </strong>
                           {{$row->discount_percent}}%
                        <p>
                        @endif

                        <p>
                            <strong> Status :  </strong>
                            @if($row->status == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </p>

                        @if($row->variant == 1)
                            <p>
                                <strong>Variant : </strong>
                                 Available
                            <p>
                        @endif
                        <p class="text-muted text-justify"><strong>Product Description : </strong> {{$row->description}}</p>
                        <p><strong>Created :</strong> {{date('d-M-Y',strtotime($row->created_at))}}</p>
                        <p><strong>Updated :</strong> {{date('d-M-Y',strtotime($row->updated_at))}}</p>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                                <strong>Price : </strong> {{$row->price}} ৳
                            </h2>
                            <h4 class="mt-0">
                                <strong>Quantity : </strong> {{$row->quantity}}
                            </h4>
                        </div>
                        <hr>
                        <h3>More Features</h3>
                        <hr>
                        @foreach($row->features as $mf)
                         <p><strong>{{$mf->key}} : </strong> {{$mf->value}}</p>
                        @endforeach
                    </div>
                    <div class="col-12 col-sm-4">
                        <h3 class="d-inline-block d-sm-none">{{$row->name}}</h3>
                        <div class="col-12">
                            <img src="{{URL::to($row->images[0]->image)}}" class="product-image" alt="Product Image">
                        </div>
                        <div class="col-12 product-image-thumbs">
                            @foreach($row->images as $img)
                                <div class="product-image-thumb">
                                    <img src="{{URL::to($img->image)}}" alt="Product Image">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection