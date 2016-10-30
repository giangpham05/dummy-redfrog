@extends('manage.layouts.master')

@section('title')
    Admin | Survey Assignment
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

    <link href="{{ URL::asset('src/assets/css/admin.main.css')}}" rel="stylesheet" type="text/css">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ URL::asset('src/assets/css/themes/all-themes.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ URL::asset('src/assets/css/survey-index.css')}}" rel="stylesheet" type="text/css">
@stop

@section('allSurveyCss')
    <!-- JQuery DataTable Css -->

    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css" rel="stylesheet" type="text/css">--}}
    {{--<link href="https://cdn.datatables.net/1.10.12/css/dataTables.material.min.css" rel="stylesheet" type="text/css">--}}
@stop

@section('main')
    <section class="content">
        <div class="container-fluid">
            @include('manage.includes.block-header', ['title' => 'Survey Assignment', 'icon'=>'assignment'])
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Current Survey Assignments
                            </h2>
                        </div>


                        <div class="survey-assign-container">
                            {{--{{var_dump($survey_assignment->isEmpty())}}--}}

                            @if(count($survey_assignments)<1)
                                <div>
                                    <h2 style="text-align: center">
                                        No assignments yet
                                    </h2>
                                    <p style="text-align: center">
                                        <a href="{{ URL::route('users.survey-assignments.create',['user' => Auth::user()->getUsername()]) }}">Click here to create a new one.</a>
                                    </p>
                                </div>
                            @else
                                <div class="surveys-homescreen-itemholder-content">
                                    {{-- Survey shows for today --}}
                                    <div class="survey-assignments-container">
                                        <div class="survey-header row">
                                            <div class="surveys-homescreen-cell surveys-homescreen-cell-surveyname col-lg-3 col-md-3 col-sm-3 col-xs-10">
                                                Client
                                            </div>
                                            <div class="surveys-homescreen-cell surveys-homescreen-cell-surveyname col-lg-3 col-md-3 col-sm-3 col-xs-10">
                                                Survey
                                            </div>
                                            <div class="surveys-homescreen-cell surveys-homescreen-cell-created-at col-lg-2 col-md-2 col-sm-2 hidden-xs">
                                                Status
                                            </div>
                                            <div class="surveys-homescreen-cell surveys-homescreen-cell-created-at col-lg-3 col-md-3 col-sm-3 hidden-xs">
                                                Due
                                            </div>
                                            <div class="surveys-homescreen-cell surveys-homescreen-cell-buttons col-lg-1 col-md-1 col-sm-1 col-xs-2"
                                                 style="text-align: right;cursor: pointer;">
                                                <ul class="header-dropdown m-r--5">
                                                    <li class="dropdown">
                                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                                           role="button" aria-haspopup="true" aria-expanded="false">
                                                            <i class="material-icons">sort_by_alpha</i>
                                                        </a>
                                                        <ul class="dropdown-menu pull-right">
                                                            <li><a href="javascript:void(0);">By Client</a></li>
                                                            <li><a href="javascript:void(0);">By Survey</a></li>
                                                            <li><a href="javascript:void(0);">By Due Date</a></li>
                                                            <li><a href="javascript:void(0);">Active</a></li>
                                                            <li><a href="javascript:void(0);">Assign Status</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                {{--<i class="material-icons" style="vertical-align: middle; display: inline-block;">sort_by_alpha</i>--}}
                                            </div>
                                        </div>
                                        <div class="surveys-container row">
                                            @foreach($survey_assignments as $key=>$survey_assignment)
                                                @foreach($survey_assignment as $m=>$item)
                                                <div class="surveys-homescreen-list-item col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="row">
                                                        <div class="survey-cell survey-cell-surveyname col-lg-3 col-md-3 col-sm-3 col-xs-10" style="display: inline-flex;">
                                                            <div class="icon-empty special visible-xs-inline"></div>
                                                            <span style="display: inline-block; margin-right: 10px;">
                                                                <i class="material-icons surveys-homescreen-list-item-icon">view_list</i>
                                                            </span>
                                                            <span class="surveys-homescreen-list-item-survey-value" style="display: inline-block; margin-top: 2px;">
                                                                {{$key}}
                                                            </span>
                                                        </div>
                                                        <div class="survey-cell survey-cell-created-at col-lg-3 col-md-3 col-sm-3 hidden-xs" aria-label="Survey">
                                                            {{\App\Models\Survey::find($item['survey_id'])->strSurveyName}}
                                                        </div>
                                                        <div class="survey-cell survey-cell-created-at col-lg-2 col-md-2 col-sm-2 hidden-xs" aria-label="Status">
                                                            {{$item['assign_status']}}
                                                        </div>
                                                        <div class="survey-cell survey-cell-updated-at col-lg-3 col-md-3 col-sm-3 hidden-xs" aria-label="Due">
                                                            {{$item['due_timestamp']}}
                                                        </div>
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
                                                                            <a href="{{route('start',['uuid'=>$key, 'survey_id'=>md5($item['survey_id'])])}}" target="_blank">
                                                                                <i class="material-icons">insert_link</i>Link
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="javascript:void(0);" data-route="">
                                                                                <i class="material-icons">delete</i>Remove</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="" title="Preview" target="_blank">
                                                                                <i class="material-icons">remove_red_eye</i>Preview</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                    @endforeach
                                            @endforeach


                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>

    </section>
    {{--<script src="{{ URL::asset('src/admin-assets/plugins/jquery/jquery.min.js')}}"></script>--}}
    <!-- Jquery DataTable Plugin Js -->

@endsection

@section('script')
    <!-- SCRIPTS -->

    {{--<!-- Jquery Core Js -->--}}
    {{--<script type="text/javascript" src="{{ URL::asset('src/assets/plugins/jquery/jquery.min.js') }}"></script>--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap Core Js -->
    <script type="text/javascript" src="{{ URL::asset('src/plugins/bootstrap/js/bootstrap.js') }}"></script>
    {{--<script src="{{ URL::asset('src/admin-assets/test.js')}}"></script>--}}
    <!-- Select Plugin Js -->
    <script type="text/javascript" src="{{ URL::asset('src/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script type="text/javascript" src="{{ URL::asset('src/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script type="text/javascript" src="{{ URL::asset('src/plugins/node-waves/waves.js') }}"></script>


    <!-- Jquery DataTable Plugin Js -->
    {{--<script src="{{ URL::asset('src/admin-assets/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>--}}
    {{--<script src="{{ URL::asset('src/admin-assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.min.js')}}"></script>--}}
    {{--<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>--}}
    {{--<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.0/js/responsive.bootstrap.min.js"></script>--}}

    <!-- Custom Js -->
    <script type="text/javascript" src="{{ URL::asset('src/assets/js/admin.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.surveys-homescreen-list-item-surveyname').find('.icon-empty').click( function(){
                $(this).toggleClass('special');
//                alert('something wrong here');
            });

        } );
    </script>


    {{--<script type="text/javascript" src="{{ URL::asset('src/admin-assets/js/pages/index.js') }}"></script>--}}

    <!-- Demo Js -->
    <script type="text/javascript" src="{{ URL::asset('src/assets/js/demo.js') }}"></script>

@stop

@section('allSurveyScript')



    {{--<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.material.min.js"></script>--}}
    {{--<script src="{{ URL::asset('src/admin-assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>--}}
    {{--<script src="{{ URL::asset('src/admin-assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>--}}
    {{--<script src="{{ URL::asset('src/admin-assets/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>--}}
    {{--<script src="{{ URL::asset('src/admin-assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>--}}
    {{--<script src="{{ URL::asset('src/admin-assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>--}}
    {{--<script src="{{ URL::asset('src/admin-assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>--}}
    {{--<script src="{{ URL::asset('src/admin-assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>--}}

@stop
