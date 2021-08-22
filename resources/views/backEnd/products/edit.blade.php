@extends('backEnd.layouts.master')
@section('title','Add Products Page')
@section('content')
<div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('product.index')}}">Products</a> <a href="#" class="current">Edit Product</a> </div>
<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Edit Product</h5>
        </div>
        <div class="widget-content create-edit-form">
            <form action="{{route('product.update',$edit_product->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                {{method_field("PUT")}}
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <label for="category">Select Category</label>
                                <select name="categories_id" class="form-control">
                                    @foreach($cate_levels as $key=>$value)
                                    <?php
                                    $isSelected = $edit_product->category->id == $key ? "selected" : "";
                                    if ($key != 0) {
                                        echo '<option ' . $isSelected . ' value="' . $key . '">&nbsp;&nbsp;--' . $value . '</option>';
                                    }
                                    echo '<option value="$key" ' . $isSelected . '>' . $value . '</option>';

                                    ?>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <label for="p_name">Name</label>
                                <input type="text" name="p_name" id="p_name" class="form-control" value="{{$edit_product->p_name}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <label for="p_code">Code</label>
                                <input type="text" name="p_code" id="p_code" class="form-control" value="{{$edit_product->p_code}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <label for="p_color">Color</label>
                                <input type="text" class="form-control" name="p_color" id="p_color" value="{{$edit_product->p_color}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <label for="description">Description</label>
                                <textarea class="form-control ckeditor" name="description" id="description" rows="6" placeholder="Product Description">{{$edit_product->description}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <label for="price">Price($)</label>
                                <input type="number" step="any" name="price" id="price" class="form-control" value="{{$edit_product->price}}" title="" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <label for="image">Image upload</label>
                                <input type="file" name="image" id="image" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            @if($edit_product->image!='')
                            &nbsp;&nbsp;&nbsp;
                            <a href="javascript:" rel="{{$edit_product->id}}" rel1="delete-image" class="btn btn-danger btn-mini deleteRecord">Delete Old Image</a>
                            <img src="{{url('products/small/',$edit_product->image)}}" width="35" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="" class="control-label"></label>
                        <div class="controls">
                            <button type="submit" class="btn btn-success">Edit Product</button>
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
<script src="{{asset('js/bootstrap-colorpicker.js')}}"></script>
<script src="{{asset('js/masked.js')}}"></script>
<script src="{{asset('js/jquery.uniform.js')}}"></script>

<script src="{{asset('js/matrix.js')}}"></script>
<script src="{{asset('js/jquery.peity.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
    $(".deleteRecord").click(function() {
        var id = $(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }, function() {
            window.location.href = "/admin/" + deleteFunction + "/" + id;
        });
    });
</script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection