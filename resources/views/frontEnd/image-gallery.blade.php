@extends('frontEnd.layouts.master')
@section('title','Image Galleries')
@section('content')
<div class="container image-wrapper-container">
    @if(count($galleries))
    @foreach($galleries as $image)
    <div class="image-wrapper">
        <img src='{{url("products/medium/$image->image")}}' class="img-rounded" alt="Cinque Terre" width="304" height="236">
    </div>
    @endforeach
    @endif
</div>
@endsection