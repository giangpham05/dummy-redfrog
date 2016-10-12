<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title')</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('src/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" type="text/css">

    <!-- Material Design Bootstrap -->
    {{--<link href="{{URL::to('src/mdb/css/mdb.min.css')}}" rel="stylesheet">--}}

    <!-- Your custom styles (optional) -->
    <link href="{{URL::to('src/css/main.css')}}" rel="stylesheet">

</head>

<body>


<!-- Start your project here-->

@include('surveys.includes.header')
<!-- #END# Search Bar -->

    <div class="container" style="padding-top: 70px;">
        @yield('content')
    </div>


<!-- /Start your project here-->


<!-- SCRIPTS -->

<!-- JQuery -->
<script type="text/javascript" src="{{ URL::asset('src/plugins/jquery/jquery.js') }}"></script>

{{--<!-- Bootstrap tooltips -->--}}
{{--<script type="text/javascript" src="{{URL::to('src/mdb/js/tether.min.js')}}"></script>--}}

{{--<!-- Bootstrap core JavaScript -->--}}
{{--<script type="text/javascript" src="{{URL::to('src/mdb/js/bootstrap.min.js')}}"></script>--}}

{{--<!-- MDB core JavaScript -->--}}
{{--<script type="text/javascript" src="{{URL::to('src/mdb/js/mdb.min.js')}}"></script>--}}


</body>

</html>
