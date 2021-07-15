@extends('frontEnd.layouts.master')
@section('title','List Products')
@section('slider')
@endsection
@section('content')
    <div class="container">
        <div class="section mb-5">
            <img src="{{asset('frontEnd/images/home/Welcome.png')}}" alt="Logo" style="height:100%; width:100%; margin-top:-5%;"/> 
        </div>
        <div class="row">
            <div class="col-sm-3">
                @include('frontEnd.layouts.category_menu')
            </div>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <?php
                            if($byCate!=""){
                                $products=$list_product;
                                echo '<h2 class="title text-center">Category '.$byCate->name.'</h2>';
                            }else{
                                echo '<h2 class="title text-center">List Products</h2>';
                            }
                    ?>
                    <div class="row row-flex">
                    @foreach($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-4">

                        @if($product->category->status==1)
                            <div class="product-image-wrapper">
                            <!-- {{$product}} -->
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="{{url('/product-detail',$product->id)}}"><img src="{{url('products/small/',$product->image)}}" alt="" /></a>
                                        <h2>$ {{$product->price}}</h2>
                                        <p class="show-read-more">{{$product->p_name}}</p>
                                        <a href="{{url('/product-detail',$product->id)}}" class="btn btn-default add-to-cart">View Product</a>
                                    </div>
                                </div>
                                <!-- <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div> -->
                            </div>
                        @endif
                        </div>

                    @endforeach
                    </div>
                    <div style="margin-left: 30%">{!! $products !!}</div>
                </div><!--features_items-->
            </div>
        </div>
    </div>
@endsection