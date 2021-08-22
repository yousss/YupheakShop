@extends('backEnd.layouts.master')
@section('title','Add Products Page')
@section('content')
<div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('product.index')}}">Products</a> <a href="{{route('product.create')}}" class="current">Add New Product</a> </div>
<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Add New Products</h5>
        </div>
        <div class="widget-content create-edit-form">
            <form action="{{route('product.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <label class="category">Select Category</label>
                                <select class="form-control" id="category" name="categories_id">
                                    @foreach($cate_levels as $key=>$value)
                                    <option value="{{$key}}">{{$value}}</option>
                                    <?php
                                    if ($key != 0) {
                                        echo '<option value="' . $key . '">&nbsp;&nbsp;--' . $value . '</option>';
                                    }
                                    ?>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <label for="p_name" class="name">Name</label>
                                <input type="text" name="p_name" id="p_name" class="form-control" value="{{old('p_name')}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <label for="p_code">Code</label>
                                <input type="text" name="p_code" id="p_code" class="form-control" value="{{old('p_code')}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <label for="p_color">Color</label>
                                <input class="form-control" type="text" name="p_color" id="p_color" value="{{old('p_color')}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <label for="description">Description</label>
                                <textarea class="form-control ckeditor" name="description" id="description" rows="6">{{old('description')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <label for="price">Price($)</label>
                                <input type="number" step="any" name="price" id="price" class="form-control" value="{{old('price')}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <label for="image">Image upload</label>
                                <input type="file" class="form-control" name="image" id="image" />
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="input-group m-t-5">
                                <input type="submit" class="btn btn-success" value="Add New Product" />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('jsblock')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery.ui.custom.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/masked.js')}}"></script>
<script src="{{asset('js/jquery.uniform.js')}}"></script>

<script src="{{asset('js/matrix.js')}}"></script>
<script src="{{asset('js/jquery.peity.min.js')}}"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>

@endsection