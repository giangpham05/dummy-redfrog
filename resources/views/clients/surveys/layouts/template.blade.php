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


    @yield('css')

    @yield('header_script')

    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>

<body class="theme-red">


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

<div class="overlay"></div>

@include('clients.surveys.includes.header')
@include('clients.surveys.includes.left-side')

@yield('content')


@yield('script')

</body>

</html>
