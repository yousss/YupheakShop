@extends('frontEnd.layouts.master')
@section('title','Cart Page')
@section('slider')
@endsection
@section('content')
    <section id="cart_items">
        <div class="container">
            @if(Session::has('message'))
                <div class="alert alert-success text-center" role="alert">
                    {{Session::get('message')}}
                </div>
            @endif
            <div class="section text-center">
                <h3>Customer Order Summary</h3>
            </div>
            <br>
            <div class="container">
                <table id="cart" class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th style="width:50%">Product</th>
                            <th style="width:10%">Price</th>
                            <th style="width:8%">Quantity</th>
                            <th style="width:22%" class="text-center">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
                                    <div class="col-sm-10">
                                        <h4 class="nomargin">Product 1</h4>
                                        <p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">$1.99</td>
                            <td data-th="Quantity">
                                <input type="number" class="form-control text-center" value="1">
                            </td>
                            <td data-th="Subtotal" class="text-center">1.99</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td ></td>
                            <td colspan="2">Order Subtotal:</td>
                            <td class="hidden-xs text-center"><strong>$1.99</strong></td>
                        </tr>
                        <tr>
                            <td class="border-none"></td>
                            <td colspan="2" >Fee:</td>
                            <td class="hidden-xs text-center"><strong>$-</strong></td>
                        </tr>
                        <tr>
                            <td  class="border-none"></td>
                            <td colspan="2">Order Total:</td>
                            <td class="hidden-xs text-center"><strong>$1.99</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->
    <br>
    <div class="container">
        <div class="section">
            <h3 class="text-center">Contact and Payment Method</h3>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <table width="100%">
                    <thead>
                        <tr>
                            <th>Email :</th>
                            <td>sale@ypsolutionkh.com</td>
                        </tr>
                        <tr>
                            <th>Phone :</th>
                            <td>087 961 669 <br>089 961 669
                            </td>
                            <td><img src="{{asset('img/line.jpg')}}" alt="line" style="width:70px;"></td>
                            <td><img src="{{asset('img/telegram.png')}}" alt="telegram" style="width:70px;"></td>
                            <td><img src="{{asset('img/aba_icon.png')}}" alt="aba" style="width:70px;"></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <img src="{{asset('img/paypal.png')}}" alt="paypal" style="width:70px;">
                            </td>
                            <td>
                                <img src="{{asset('img/wing.png')}}" alt="wing" style="width:70px;">
                            </td>
                        </tr>
                        <br>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4"></div>
        </div>
        
    </div>
    <br>
    <div class="container mb-5">
        <div class="section">
            <h3 class="text-center bg-light">Term and Condition</h3>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <table width="100%">
                    <thead class="text-left">
                        <tr>
                            <th >Payment :</th>
                            <td>100% Payment in advance.</td>
                        </tr>
                        <tr >
                            <th >Cancellation:</th>
                            <td> The customer is liable to a Cancellation Charge equal to 100% of the total value of the order.</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        
    </div>

    <br><br>
@endsection