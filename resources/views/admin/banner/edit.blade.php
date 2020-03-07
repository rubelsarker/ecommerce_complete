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
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <!-- general form elements -->
                    <div class="card card-info ">
                        <div class="card-header">
                            <h3 class="card-title">Update Banner</h3>
                            <a href="{{route('admin.banner.index')}}" class="btn btn-success btn-flat float-right">All Banners</a>
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
                        <form role="form" action="{{route('admin.banner.update',$row->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="banner">Banner</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input  accept="image/*" onchange="readURL(this);" name="banner" type="file" class="custom-file-input" id="banner">
                                                    <label class="custom-file-label" for="banner">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Selected Banner</label>
                                            <img id="banner-show" src="#" />
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Old Banner</label>
                                            <img src="{{URL::to($row->banner)}}" class="img-fluid" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Banner Text</label>
                                            <input value="{{$row->banner_text}}" name="banner_text" type="text" class="form-control"  placeholder="Banner Text">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="banner_product">Banner Product</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input  accept="image/*" onchange="readURL1(this);" name="banner_product" type="file"
                                                            class="custom-file-input" id="banner_product">
                                                    <label class="custom-file-label" for="banner_product">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Selected Banner Product</label>
                                            <img id="banner-product-show" src="#" />
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Old Banner Product</label>
                                            <img src="{{URL::to($row->banner_product)}}" class="img-fluid" />
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input value="{{$row->product_name}}" name="product_name" type="text" class="form-control"  placeholder="Product Name">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Product Price</label>
                                            <input value="{{$row->product_price}}" name="product_price" type="text" class="form-control"  placeholder="Product Price">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check " style="margin: 39px 0 0 25px;">
                                            <input {{$row->status ==1 ? 'checked' : ''}} name="status"   value="1" type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Status</label>
                                        </div>
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
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#banner-show')
                        .attr('src', e.target.result)
                        .width(400)
                        .height(150);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#banner-product-show')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection