<header id="header">
    <!--header-->
    <div class="header_top">
        <!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-xl-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="logo pull-left">
                        <a href="{{url('/')}}"><img id="image" style="width:200px; margin-top:3px" src="{{asset('frontEnd/images/home/logo_shopNex.png')}}" alt="" /></a>
                    </div>

                </div>
                <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9 col-xs-12">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-phone"></i> +855 87 961 669</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> iss.solu@gmail.com</a></li>
                            <!-- <li><a href="{{url('/viewcart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li> -->
                            @if(Auth::check())
                            <li><a href="{{url('/myaccount')}}"><i class="fa fa-user"></i> My Account</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-lock"></i> Logout </a>
                            </li>
                            @else
                            <li><a href="{{url('/login_page')}}"><i class="fa fa-lock"></i> Login</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header_top-->

    <div class="header-middle">
        <!--header-middle-->
        <div class="container">
            <div class="row header-bottom">
                <div class="col-sm-7">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <!-- <li><a href="{{url('/homepage')}}">Home</a></li> -->
                            <li>
                                <a class="{{ Request::is('list-products') ? 'active' : null }}" href="{{url('/list-products')}}">Products</a>
                            </li>
                            <li>
                                <a class="{{ Request::is('viewcart') ? 'active' : null }}" href="{{url('/viewcart')}}">Cart</a>
                            </li>

                            <li>
                                <a class="{{ Request::is('contact-us') ? 'active' : null }}" href="{{url('/contact-us')}}">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="search_box pull-right">
                        <input type="text" class="form-control" placeholder="Product Name " id="search" name="search">
                        <i class="bi bi-search"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--/header-->