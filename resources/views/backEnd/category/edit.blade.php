@extends('backEnd.layouts.master')
@section('title','Edit Category')
@section('content')
<div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('category.index')}}">Categories</a> <a href="#" class="current">Edit Category</a> </div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Edit Category</h5>
                </div>
                <div class="widget-content create-edit-form ">
                    <form class="form-horizontal" method="post" action="{{route('category.update',$edit_category->id)}}" name="basic_validate" id="basic_validate" novalidate="novalidate">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        {{method_field("PUT")}}

                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="input-group">
                                        <label for="Category">Category Name :</label>
                                        <input value="{{ $edit_category->name }}" type="text" name="name" id="Category" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="input-group">
                                        <label for="parent_id">Category Level :</label>
                                        <select class="form-control" name="parent_id" id="parent_id">
                                            @foreach($cate_levels as $key=>$value)
                                            <option selected="{{ $key === $edit_category->parent_id? 'true': 'false'  }}" value="{{$key}}">{{$value}}</option>
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
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="input-group">
                                        <label for="description">Description :</label>
                                        <textarea class="form-control" name="description" id="description" rows="3">{{ $edit_category->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="input-group">
                                        <label class="url">URL (Start with http://) :</label>
                                        <input type="text" value="{{ $edit_category->url}}" class="form-control" name="url" id="url" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="input-group">
                                        <label for="status">Enable :</label>
                                        <input checked="{{ $edit_category->status ===1 ? 'true': 'false' }}" class="form-control" type="checkbox" name="status" id="status">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-4 col-lg-4 col-md-offset-3">
                                    <div class="input-group-btn">
                                        <input type="submit" value="Save" class="btn btn-success">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('jsblock')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery.ui.custom.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.uniform.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/jquery.validate.js') }}"></script>
<script src="{{ asset('js/matrix.js') }}"></script>
<script src="{{ asset('js/matrix.form_validation.js') }}"></script>
<script src="{{ asset('js/matrix.tables.js') }}"></script>
<script src="{{ asset('js/matrix.popover.js') }}"></script>
@endsection