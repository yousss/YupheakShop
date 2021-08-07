@extends('frontEnd.layouts.master')
@section('title','success')
@section('slider')
@endsection
@section('content')
<div class="container">
    <h3 class="text-center">YOUR ORDER HAS BEEN PLACED</h3>
    <p class="text-center">Thanks for your Order that use Options on Cash On Delivery</p>
    <p class="text-center">We will contact you by Your Email (<b>{{$email}}</b>) or Your Phone Number (<b>{{$mobile}}</b>)</p>
    <p style="display: flex; justify-content:center;"> <a href="/" class="btn add-to-cart">Shop again</a></p>
</div>
<div style="margin-bottom: 20px;"></div>
@endsection