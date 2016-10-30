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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="sections_controller">
                    {{--@foreach($survey->sections as $mykey=> $section)--}}
                    {{----}}
                    {{--@endforeach--}}
                    <div class="page_controller" id="{{$section->id}}">
                        <div class="card section_page" id="{{$section->id}}">
                            <form role="form" method="post" action="{{route('client.surveys.store',['uuid'=>$uuid, 'survey_id'=>$survey_id])}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="referrerScript" value="{{$section->id}}">
                                <div style="position: relative">
                                    {{--@include('clients.surveys.includes.nav')--}}
                                </div>

                                <div class="section_body">
                                    <div class="survey_container">
                                        <div class="row survey_container_row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 survey_row_title_container"
                                                 data-survey-id="{{$survey->id}}">
                                                <div class="survey_title_wrapper row">
                                                    <h2>{{$survey->strSurveyName}}</h2>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 section_row_title_container"
                                                     data-survey-id="{{$section->id}}">
                                                    <div class="section_title_wrapper row">
                                                        @if($section->strSectionTitle !==null || $section->strSectionTitle !=='')

                                                            <h4>{{$section->strSectionTitle}}</h4>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 questions_container">

                                                    @if(count($section->questions))
                                                        @foreach($section->questions as $q_key=> $question)
                                                            @include('clients.surveys.includes.client_question_next', ['question' => $question,'question_number'=>$q_key+1])
                                                        @endforeach
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="buttons row">
                                    <button type="submit" class="btn btn-primary" style="vertical-align: middle; margin-bottom: 2px; display: inline-block">Save And Continue</button>
                                    <button type="submit" class="btn btn-primary" style="vertical-align: middle;margin-bottom: 2px;display: inline-block">Save And Exit</button>
                                </div>

                            </form>


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