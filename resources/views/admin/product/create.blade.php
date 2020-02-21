@extends('admin.layouts.app')
@section('admin_title', '| Product')
@section('admin_css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{url('')}}/public/backend/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{url('')}}/public/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection
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
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-info ">
                        <div class="card-header">
                            <h3 class="card-title">Add New Product</h3>
                            <a href="{{route('admin.product.index')}}" class="btn btn-success btn-flat float-right">All
                                Products</a>
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
                        <form role="form" action="{{route('admin.product.store')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <span class="text-danger text-bold mb-3">* required</span>
                                <div class="col-12">
                                    <div class="card card-primary card-outline card-tabs">
                                        <div class="card-header p-0 pt-1 border-bottom-0">
                                            <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="custom-tabs-two-home-tab"
                                                       data-toggle="pill" href="#custom-tabs-two-main" role="tab"
                                                       aria-controls="custom-tabs-two-main"
                                                       aria-selected="true">Main</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-two-profile-tab"
                                                       data-toggle="pill" href="#custom-tabs-two-variant"
                                                       role="tab" aria-controls="custom-tabs-two-profile"
                                                       aria-selected="false">Variant</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-two-messages-tab"
                                                       data-toggle="pill" href="#custom-tabs-two-image"
                                                       role="tab" aria-controls="custom-tabs-two-messages"
                                                       aria-selected="false">Image</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-two-settings-tab"
                                                       data-toggle="pill"
                                                       href="#custom-tabs-two-more-features" role="tab"
                                                       aria-controls="custom-tabs-two-settings"
                                                       aria-selected="false">More Features</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content" id="custom-tabs-two-tabContent">
                                                <div class="tab-pane fade show active" id="custom-tabs-two-main"
                                                     role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label>Product Name <span
                                                                                    class="text-danger">*</span></label>
                                                                        <input name="name" type="text"
                                                                               class="form-control"
                                                                               placeholder="Product Name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label>Product Code <span
                                                                                    class="text-danger">*</span></label>
                                                                        <input onchange="myFunction()" id="have_code"
                                                                               type="checkbox"
                                                                               class="form-check-inline ml-2">I have a
                                                                        code
                                                                        <input id="code" name="p_code" type="text"
                                                                               class="form-control"
                                                                               placeholder="Product Code">
                                                                        <input type="hidden" name="p_code"
                                                                               value="P-{{ time() }}" id="auto_code">
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label>Brand</label>
                                                                        <select name="brand_id" class="custom-select">
                                                                            <option value="">Select a brand</option>
                                                                            @foreach($brands as $brand)
                                                                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label>Category <span
                                                                                    class="text-danger">*</span></label>
                                                                        <select name="cat_id" id="cat_id"
                                                                                class="custom-select cat_id">
                                                                            <option value="">Select a Category</option>
                                                                            @foreach($cats as $cat)
                                                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label>Subcategory</label>
                                                                        <select name="sub_cat_id" id="sub_cat_id"
                                                                                class="custom-select sub_cat_id">
                                                                            <option value="">Select a Subcategory
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label>Sub Subcategory</label>
                                                                        <select name="sub_sub_cat_id"
                                                                                id="sub_sub_cat_id"
                                                                                class="custom-select sub_sub_cat_id">
                                                                            <option value="">Select a Sub Subcategory
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label>Unit</label>
                                                                        <select name="unit" class="custom-select">
                                                                            <option selected  value="">Select a
                                                                                Unit
                                                                            </option>
                                                                            @foreach($units as $unit)
                                                                                <option value="{{$unit->short_name}}">{{$unit->full_name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label>Quantity <span
                                                                                    class="text-danger">*</span></label>
                                                                        <input name="quantity" type="number"
                                                                               class="form-control"
                                                                               placeholder="Product Quantity">
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label>Price <span class="text-danger">*</span></label>
                                                                        <input name="price" type="number"
                                                                               class="form-control"
                                                                               placeholder="Product Price">
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label>Size</label>
                                                                        <select name="size" class="custom-select">
                                                                            <option selected  value="">Select a
                                                                                Size
                                                                            </option>
                                                                            @foreach($sizes as $size)
                                                                                <option value="{{$size->short_name}}">{{$size->full_name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label>Color</label>
                                                                        <select name="color" class="custom-select">
                                                                            <option selected disabled value="">Select a
                                                                                Color
                                                                            </option>
                                                                            @foreach($colors as $color)
                                                                                <option style="background-color: {{$color->code}}"
                                                                                        value="{{$color->id}}">{{$color->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-check mt-2">
                                                                        <label></label><br>
                                                                        <input name="variant" value="1" type="checkbox"
                                                                               class="form-check-input">
                                                                        <label class="form-check-label">Variant</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-2">
                                                                    <div class="form-check mt-2">
                                                                        <label></label><br>
                                                                        <input onchange="mydiscount()" id="discount"
                                                                               name="discount" type="checkbox"
                                                                               class="form-check-input" value="1">
                                                                        <label for="discount" class="form-check-label">Discount</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4" id="discount_percent"
                                                                     style="display: none">
                                                                    <div class="form-group">
                                                                        <label>Discount Percent</label>
                                                                        <input name="discount_percent" type="number"
                                                                               class="form-control"
                                                                               placeholder="Discount Percent">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>Description</label>
                                                                        <textarea name="description"
                                                                                  class="form-control"
                                                                                  rows="3"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-two-variant" role="tabpanel"
                                                     aria-labelledby="custom-tabs-two-profile-tab">
                                                  <div class="row">
                                                      <div class="col-4">
                                                          <div class="form-group">
                                                              <label>Size</label>
                                                              <div class="select2-purple">
                                                                  <select class="select2" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                                      <option value="">Select a size</option>
                                                                      @foreach($sizes as $size)
                                                                          <option value="{{$size->short_name}}">{{$size->full_name}}</option>
                                                                      @endforeach
                                                                  </select>
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="col-4">
                                                          <div class="form-group">
                                                              <label>Color</label>
                                                              <div class="select2-purple">
                                                                  <select class="select2" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                                      <option value="">Select a color</option>
                                                                      @foreach($colors as $color)
                                                                          <option value="{{$color->id}}">{{$color->name}}</option>
                                                                      @endforeach
                                                                  </select>
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="col-12">
                                                          <div class="row">
                                                              <div class="col-4">
                                                                  <div class="form-group">
                                                                      <label>Variant</label>
                                                                      <input name="variant-sku" type="text"
                                                                             class="form-control"
                                                                             placeholder="Variant Sku" readonly>
                                                                  </div>
                                                              </div>
                                                              <div class="col-4">
                                                                  <div class="form-group">
                                                                      <label>Quantity</label>
                                                                      <input name="variant_qty" type="number"
                                                                             class="form-control"
                                                                             placeholder="Variant Number" >
                                                                  </div>
                                                              </div>
                                                              <div class="col-4">
                                                                  <div class="form-group">
                                                                      <label>Quantity</label>
                                                                      <input name="variant_price" type="number"
                                                                             class="form-control"
                                                                             placeholder="Variant Price" >
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-two-image" role="tabpanel"
                                                     aria-labelledby="custom-tabs-two-messages-tab">
                                                    <div class="form-group">
                                                        <label for="brand_logo">Product Images</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input  name="images[]" multiple type="file" class="custom-file-input" id="brand_logo">
                                                                <label class="custom-file-label" for="brand_logo">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-two-more-features"
                                                     role="tabpanel" aria-labelledby="custom-tabs-two-settings-tab">
                                                    <div class="form-group mt-repeater no-extra-space">
                                                        <div data-repeater-list="more_option">
                                                            <div data-repeater-item class="mt-repeater-item">
                                                                <div class="mt-repeater-row">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="position-relative form-group">
                                                                                <label for="key" class="">Feature</label>
                                                                                <input name="key" id="key" placeholder="Feature" type="text" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="position-relative form-group">
                                                                                <label for="value" class="">Value</label>
                                                                                <input name="value" id="value" placeholder="Value" type="text" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="position-relative form-group">
                                                                                <a style="margin-top: 31px;" href="javascript:;" data-repeater-delete class="btn btn-danger  mt-repeater-delete">
                                                                                    <i class="fas fa-window-close"></i>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-offset-1 col-md-9">
                                                            <a href="javascript:;" data-repeater-create
                                                               class="btn btn-info mt-repeater-add">
                                                                <i class="fa fa-plus"></i> Add More Feature
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info btn-flat float-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('admin_script')
    <script src="{{url('')}}/public/backend/js/repeater.js" type="text/javascript"></script>
    <script src="{{url('')}}/public/backend/js/indicator-repeater.js" type="text/javascript"></script>
    <script src="{{url('')}}/public/backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- Select2 -->
    <script src="{{url('')}}/public/backend/plugins/select2/js/select2.full.min.js"></script>
    <script type="text/javascript">
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        function mydiscount() {
            if ($('#discount').prop("checked")) {
                $('#discount_percent').show();
            } else {
                $('#discount_percent').hide();
            }
        }
        $(document).ready(function () {
            bsCustomFileInput.init();
        });

        $('#code').val($('#auto_code').val()); // Hide the text input box in default
        function myFunction() {
            if ($('#have_code').prop('checked')) {
                $('#code').val('');
                $('#code').prop('readonly', true);
            } else {
                $('#code').val($('#auto_code').val());
                $('#code').prop('readonly', false);
            }
        }

        $(document).ready(function () {

            $('#cat_id').on('change', function () {
                var cat_id = $(this).val();
                if (cat_id) {
                    $.ajax({
                        url: "{{ url('admin/get/subcategory/') }}/" + cat_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('#sub_cat_id').empty();
                            $('#sub_cat_id').append(' <option selected disabled value="">--Select a Subcategory--</option>');
                            $.each(data, function (index, empObj) {
                                $('#sub_cat_id').append('<option value="' + empObj.id + '">' + empObj.name + '</option>');
                            });
                        }
                    });
                } else {
                    alert('danger');
                }
            });
            $('#sub_cat_id').on('change', function () {
                var sub_cat_id = $(this).val();
                if (sub_cat_id) {
                    $.ajax({
                        url: "{{ url('admin/get/sub-subcategory/') }}/" + sub_cat_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('#sub_sub_cat_id').empty();
                            $('#sub_sub_cat_id').append(' <option selected disabled value="">--Select a Sub Subcategory--</option>');
                            $.each(data, function (index, empObj) {
                                $('#sub_sub_cat_id').append('<option value="' + empObj.id + '">' + empObj.name + '</option>');
                            });
                        }
                    });
                } else {
                    alert('danger');
                }
            });
        });

    </script>
@endsection