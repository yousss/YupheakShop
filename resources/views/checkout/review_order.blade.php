@extends('frontEnd.layouts.master')
@section('title','Review Order Page')
@section('slider')
@endsection
@section('content')
<div class="container">
    <div class="step-one">
        <h2 class="heading">Shipping To</h2>
    </div>
    <div class="row">
        <form action="{{url('/submit-order')}}" method="post" class="form-horizontal">
            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <input type="hidden" name="users_id" value="{{$shipping_address->users_id}}">
            <input type="hidden" name="users_email" value="{{$shipping_address->users_email}}">
            <input type="hidden" name="name" value="{{$shipping_address->name}}">
            <input type="hidden" name="address" value="{{$shipping_address->address}}">
            <input type="hidden" name="city" value="{{$shipping_address->city}}">
            <input type="hidden" name="state" value="{{$shipping_address->state}}">
            <input type="hidden" name="pincode" value="{{$shipping_address->pincode}}">
            <input type="hidden" name="country" value="{{$shipping_address->country}}">
            <input type="hidden" name="shipping_address_id" value="{{$shipping_address->id}}">
            <input type="hidden" name="shipping_charges" value="0">
            <input type="hidden" name="order_status" value="success">
            @if(Session::has('discount_amount_price'))
            <input type="hidden" name="coupon_code" value="{{Session::get('coupon_code')}}">
            <input type="hidden" name="coupon_amount" value="{{Session::get('discount_amount_price')}}">
            <input type="hidden" name="grand_total" value="{{$total_price-Session::get('discount_amount_price')}}">
            @else
            <input type="hidden" name="coupon_code" value="NO Coupon">
            <input type="hidden" name="coupon_amount" value="0">
            <input type="hidden" name="grand_total" value="{{$total_price}}">
            @endif

            <div class="col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Country</th>
                                <th>Pincode</th>
                                <th>Mobile</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$shipping_address->name}}</td>
                                <td>{{$shipping_address->address}}</td>
                                <td>{{$shipping_address->city}}</td>
                                <td>{{$shipping_address->state}}</td>
                                <td>{{$shipping_address->country}}</td>
                                <td>{{$shipping_address->pincode}}</td>
                                <td>{{$shipping_address->mobile}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <section class="cart_items">
                    <div class="review-payment">
                        <h2>Review & Payment</h2>
                    </div>
                    <div class="table-responsive cart_info">
                        <table class="table table-condensed">
                            <thead>
                                <tr class="cart_menu">
                                    <td class="image">Item</td>
                                    <td class="description ">Description</td>
                                    <td class="price">Price</td>
                                    <td class="quantity">Quantity</td>
                                    <td class="total">Total</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart_datas as $cart_data)

                                <tr>
                                    <td class="cart_product">
                                        <a href="{{ route('productDetail',['product_id' => $cart_data->product->id]) }}">
                                            <img src="{{url('products/small',$cart_data->product->image)}}" alt="" style="width: 100px;">
                                        </a>
                                    </td>
                                    <td class="text-center cart_description">
                                        <div class="name">{{$cart_data->product_name}}</div>
                                        <div class="code">{{$cart_data->product_code}} | {{$cart_data->size}}</div>
                                    </td>

                                    <td class="cart_price ">
                                        <div class="price"> ${{$cart_data->price}}</div>
                                    </td>
                                    <td class="cart_quantity">
                                        <p>{{$cart_data->quantity}}</p>
                                    </td>
                                    <td class="cart_total ">
                                        <input type="hidden" name="cart_id[]" value="{{ $cart_data->id }}" />
                                        <input name="product_id[]" type="hidden" value="{{$cart_data->product->id}}" />
                                        <input name="qty[]" type="hidden" value="{{$cart_data->quantity}}" />
                                        <input name="product_attribute_id[]" type="hidden" value="{{$cart_data->product_attribute_id}}" />
                                        <p class="cart_total_price">$ {{ $cart_data->price*$cart_data->quantity }}</p>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">&nbsp;</td>
                                    <td colspan="2">
                                        <table class="table table-condensed total-result">
                                            <tr>
                                                <td>
                                                    <h4>Cart Sub Total</h4>
                                                </td>
                                                <td class="text-primary">
                                                    <h4> $ {{$total_price}}</h4>
                                                </td>
                                            </tr>
                                            @if(Session::has('discount_amount_price'))
                                            <tr class="shipping-cost">
                                                <td>Coupon Discount</td>
                                                <td>$ {{Session::get('discount_amount_price')}}</td>
                                            </tr>
                                            <tr>
                                                <td>Total</td>
                                                <td><span>$ {{$total_price-Session::get('discount_amount_price')}}</span></td>
                                            </tr>
                                            @else
                                            <tr>
                                                <td>
                                                    <h4>Total</h4>
                                                </td>
                                                <td class="text-primary">
                                                    <h4>$ {{$total_price}}</h4>
                                                </td>
                                            </tr>
                                            @endif
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="payment-options">
                        <span>Select Payment Method : </span>
                        <span>
                            <label>
                                <input type="radio" name="payment_method" value="COD" checked>
                                Cash On Delivery</label>
                        </span>
                        <span>
                            <label><input type="radio" name="payment_method" value="Paypal"> Paypal</label>
                        </span>
                        <button type="submit" class="btn add-to-cart" style="float: right;">Order Now</button>
                    </div>
                </section>

            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <h3>Other local payment options</h3>
            <div class="row">
                <div class="col-sm-6 col-xs-12 col-md-4">
                    <div class="payment-wrapper">
                        <div class="all-images">
                            <div class="image-wrapper">
                                <img src="{{asset('img/line.jpg')}}" alt="line">
                            </div>
                            <div class="image-wrapper">
                                <img src="{{asset('img/telegram.png')}}" alt="telegram">
                            </div>
                            <div class="image-wrapper">
                                <img src="{{asset('img/aba_icon.png')}}" alt="aba">
                            </div>
                            <div class="image-wrapper">
                                <img src="{{asset('img/wing.png')}}" alt="wing">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12 col-md-4 text-center">
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
                </div>
                <div class="col-sm-6 col-xs-12 col-md-4 text-center">
                    <div class="payment-wrapper">
                        <div class="info-wrapper">
                            <div class="label">Payment :</div>
                            <div class="value">100% Payment in advance.</div>
                        </div>
                        <div class="info-wrapper">
                            <div class="label">Cancellation:</div>
                            <div class="value">The customer is liable to a Cancellation Charge equal to 100% of the total value of the order</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<div style="margin-bottom: 20px;"></div>
@endsection