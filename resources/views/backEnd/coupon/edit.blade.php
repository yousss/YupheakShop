@extends('backEnd.layouts.master')
@section('title','Edit Coupons Page')
@section('content')
<div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('coupon.index')}}">Coupons</a> <a href="#" class="current">Edit Coupon</a> </div>
<div class="container-fluid">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Add New Coupon</h5>
        </div>
        <div class="widget-content create-edit-form">
            <form action="{{route('coupon.update',$edit_coupons->id)}}" method="post" class="form-horizontal">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                {{method_field("PUT")}}

                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="input-group">
                                <label for="coupon_code">Coupon Code</label>
                                <input type="text" value="{{$edit_coupons->coupon_code}}" name="coupon_code" id="coupon_code" class="form-control" value="{{old('coupon_code')}}" required minlength="5" maxlength="15">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="input-group">
                                <label for="amount">Amount</label>
                                <input value="{{$edit_coupons->amount}}" type="number" step="0.1" min="0" name="amount" id="amount" class="form-control" value="{{old('amount')}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="input-group">
                                <label for="amount_type">Amount Type</label>
                                <select name="amount_type" id="amount_type" class="form-control">
                                    <option value="Percentage">Percentage</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="input-group">
                                <label for="expiry_date">Expiry Date</label>
                                <input value="{{$edit_coupons->expiry_date}}" step="any" required type="datetime-local" name="expiry_date" id="expiry_date" data-date-format="yyyy-mm-dd" class="form-control" placeholder="yyyy-mm-dd">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="input-group">
                                <label class="status">Enable :</label>
                                <input class="form-control" type="checkbox" name="status" id="status" {{$edit_coupons->status==1?'checked':''}}>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4 col-md-offset-3">
                            <div class="input-group-btn">
                                <input type="submit" value="Add New Coupon" class="btn btn-success">
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
<script src="{{asset('js/bootstrap-colorpicker.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('js/jquery.toggle.buttons.js')}}"></script>
<script src="{{asset('js/masked.js')}}"></script>
<script src="{{asset('js/jquery.uniform.js')}}"></script>

<script src="{{asset('js/matrix.js')}}"></script>
<script src="{{asset('js/matrix.form_common.js')}}"></script>
<script src="{{asset('js/wysihtml5-0.3.0.js')}}"></script>
<script src="{{asset('js/jquery.peity.min.js')}}"></script>
<script src="{{asset('js/bootstrap-wysihtml5.js')}}"></script>
<script>
    $('.textarea_editor').wysihtml5();
</script>
@endsection