@extends('clients.surveys.layouts.template')
@section('title')
    Survey| {{$survey->strSurveyName}}
@stop
@section('css')
    <link href="{{ URL::asset('src/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" type="text/css">

    <!-- Waves Effect Css -->
    <link href="{{ URL::asset('src/plugins/node-waves/waves.css') }}" rel="stylesheet" type="text/css">

    <!-- Animation Css -->
    <link href="{{ URL::asset('src/plugins/animate-css/animate.css') }}" rel="stylesheet" type="text/css">

    <!-- Preloader Css -->
    <link href="{{ URL::asset('src/plugins/material-design-preloader/md-preloader.css') }}" rel="stylesheet" type="text/css">



    <!-- Custom Css -->
    <link href="{{ URL::asset('src/assets/css/pages/client_surveys/style.css')}}" rel="stylesheet" type="text/css">

    {{--<link href="{{ URL::asset('src/assets/css/survey-index.css')}}" rel="stylesheet" type="text/css">--}}

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ URL::asset('src/assets/css/themes/all-themes.css') }}" rel="stylesheet" type="text/css">

@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="header" style="padding: 15px">
                    <h2 style="display: inline-block; padding-right: 5px">
                       {{$survey->strSurveyName}}
                    </h2>
                    <p>
                        Please complete all the sections bellow. You can jump to any of these sections as you wish by using
                        the navigation on the left of the page.
                    </p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="sections_controller">
                    <div class="page_controller">
                        <div class="card section_page">
                            <div class="demo-button">
                                @foreach($survey->sections as $section)
                                    <a href="{{route('clients.surveys.section.show',['uuid'=>$uuid,'survey_id'=>$survey_id,'section_id'=>$section->id])}}"
                                       class="btn btn-block btn-lg btn-default waves-effect">
                                        {{$section->strSectionTitle==null ? 'Untitled Section': $section->strSectionTitle}}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@stop


@section('script')
    <!-- SCRIPTS -->

    <!-- Jquery Core Js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap Core Js -->
    <script type="text/javascript" src="{{ URL::asset('src/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Select Plugin Js -->
    <script type="text/javascript" src="{{ URL::asset('src/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script type="text/javascript" src="{{ URL::asset('src/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script type="text/javascript" src="{{ URL::asset('src/plugins/node-waves/waves.js') }}"></script>


    <!-- Custom Js -->
    <script type="text/javascript" src="{{ URL::asset('src/assets/js/admin.js') }}"></script>


    <!-- Demo Js -->
    <script type="text/javascript" src="{{ URL::asset('src/assets/js/demo.js') }}"></script>

@stop