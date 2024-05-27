<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schooler Forgot Password</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('images/images/LOGOSC.png')}}"/>
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <br /><br />
                <img src="{{ asset('assets/images/logo/logo_schooler.png') }}" class="user-image img-responsive" />
                <h5>Lupa password? Kalem banh<br>Reset password aja yuk</h5>
                <br />
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="text-center fw-bold" style="color:#000;">Forgot Password</h2>
                    </div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form role="form" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-lg btn-black-default-hover" name="login">Email Password Reset Link</button>
                                <br>
                                <a href="{{ route('login') }}">Back to Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/jquery-1.10.2.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>
