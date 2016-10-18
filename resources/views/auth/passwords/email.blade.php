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

<body class="fp-page">
<div class="fp-box">
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
            <form id="forgot_password" role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}
                {{--<div class="msg">--}}
                    {{--Enter your email address that you used to register. We'll send you an email with your username and a--}}
                    {{--link to reset your password.--}}
                {{--</div>--}}
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                    <div class="form-line">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                    </div>
                </div>
                <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SEND PASSWORD RESET LINK</button>

                <div class="row m-t-20 m-b--5 align-center">
                    <a href="{{ url('/login') }}">Log In!</a>
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
<script src="/src/assets/js/pages/examples/forgot-password.js"></script>
</body>

</html>