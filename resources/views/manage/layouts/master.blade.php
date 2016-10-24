<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <title>@yield('title')</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    @yield('header_script')
    @yield('css')

</head>

<body class="{{ $theme = session()->has('theme') ? session()->get('theme') : 'theme-red'}}">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="md-preloader pl-size-md">
            <svg viewbox="0 0 75 75">
                <circle cx="37.5" cy="37.5" r="33.5" class="pl-red" stroke-width="4" />
            </svg>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->

<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
{{--<div class="search-bar">--}}
    {{--<div class="search-icon">--}}
        {{--<i class="material-icons">search</i>--}}
    {{--</div>--}}
    {{--<input type="text" placeholder="START TYPING...">--}}
    {{--<div class="close-search">--}}
        {{--<i class="material-icons">close</i>--}}
    {{--</div>--}}
{{--</div>--}}
<!-- #END# Search Bar -->


@include('manage.includes.header')
@include('manage.includes.left-side')
<!-- #END# Search Bar -->
@yield('main')

@yield('script')

{{--<!-- Jquery CountTo Plugin Js -->--}}
{{--<script src="{{ URL::asset('src/admin-assets/plugins/jquery-countto/jquery.countTo.js')}}"></script>--}}

{{--<!-- Morris Plugin Js -->--}}
{{--<script src="{{ URL::asset('src/admin-assets/plugins/raphael/raphael.min.js')}}"></script>--}}
{{--<script src="{{ URL::asset('src/admin-assets/plugins/morrisjs/morris.js')}}"></script>--}}

{{--<!-- ChartJs -->--}}
{{--<script src="{{ URL::asset('src/admin-assets/plugins/chartjs/Chart.bundle.js')}}"></script>--}}

{{--<!-- Flot Charts Plugin Js -->--}}
{{--<script src="{{ URL::asset('src/admin-assets/plugins/flot-charts/jquery.flot.js')}}"></script>--}}
{{--<script src="{{ URL::asset('src/admin-assets/plugins/flot-charts/jquery.flot.resize.js')}}"></script>--}}
{{--<script src="{{ URL::asset('src/admin-assets/plugins/flot-charts/jquery.flot.pie.js')}}"></script>--}}
{{--<script src="{{ URL::asset('src/admin-assets/plugins/flot-charts/jquery.flot.categories.js')}}"></script>--}}
{{--<script src="{{ URL::asset('src/admin-assets/plugins/flot-charts/jquery.flot.time.js')}}"></script>--}}

{{--<!-- Sparkline Chart Plugin Js -->--}}
{{--<script src="{{ URL::asset('src/admin-assets/plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>--}}

<!-- Custom Js -->

{{--<script src="{{ URL::asset('src/admin-assets/test.js')}}"></script>--}}

<script type="text/javascript">
    var token = '{{Session::token()}}';
    var url_theme = '{{route('updateTheme')}}';
</script>

</body>

</html>
