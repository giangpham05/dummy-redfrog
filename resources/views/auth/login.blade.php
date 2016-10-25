<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Red Frog For Families</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="/src/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="/src/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="/src/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="/src/assets/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
<noscript>
    <META HTTP-EQUIV="Refresh" CONTENT="0;URL={{URL::route('no-script')}}">
    {{--{{ URL::route('no-script') }}--}}
</noscript>
<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);">Survey Management</a>
        <small>Red Frog For Families</small>
    </div>
    <div class="card">
        <div class="body">
            @if ($errors->has('email'))
                <div class="alert alert-danger">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
            @endif
            <form id="sign_in" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="msg">Log in to start your session</div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                    <div class="form-line">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8 p-t-5">
                        <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                        <label for="rememberme">Remember Me</label>
                    </div>
                    <div class="col-xs-4">
                        <button class="btn btn-block bg-pink waves-effect" type="submit">LOG IN</button>
                    </div>
                </div>
                <div class="row m-t-15 m-b--20">
                    {{--<div class="col-xs-6">--}}
                        {{--<a href="sign-up.html">Register Now!</a>--}}
                    {{--</div>--}}
                    <div class="col-xs-6 align-right">
                        <a href="{{ url('/password/reset') }}">Forgot Password?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="/src/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="/src/plugins/node-waves/waves.js"></script>

<!-- Validation Plugin Js -->
<script src="/src/plugins/jquery-validation/jquery.validate.js"></script>

<!-- Custom Js -->
<script src="/src/assets/js/admin.js"></script>
<script src="/src/assets/js/pages/examples/sign-in.js"></script>
</body>

</html>