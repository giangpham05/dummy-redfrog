@extends('clients.surveys.layouts.master')
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
    <link href="{{ URL::asset('src/plugins/material-design-preloader/md-preloader.css') }}" rel="stylesheet"
          type="text/css">

    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">--}}
    <link href="{{URL::asset('src/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet"/>
    <!-- Custom Css -->
    <link href="{{ URL::asset('src/assets/css/style.css')}}" rel="stylesheet" type="text/css">



    <link href="{{ URL::asset('src/assets/css/pages/client_surveys/client_survey.show.css')}}" rel="stylesheet"
          type="text/css">

@stop

@section('content')
    <?php $username = Auth::user()->getUsername();?>
    <section class="content">
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="sections_controller">
                    @foreach($survey->sections as $mykey=> $section)
                        <div class="page_controller" id="{{$section->id}}">
                            <div class="card section_page" id="{{$section->id}}">
                                <div class="section_body">
                                    <div class="survey_container">
                                        <div class="row survey_container_row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 survey_row_title_container"
                                                 data-survey-id="{{$survey->id}}">
                                                <div class="survey_title_wrapper row">
                                                    <h4>{{$survey->strSurveyName}}</h4>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 section_row_title_container"
                                                     data-survey-id="{{$section->id}}">
                                                    <div class="section_title_wrapper row">
                                                        @if($section->strSectionTitle ===null || $section->strSectionTitle ==='')

                                                            <h4>Add Section Title</h4>
                                                        @else
                                                            <h4>{{$section->strSectionTitle}}</h4>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 questions_container">

                                                    @if(count($section->questions))
                                                        @foreach($section->questions as $q_key=> $question)
                                                            @include('clients.surveys.includes.client_question_show', ['question' => $question,'question_number'=>$q_key+1])
                                                        @endforeach
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>

@stop


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
    <script type="text/javascript" src="{{URL::asset('src/plugins/jquery-validation/jquery.validate.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>

    <!-- Slip -->
    <script type="text/javascript" src="{{ URL::asset('src/plugins/Slip/slip.js') }}"></script>

    <!-- Toast -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <!-- Custom Js -->
    <script type="text/javascript" src="{{ URL::asset('src/assets/js/admin.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>


    <script type="text/javascript" src="{{ URL::asset('src/assets/js/demo.js') }}"></script>


@stop