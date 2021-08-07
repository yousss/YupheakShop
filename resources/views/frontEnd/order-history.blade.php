@extends('frontEnd.layouts.master')
@section('title','ordered history')
@section('content')
<section class="cart_items" style="margin-top: 20px;">

    <div class="container">
        <div class="history-wrapper">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description text-center">Description</td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($cart_datas) === 0)
                        <tr>
                            <td colspan="6" class="text-center">Your cart is empty</td>
                        </tr>
                        @endif
                        @foreach($cart_datas as $cart_data)
                        <tr>
                            <td class="cart_product">
                                <a class="thumbnail" href="{{ route('productDetail',['id' =>$cart_data->products_id ]) }}">
                                    <img src="" class="img-fluid" alt="">
                                </a>
                            </td>
                            <td class="text-center cart_description">
                                <div class="name">{{$cart_data->product_name}}</div>
                                <div class="code">{{$cart_data->product_code}} | {{$cart_data->size}}</div>
                            </td>
                            <td class="cart_price text-right">
                                <div class="price"> ${{$cart_data->price}}</div>
                            </td>
                            <td class="cart_quantity text-right">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href="{{url('/cart/update-quantity/'.$cart_data->id.'/1')}}"><i class="fa fa-plus" aria-hidden="true"></i> </a>
                                    <input class="cart_quantity_input form-control" type="text" name="quantity" value="{{$cart_data->quantity}}" autocomplete="off" size="2">
                                    @if($cart_data->quantity>1)
                                    <a class="cart_quantity_down" href="{{url('/cart/update-quantity/'.$cart_data->id.'/-1')}}"> <i class="fa fa-minus" aria-hidden="true"></i></a>
                                    @endif
                                </div>
                            </td>
                            <td class="cart_total text-right">
                                <p class="cart_total_price">$ {{$cart_data->price*$cart_data->quantity}}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{url('/cart/deleteItem',$cart_data->id)}}"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection