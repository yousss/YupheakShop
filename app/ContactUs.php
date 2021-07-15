@extends('frontEnd.layouts.master')
@section('title','Contact Us Page')
@section('slider')
@endsection
@section('content')
    
<section id="do_action">
    <div class="container">
        <h2 class="mb-4" style="margin-top: -16px; margin-bottom: 26px">Contact Us</h2>
        <p>
            <b><i class="fa fa-map-marker" style="font-size: 20px;"></i></b>
            St.69, SangKat Phsar Daeum Thkov, Khan Chamka Mon, Phnom Penh, Cambodia.
        </p>
        <p>
            <b><i class="fa fa-phone" style="font-size: 15px;"></i></b>
            +855 89/87 961 669
        </p>
        <p>
            <b><i class="fa fa-envelope" style="font-size: 15px;"></i> Our Professional Sale Team:</b>
            sale@ypsolutionkh.com
        </p>
        <p>
            <b><i class="fa fa-envelope" style="font-size: 15px;"></i> Support Team:</b>
            support@ypsolutionkh.com
        </p>
        <p>
            <b><i class="fa fa-envelope" style="font-size: 15px;"></i> RMA Team:</b>
            rma@ypsolutionkh.com
        </p>
            
        <div class="chose_area" style="padding: 20px;">
            <form action="{{url('/#')}}" method="post" role="form">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="coupon_code">First Name<b class="text-danger"> *</b></label>
                            <div class="">
                                <input type="text" class="form-control" name="coupon_code" id="coupon_code" placeholder="First name ...">
                            </div>    
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="coupon_code">Last Name <b class="text-danger"> *</b></label>
                            <div class="">
                                <input type="text" class="form-control" name="coupon_code" id="coupon_code" placeholder="Last name ...">
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="coupon_code">Company</label>
                            <div class="">
                                <input type="text" class="form-control" name="coupon_code" id="coupon_code" placeholder="Company ...">
                            </div>    
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="coupon_code">Email<b class="text-danger"> *</b></label>
                            <div class="">
                                <input type="text" class="form-control" name="coupon_code" id="coupon_code" placeholder="Email ...">
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="coupon_code">Phone Number</label>
                            <div class="">
                                <input type="text" class="form-control" name="coupon_code" id="coupon_code" placeholder="Phone number ...">
                            </div>    
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="coupon_code">Telegram</label>
                            <div class="">
                                <input type="text" class="form-control" name="coupon_code" id="coupon_code" placeholder="Telegram ...">
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="coupon_code">We'd happy to Hear from You<b class="text-danger"> *</b></label>
                            <div class="">
                                <textarea class="form-control" rows="4" cols="50" name="" >Enter text here...</textarea>
                            </div>    
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</section><!--/#do_action-->
@endsection