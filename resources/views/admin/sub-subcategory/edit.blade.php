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
                            <h3 class="card-title">Update Sub Subcategory</h3>
                            <a href="{{route('admin.sub-subcategory.index')}}" class="btn btn-success btn-flat float-right">All Sub Subcategories</a>
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
                        <form role="form" action="{{route('admin.sub-subcategory.update',$row->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Subcategory Name</label>
                                    <input value="{{$row->name}}" name="name" type="text" class="form-control"  placeholder="Subcategory Name">
                                </div>
                                <div class="form-group">
                                    <label>Select a category</label>
                                    <select name="category_id" class="form-control" id="category_id">
                                        <option selected disabled value="">Select a category</option>
                                        @foreach($cats as $cat)
                                            <option {{$cat->id == $row->id ? 'selected' : ''}} value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Select a Subcategory</label>
                                    <select name="sub_category_id" class="form-control" id="sub_category_id">
                                        @foreach($subcats as $cat)
                                            <option {{$cat->id == $row->id ? 'selected' : ''}} value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-check">
                                    <input name="status"  {{$row->status == 1 ? 'checked' : ''}} value="1" type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Status</label>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#category_id').on('change', function(){
                var cat_id = $(this).val();
                if(cat_id) {
                    $.ajax({
                        url: "{{ url('admin/get/subcategory/') }}/"+cat_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            $('#sub_category_id').empty();
                            $('#sub_category_id').append(' <option selected disabled value="">Select a Subcategory</option>');
                            $.each(data,function(index,empObj){
                                $('#sub_category_id').append('<option value="' + empObj.id + '">'+empObj.name+'</option>');
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