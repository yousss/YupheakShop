@extends('backEnd.layouts.master')
@section('title','List Categories')
@section('content')
<div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('category.index')}}" class="current">Categories</a></div>
<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List Categories</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>Parent Category</th>
                        <th>Category Name</th>
                        <th>Created At</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr class="gradeC">
                        <td>{{$category->name}}</td>
                        <td>
                            @if(count($category->children)>0)
                            @foreach($category->children as $chil)
                            {{$chil->name}}
                            @endforeach
                            @else
                            {{$category->name}}
                            @endif
                        </td>
                        <td style="text-align: center;">{{$category->created_at->diffForHumans()}}</td>
                        <td style="text-align: center;">{{($category->status==0)?' Disabled':'Enable'}}</td>
                        <td style="text-align: center;">
                            <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary btn-mini">Edit</a>
                            <a href="javascript:" rel="{{$category->id}}" rel1="delete-category" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('jsblock')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery.ui.custom.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.uniform.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/matrix.js')}}"></script>
<script src="{{asset('js/matrix.tables.js')}}"></script>
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
@endsection