@extends('frontEnd.layouts.master')
@section('content')
    <section>
        <div class="container">
            <h3 class="list_product container_top">About Us</h3>
            <p> Let us change your demand and experiece of business and integrated system solutions.</p>
            <div class="row  mb-4">
                <div class="col-lg-12 col-md-12 col-sm-12 ">
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 ">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                                        <h2>Who We Are</h2>
                                       <p>
                                           We are providing intergrate system solutions with authize Product Reseller, Solutions and Consulting
                                       </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 ">
                                        <div class="image">
                                            <img src="{{url('products/small/cammar_scu1.PNG')}}" alt="">    
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 ">
                                        <div class="image">
                                            <img src="{{url('products/small/cammar_scu2.PNG')}}" alt="">    
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 ">
                                <div class="image">
                                    <img src="{{url('products/medium/product.PNG')}}" alt="">    
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>   
            </div>
            <div class="row  mb-4">
                <div class="col-lg-12 col-md-12 col-sm-12 ">
                  <div class="card">
                    <h2>Contact Us</h2>
                    <p>
                        Our Office: St. 69, Songkat Phsar Daeum Thkov, Khan Chamka Mon, Phnom Phenh, 
                        Cambodia.
                    </p> 
                    <p>Phone: +855 89/87 961 669</p> 
                    <p>Email: iss.solu@gamil.com</p>
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
    p{
        font-size:17px;
    }
    .shop_next_image{
        width:100%;
    }
    .list_product{
        margin-bottom:1%;
    }
    .card{
        padding:2%;
        box-shadow: 5%;
        border: 0.2px solid;
        margin-bottom: 3%;

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