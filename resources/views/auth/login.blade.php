<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/matrix-login.css')}}" />
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>

<body>
    <div class="container">
        <form id="loginform" class="form-vertical" method="POST" action="{{ route('login') }}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <h3>
                        <img src="{{asset('frontEnd/images/home/logo_shopNex_admin.png')}}" alt="Logo" style="width:100%" />
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" style="color: red;">
                        <p>{{ $errors->first('email') }}</p>
                    </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="input-group">
                        <span class="input-group-addon bg_lg"><i class="icon-user"> </i></span>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="input-group">
                        <span class="input-group-addon bg_ly"><i class="icon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password" required>
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="input-group-btn">
                        <span class="pull-left">
                            <a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a>
                        </span>
                        <span class="pull-right">
                            <button type="submit" class="btn btn-success">Login</button>
                        </span>
                    </div>
                </div>
            </div>
        </form>
        <form id="recoverform" action="#" class="form-vertical">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="input-group">
                        <span class="input-group-addon bg_lo">
                            <i class="icon-envelope"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="E-mail address" />
                        <span class="input-group-btn">
                            <button class="btn btn-default" id="to-login" type="submit">Send</button>
                        </span>
                    </div>
                </div>
            </div>

        </form>
    </div>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/matrix.login.js')}}"></script>
</body>

</html>