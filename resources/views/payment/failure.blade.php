@extends('frontEnd.layouts.master')
@section('title','incompleted transaction')
@section('slider')
@endsection
@section('content')
<div class="container">
    <h3 class="text-center">YOUR ORDER HAS NOT BEEN COMPLETED</h3>
    <p class="text-center">Thanks for that you trust us. Please contact our agencies to coordinate feasible payment options</p>
    <div class="payment-wrapper">
        <div class="info-wrapper">
            <div class="label">Email:</div>
            <div class="value">sale@ypsolutionkh.com</div>
        </div>
        <div class="info-wrapper">
            <div class="label">Phone:</div>
            <div class="value">087 961 669 / 089 961 669</div>
        </div>
    </div>
    <p class="text-center">Or we will contact you by Your Email (<b>{{$email}}</b>) or Your Phone Number (<b>{{$mobile}}</b>)</p>
    <p style="display: flex; justify-content:center;"> <a href="/" class="btn add-to-cart">Shop again</a></p>
</div>
<div style="margin-bottom: 20px;"></div>
@endsection