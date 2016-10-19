@extends('manage.layouts.master')

@section('title')
    Survey Responses
@stop

@section('css')
    <link href="{{ URL::asset('src/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" type="text/css">

    <!-- Waves Effect Css -->
    <link href="{{ URL::asset('src/plugins/node-waves/waves.css') }}" rel="stylesheet" type="text/css">

    <!-- Animation Css -->
    <link href="{{ URL::asset('src/plugins/animate-css/animate.css') }}" rel="stylesheet" type="text/css">

    <!-- Preloader Css -->
    <link href="{{ URL::asset('src/plugins/material-design-preloader/md-preloader.css') }}" rel="stylesheet"
          type="text/css">

    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">--}}
    <link href="{{URL::asset('src/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="{{ URL::asset('src/assets/css/style.css')}}" rel="stylesheet" type="text/css">

    <link href="{{ URL::asset('src/assets/css/admin.main.css')}}" rel="stylesheet" type="text/css">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ URL::asset('src/assets/css/themes/all-themes.css') }}" rel="stylesheet" type="text/css">
@stop


@section('header_script')
    {{--<!-- Jquery Core Js -->--}}
    {{--<script type="text/javascript" src="{{ URL::asset('src/admin-assets/plugins/jquery/jquery.min.js') }}"></script>--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    {{--<script language="JavaScript">--}}
    {{--window.onbeforeunload = confirmExit;--}}
    {{--function confirmExit()--}}
    {{--{--}}
    {{--return "You have attempted to leave this page.  If you have made any changes to the fields without clicking the Save button, your changes will be lost.  Are you sure you want to exit this page?";--}}
    {{--}--}}
    {{--</script>--}}
@stop
@section('allSurveyCss')
    <!-- JQuery DataTable Css -->

    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css" rel="stylesheet" type="text/css">--}}
    {{--<link href="https://cdn.datatables.net/1.10.12/css/dataTables.material.min.css" rel="stylesheet" type="text/css">--}}
@stop

@section('main')
    <?php $username = Auth::user()->getUsername();?>
    <section class="content">
        <div class="container-fluid">
            {{-- @include('manage.includes.block-header', ['title' => 'Surveys', 'icon'=>'view_list'])--}}

            <div class="row clearfix" style="margin-top: -30px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header" style="padding: 10px">
                            <h2 style="display: inline-block; padding-right: 5px">
                                SURVEY RESPONSES
                            </h2>

                        </div>

                        <div class="row clearfix">
                            <P>DETAILS ABOUT ALL SURVEY RESPONSES GO HERE!!</P>
                        </div>



                    </div>

                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>

    </section>

@endsection

@section('script')
    <!-- SCRIPTS -->

    <!-- Bootstrap Core Js -->
    <script type="text/javascript" src="{{ URL::asset('src/plugins/bootstrap/js/bootstrap.js') }}"></script>
    {{--<script src="{{ URL::asset('src/test.js')}}"></script>--}}
    <!-- Select Plugin Js -->
    <script type="text/javascript"
            src="{{ URL::asset('src/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script type="text/javascript"
            src="{{ URL::asset('src/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script type="text/javascript" src="{{ URL::asset('src/plugins/node-waves/waves.js') }}"></script>

    <!-- Slip -->
    <script type="text/javascript" src="{{ URL::asset('src/plugins/Slip/slip.js') }}"></script>

    <!-- Custom Js -->
    <script type="text/javascript" src="{{ URL::asset('src/assets/js/admin.js') }}"></script>


    <!-- Demo Js -->



    <script type="text/javascript" src="{{ URL::asset('src/assets/js/demo.js') }}"></script>
@stop

