@extends('frontEnd.layouts.master')
@section('title','Detial Product')
@section('slider')
@endsection
@section('content')
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-sm-12 col-md-3 col-xs-12 col-lg-3 col-xl-3">
            @include('frontEnd.layouts.category_menu')
        </div>
        <div class="col-sm-12 col-xs-12 col-md-9 col-xl-9 col-lg-9">
            <div class="product-details row">
                <!--product-details-->

                <div class="cold-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                    <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                        <a href="{{url('products/large',$detail_product->image)}}">
                            <img src="{{url('products/small',$detail_product->image)}}" alt="" id="dynamicImage" />
                        </a>
                    </div>

                    <ul class="thumbnails" style="margin-left: -10px;">
                        <li>
                            @foreach($imagesGalleries as $imagesGallery)
                            <a href="{{url('products/large',$imagesGallery->image)}}" data-standard="{{url('products/small',$imagesGallery->image)}}">
                                <!-- <img src="{{url('products/small',$imagesGallery->image)}}" alt="" width="75" style="padding: 8px;"> -->
                            </a>
                            @endforeach
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
                    <form action="{{route('addToCart')}}" method="post" role="form">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="products_id" value="{{$detail_product->id}}">
                        <input type="hidden" name="product_name" value="{{$detail_product->p_name}}">
                        <input type="hidden" name="product_code" value="{{$detail_product->p_code}}">
                        <input type="hidden" name="product_color" value="{{$detail_product->p_color}}">
                        <input type="hidden" name="price" value="{{$detail_product->price}}" id="dynamicPriceInput">
                        <div class="product-information">
                            <!--/product-information-->
                            <!-- <img src="{{asset('frontEnd/images/product-details/new.jpg')}}" class="newarrival" alt="" /> -->
                            <h2>{{$detail_product->p_name}}</h2>
                            <p>Code ID: {{$detail_product->p_code}}</p>
                            <span>
                                <select name="size" id="idSize" class="form-control">
                                    <option value="">Select Size</option>
                                    @foreach($detail_product->attributes as $attrs)
                                    <option value="{{$detail_product->id}}-{{$attrs->size}}">{{$attrs->size}}</option>
                                    @endforeach
                                </select>
                            </span><br>
                            <span class="price-qty-wrapper">
                                <span id="dynamic_price"> $ {{$detail_product->price}}</span>
                                <div class="qty">
                                    <label>Quantity:</label>
                                    <input type="text" class="form-control" name="quantity" value="{{$totalStock}}" id="inputStock" />
                                    <input type="text" class="form-control" name="quantity" value="1" id="inputStock" />
                                </div>
                            </span>
                            <p><b>Availability:</b>
                                @if($totalStock>0)
                                <span id="availableStock">In Stock</span>
                                @else
                                <span id="availableStock">Out of Stock</span>
                                @endif
                            </p>
                            <p><b>Condition:</b> New</p>
                            @if($totalStock>0)
                            <button type="submit" class="btn add-to-cart" id="buttonAddToCart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </button>
                            @endif
                            <!-- <a href=""><img src="{{asset('frontEnd/images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a> -->
                        </div>
                        <!--/product-information-->
                    </form>

                </div>
            </div>
            <!--/product-details-->

            <div class="category-tab shop-details-tab">
                <!--category-tab-->
                <div class="col-sm-12">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#details" data-toggle="tab">Details</a>
                        </li>
                        <li>
                            <a href="#rating" data-toggle="tab">Rating</a>
                        </li>
                        <!-- <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
                    <li><a href="#reviews" data-toggle="tab">Reviews (5)</a></li> -->
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="details">
                        {!!$detail_product->description!!}
                    </div>
                    <div class="tab-pane fade in" id="rating">
                        <span class="heading">User Rating</span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <p>4.1 average based on 254 reviews.</p>
                        <hr style="border:3px solid #f1f1f1">

                        <div class="row add-padding-to-rating-content">
                            <div class="side">
                                <div>5 star</div>
                            </div>
                            <div class="middle">
                                <div class="bar-container">
                                    <div class="bar-5"></div>
                                </div>
                            </div>
                            <div class="side right">
                                <div>150</div>
                            </div>
                            <div class="side">
                                <div>4 star</div>
                            </div>
                            <div class="middle">
                                <div class="bar-container">
                                    <div class="bar-4"></div>
                                </div>
                            </div>
                            <div class="side right">
                                <div>63</div>
                            </div>
                            <div class="side">
                                <div>3 star</div>
                            </div>
                            <div class="middle">
                                <div class="bar-container">
                                    <div class="bar-3"></div>
                                </div>
                            </div>
                            <div class="side right">
                                <div>15</div>
                            </div>
                            <div class="side">
                                <div>2 star</div>
                            </div>
                            <div class="middle">
                                <div class="bar-container">
                                    <div class="bar-2"></div>
                                </div>
                            </div>
                            <div class="side right">
                                <div>6</div>
                            </div>
                            <div class="side">
                                <div>1 star</div>
                            </div>
                            <div class="middle">
                                <div class="bar-container">
                                    <div class="bar-1"></div>
                                </div>
                            </div>
                            <div class="side right">
                                <div>20</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/category-tab-->
            @if(count($relateProducts)>0)
            <div class="recommended_items">
                <!--recommended_items-->
                <h2 class="title text-center">recommended items</h2>

                <div class="owl-carousel">

                    <?php $countChunk = 0; ?>
                    @foreach($relateProducts->chunk(3) as $chunk)
                    <?php $countChunk++; ?>
                    @foreach($chunk as $item)
                    <div class="item product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{url('/products/small',$item->image)}}" alt="" />
                                <h2>$ {{$item->price}}</h2>
                                <p>{{$item->p_name}}</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endforeach
                </div>
            </div>
            <!--/recommended_items-->
            @endif
        </div>
    </div>
</div>

@endsection