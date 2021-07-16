@extends('frontEnd.layouts.master')
@section('title','List Products')
@section('slider')
@endsection
@section('content')
<div class="container">
    <div class="section mb-5">
        <img src="{{asset('frontEnd/images/home/Welcome.png')}}" alt="Logo" style="height:100%; width:100%;" />
    </div>
    <div class="row">
        <div class="col-md-3">
            @include('frontEnd.layouts.category_menu')
        </div>
        <div class="col-md-9">
            <div class="features_items">
                <!--features_items-->

                <?php
                if ($byCate != "") {
                    // $products = $byCate[0];
                    echo '<h2 class="title text-center">Category ' . $byCate->name . '</h2>';
                } else {
                    echo '<h2 class="title text-center">List Products</h2>';
                }
                ?>
                <div class="row row-flex">
                    @if(count($products)> 0)
                    @foreach($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="product-image-wrapper">
                            <div class="image-wrapper">
                                <a href="{{url('/product-detail',$product->id)}}">
                                    <img src="{{url('products/small/',$product->image)}}" alt="no product" />
                                </a>
                            </div>
                            <div class="single-products">
                                <h2>$ {{$product->price}}</h2>
                                <p class="show-read-more">{{$product->p_name}}</p>
                                <a href="{{url('/product-detail',$product->id)}}" class="btn btn-default add-to-cart">View Product</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @elseif(count($products) === 0)
                    <div class="col-md-9">
                        <h2 class="text-center">No reord found</h2>
                    </div>
                    @endif
                </div>
                <div style="margin-left: 30%">{!! $products !!}</div>
            </div>
            <!--features_items-->
        </div>
    </div>
</div>
@endsection