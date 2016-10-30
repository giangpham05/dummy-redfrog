@extends('manage.layouts.master')

@section('title')
    All surveys
@stop

@section('css')
    <link href="{{ URL::asset('src/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" type="text/css">

    <!-- Waves Effect Css -->
    <link href="{{ URL::asset('src/plugins/node-waves/waves.css') }}" rel="stylesheet" type="text/css">

    <!-- Animation Css -->
    <link href="{{ URL::asset('src/plugins/animate-css/animate.css') }}" rel="stylesheet" type="text/css">

    <!-- Preloader Css -->
    <link href="{{ URL::asset('src/plugins/material-design-preloader/md-preloader.css') }}" rel="stylesheet" type="text/css">

    {{--<link href="{{ URL::asset('src/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css">--}}
    {{--<link href="{{ URL::asset('src/admin-assets/css/responsive.bootstrap.css')}}" rel="stylesheet" type="text/css">--}}

    {{--<link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">--}}
    {{--<link href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css">--}}
    {{--@yield('allSurveyCss')--}}
    {{--<!-- Morris Chart Css-->--}}
    {{--<link href="{{ URL::asset('src/admin-assets/plugins/morrisjs/morris.css')}}" rel="stylesheet" />--}}

    <!-- Custom Css -->
    <link href="{{ URL::asset('src/assets/css/style.css')}}" rel="stylesheet" type="text/css">

    <link href="{{ URL::asset('src/assets/css/survey-index.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom Js -->
    <script type="text/javascript" src="{{ URL::asset('src/assets/js/admin.js') }}"></script>
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ URL::asset('src/assets/css/themes/all-themes.css') }}" rel="stylesheet" type="text/css">
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
            @include('manage.includes.block-header', ['title' => 'Surveys', 'icon'=>'view_list'])
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row" style="margin-left: 0px; margin-right: 0px">
                                    <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">
                                        <h2 style="display: inline-block; padding-right: 5px">
                                            ALL SURVEYS
                                        </h2>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                                        <a href="{{URL::route('users.surveys.create',['user'=>$username])}}"
                                           class="btn btn-block btn-lg bg-red waves-effect waves-light">+ Create survey</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- For loop to get surveys go here --}}

                        <div class="survey_controller_index">
                            {{-- Survey shows for today --}}
                            <div class="">
                                @if(sizeof($surveys)>0)
                                    <div class="survey-header row">
                                        <div class="surveys-homescreen-cell surveys-homescreen-cell-surveyname col-lg-5 col-md-5 col-sm-5 col-xs-10">
                                            Survey By Title
                                        </div>
                                        <div class="surveys-homescreen-cell surveys-homescreen-cell-created-at col-lg-3 col-md-3 col-sm-3 hidden-xs">
                                            Created At
                                        </div>
                                        <div class="surveys-homescreen-cell surveys-homescreen-cell-updated-at col-lg-3 col-md-3 col-sm-3 hidden-xs">
                                            Updated At
                                        </div>
                                        <div class="surveys-homescreen-cell surveys-homescreen-cell-buttons col-lg-1 col-md-1 col-sm-1 col-xs-2"
                                             style="text-align: right;cursor: pointer;">
                                            <i class="material-icons" style="vertical-align: middle; display: inline-block;">sort_by_alpha</i>
                                        </div>
                                    </div>

                                    <div class="surveys-container row">
                                        @foreach($surveys as $survey)
                                            <div class="surveys-homescreen-list-item col-lg-12 col-md-12 col-sm-12 col-xs-12" data-survey-id="{{$survey->id}}">
                                                <div class="row">
                                                    <div class="survey-cell survey-cell-surveyname col-lg-5 col-md-5 col-sm-5 col-xs-10" style="display: inline-flex;">
                                                        <div class="icon-empty special visible-xs-inline"></div>
                                                        <span style="display: inline-block; margin-right: 10px;">
                                                        <i class="material-icons surveys-homescreen-list-item-icon">view_list</i>
                                                    </span>
                                                        <span class="surveys-homescreen-list-item-survey-value" style="display: inline-block; margin-top: 2px;">
                                                    <a style="color: black" href="{{route('users.surveys.edit', ['user'=> Auth::user()->getUsername(), 'survey' => md5($survey->id)])}}">
                                                        {{$survey->strSurveyName}}
                                                    </a>
                                                     </span>
                                                    </div>
                                                    <div class="survey-cell survey-cell-created-at col-lg-3 col-md-3 col-sm-3 col-xs-12 hidden-xs" aria-label="Created at">{{$survey->created_at}}</div>
                                                    <div class="survey-cell survey-cell-updated-at col-lg-3 col-md-3 col-sm-3 col-xs-12 hidden-xs" aria-label="Updated at">{{$survey->updated_at}}</div>
                                                    <div class="survey-cell survey-cell-popup col-lg-1 col-md-1 col-sm-1 col-xs-2"
                                                         role="button" aria-haspopup="true"
                                                         aria-label="More actions. Popup button." aria-expanded="false" style="padding-right: 0px">
                                                        <ul class="header-dropdown m-r--5" style="float: right;">
                                                            <li class="dropdown">
                                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="material-icons">more_vert</i>
                                                                </a>
                                                                <ul class="dropdown-menu pull-right">
                                                                    <li>
                                                                        <a href="javascript:void(0);" data-route="{{route('users.surveys.edit',['user'=>$username,'survey'=>$survey->id])}}">
                                                                            <i class="material-icons">format_color_text</i>Rename
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);" data-route="{{route('users.surveys.destroy',['user'=>$username,'survey'=>$survey->id])}}">
                                                                            <i class="material-icons">delete</i>Remove</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{route('users.surveys.preview',['user'=>$username, 'survey'=>md5($survey->id)])}}" title="Preview" target="_blank">
                                                                            <i class="material-icons">remove_red_eye</i>Preview</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                @endif

                            </div>
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

    {{--<!-- Jquery Core Js -->--}}
    {{--<script type="text/javascript" src="{{ URL::asset('src/admin-assets/plugins/jquery/jquery.min.js') }}"></script>--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap Core Js -->
    <script type="text/javascript" src="{{ URL::asset('src/plugins/bootstrap/js/bootstrap.js') }}"></script>
    {{--<script src="{{ URL::asset('src/test.js')}}"></script>--}}
    <!-- Select Plugin Js -->
    <script type="text/javascript" src="{{ URL::asset('src/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script type="text/javascript" src="{{ URL::asset('src/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script type="text/javascript" src="{{ URL::asset('src/plugins/node-waves/waves.js') }}"></script>


    <!-- Custom Js -->
    <script type="text/javascript" src="{{ URL::asset('src/assets/js/admin.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.survey-cell-surveyname').find('.icon-empty').click( function(){
                $(this).toggleClass('special');
            });



        } );
    </script>


    {{--<script type="text/javascript" src="{{ URL::asset('src/admin-assets/js/pages/index.js') }}"></script>--}}

    <!-- Demo Js -->
    <script type="text/javascript" src="{{ URL::asset('src/assets/js/demo.js') }}"></script>

@stop

