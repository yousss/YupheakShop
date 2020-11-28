@extends('frontEnd.layouts.master')
@section('title','Home Page')
@section('content')
    <section>
        <div class="container">
            <div class="container_top">
                <img class="shop_next_image" src="{{url('products/medium/shop_next.PNG')}}" alt="kkk">
            </div>
            <h3 class="list_product">New Latest Product</h3>
            <div class="row  mb-4">
                <div class="col-lg-4 col-md-4 col-sm-4 ">
                    <div class="card " >
                        <div class="card-body">
                            <h4>LENOVO</h4>
                            <div class="image">
                                <img src="{{url('products/small/download.jpg')}}" alt="">
                            </div>
                            <h4>300%</h4>
                        </div>
                        <div class="card-footer">
                            <h5>ADD TO CARD</h5>
                        </div>
                    </div>
                </div>  
                <div class="col-lg-4 col-md-4 col-sm-4 ">
                    <div class="card" >
                        <div class="card-body">
                            <h4>LENOVO</h4>
                            <div class="image">
                                <img src="{{url('products/small/download.jpg')}}" alt="">
                            </div>
                            <h4>300%</h4>
                        </div>
                        <div class="card-footer">
                            <h5>ADD TO CARD</h5>
                        </div>
                    </div>
                </div>  
                <div class="col-lg-4 col-md-4 col-sm-4 ">
                    <div class="card" >
                        <div class="card-body">
                            <h4>LENOVO</h4>
                            <div class="image">
                                <img src="{{url('products/small/download.jpg')}}" alt="">
                            </div>
                            <h4>300%</h4>
                        </div>
                        <div class="card-footer">
                            <h5>ADD TO CARD</h5>
                        </div>
                    </div>
                </div>    
            </div>
            <div class="row  mb-4">
                <div class="col-lg-4 col-md-4 col-sm-4 ">
                    <div class="card " >
                        <div class="card-body">
                            <h4>LENOVO</h4>
                            <div class="image">
                                <img src="{{url('products/small/download.jpg')}}" alt="">
                            </div>
                            <h4>300%</h4>
                        </div>
                        <div class="card-footer">
                            <h5>ADD TO CARD</h5>
                        </div>
                    </div>
                </div>  
                <div class="col-lg-4 col-md-4 col-sm-4 ">
                    <div class="card" >
                        <div class="card-body">
                            <h4>LENOVO</h4>
                            <div class="image">
                                <img src="{{url('products/small/download.jpg')}}" alt="">
                            </div>
                            <h4>300%</h4>
                        </div>
                        <div class="card-footer">
                            <h5>ADD TO CARD</h5>
                        </div>
                    </div>
                </div>  
                <div class="col-lg-4 col-md-4 col-sm-4 ">
                    <div class="card" >
                        <div class="card-body">
                            <h4>LENOVO</h4>
                            <div class="image">
                                <img src="{{url('products/small/download.jpg')}}" alt="">
                            </div>
                            <h4>300%</h4>
                        </div>
                        <div class="card-footer">
                            <h5>ADD TO CARD</h5>
                        </div>
                    </div>
                </div>    
            </div>
            
        </div>
    </section>
@endsection
<style>
    .container_top{
        margin-top:-5%;
    }
    .shop_next_image{
        width:100%;
    }
    .list_product{
        margin-bottom:3%;
    }
    .card{
        box-shadow: 5%;
        border: 0.2px solid;
        margin-bottom: 10%;

    }
    .card-body{
        padding:5%;
        border-bottom: 0.2px solid;

    }
    
    .card-footer{
        text-align: center;
    }
    .image{
        margin-left:5%;
        width:40%;
        padding:2%;
    }
</style>