@extends('admin.layouts.app')
@section('admin_title', '| Setting')
@section('admin_css')
    <!-- summernote -->
    <link rel="stylesheet" href="{{url('')}}/public/backend/plugins/summernote/summernote-bs4.css">
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
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-info ">
                        <div class="card-header">
                            <h3 class="card-title">Update Setting</h3>
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
                        <form role="form" action="{{route('admin.setting.update')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <input type="hidden" name="id" value="{{$setting->id}}">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Mobile One</label>
                                            <input value="{{$setting->mobile_1}}" name="mobile_1" type="text"
                                                   class="form-control" placeholder="Mobile One">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Mobile two</label>
                                            <input value="{{$setting->mobile_2}}" name="mobile_2" type="text"
                                                   class="form-control" placeholder="Mobile two">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input value="{{$setting->email}}" name="email" type="text"
                                                   class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Facebook</label>
                                            <input value="{{$setting->facebook}}" name="facebook" type="text"
                                                   class="form-control" placeholder="Facebook">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Twitter</label>
                                            <input value="{{$setting->twitter}}" name="twitter" type="text"
                                                   class="form-control" placeholder="Twitter">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Youtube</label>
                                            <input value="{{$setting->youtube}}" name="youtube" type="text"
                                                   class="form-control" placeholder="Youtube">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea  name="address" class="textarea" placeholder="Place some text here"
                                                      style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                {{$setting->address}}
                                            </textarea>
                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Google Map</label>
                                            <textarea  name="google_map" class="form-control" rows="4">{{$setting->map}}</textarea>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="logo">Logo</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input accept="image/*" onchange="readURL(this);" name="logo" type="file"
                                                           class="custom-file-input" id="logo">
                                                    <label class="custom-file-label" for="logo">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label >Selected Logo</label>
                                            <img id="s_logo" src="#"/>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label >Old Logo</label>
                                        <img src="{{URL::to($setting->logo)}}"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="favicon">Favicon</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input accept="image/*" onchange="readURL1(this);" name="favicon" type="file"
                                                           class="custom-file-input" id="favicon">
                                                    <label class="custom-file-label" for="favicon">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label >Selected Favicon</label>
                                            <img id="s_fav" src="#"/>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label >Old Favicon</label>
                                        <img src="{{URL::to($setting->favicon)}}"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="banner_image">Banner</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input accept="image/*" onchange="readURL2(this);" name="banner_image" type="file"
                                                           class="custom-file-input" id="banner_image">
                                                    <label class="custom-file-label" for="banner_image">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label >Selected Banner</label>
                                            <img id="s_banner" src="#"/>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label >Old Banner</label>
                                        <img src="{{URL::to($setting->banner_image)}}" class="img-fluid"/>
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
    <!-- Summernote -->
    <script src="{{url('')}}/public/backend/plugins/summernote/summernote-bs4.min.js"></script>
    <script>
        $(function () {
            // Summernote
            $('.textarea').summernote()
        })
    </script>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#s_logo')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#s_fav')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#s_banner')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection