@extends('frontEnd.layouts.master')
@section('title','Login Register Page')
@section('slider')
@endsection
@section('content')
<div class="container">
    <div class="row" style="padding: 0px 10px;">
        <div class="col-sm-4 col-xs-12 col-md-4 col-lg-4 col-xl-4">
            <div class="row">
                <!--login form-->
                <div class="col-md-12">
                    <h2>Login to your account</h2>
                    <form action="{{url('/user_login')}}" method="post" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <input class="form-control" type="email" placeholder="Email" name="email" />
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" placeholder="Password" name="password" />
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">
                                Keep me signed in
                            </label>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-offset-4 col-xs-8 col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-default add-to-cart">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--/login form-->
        </div>
        <div class="col-sm-2 col-xs-12 col-md-2 col-lg-2 col-xl-2">
            <div class="row">
                <div class="col-md-12 the-oval">
                    <h2 class="or">OR</h2>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xs-12">
            <div class="row">
                <div class="col-md-12">
                    <!--sign up form-->
                    <h2>New User Signup!</h2>
                    <form action="{{url('/register_user')}}" method="post" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Full Name" name="name" value="{{old('name')}}" />
                            <span class="text-danger">{{$errors->first('name')}}</span>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="email" placeholder="Email Address" name="email" value="{{old('email')}}" />
                            <span class="text-danger">{{$errors->first('email')}}</span>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" placeholder="Password" name="password" value="{{old('password')}}" />
                            <span class="text-danger">{{$errors->first('password')}}</span>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" placeholder="Confirm Password" name="password_confirmation" value="{{old('password_confirmation')}}" />
                            <span class="text-danger">{{$errors->first('password_confirmation')}}</span>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-offset-5 col-xs-7 col-sm-offset-5 col-sm-7">
                                <button type="submit" class="btn btn-default add-to-cart">Signup</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--/sign up form-->
        </div>
    </div>
</div>
<div style="margin-bottom: 20px;"></div>
@endsection