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
                                        <div class="survey-assignments-header row">
                                            <div class="survey-assignments-cell surveys-homescreen-cell-surveyname col-lg-2 col-md-5 col-sm-5 col-xs-10">
                                                <p class="overflow-cell">Client</p>
                                            </div>
                                            <div class="survey-assignments-cell surveys-homescreen-cell-created-at col-lg-2 col-md-3 col-sm-3 hidden-xs">
                                                <p class="overflow-cell">Survey Name</p>
                                            </div>
                                            {{--<div class="survey-assignments-cell surveys-homescreen-cell-updated-at col-lg-2 col-md-3 col-sm-3 hidden-xs">--}}
                                            {{--<p class="overflow-cell">Assigned At</p>--}}
                                            {{--</div>--}}
                                            <div class="survey-assignments-cell surveys-homescreen-cell-updated-at col-lg-2 col-md-3 col-sm-3 hidden-xs">
                                                <p class="overflow-cell">Due</p>
                                            </div>
                                            {{--<div class="survey-assignments-cell surveys-homescreen-cell-updated-at col-lg-2 col-md-3 col-sm-3 hidden-xs">--}}
                                            {{--<p class="overflow-cell">Date Deactivated</p>--}}
                                            {{--</div>--}}
                                            <div class="survey-assignments-cell surveys-homescreen-cell-updated-at col-lg-1 col-md-3 col-sm-3 hidden-xs">
                                                <p class="overflow-cell">Assign Status</p>
                                            </div>
                                            <div class="survey-assignments-cell surveys-homescreen-cell-updated-at col-lg-1 col-md-3 col-sm-3 hidden-xs">
                                                <p class="overflow-cell">Active Status</p>
                                            </div>
                                        </div>
                                        <div class="survey-assignment-item-section row">

                                            <div class="surveys-assignments-homescreen-list-item col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                @foreach($survey_assignments as $survey_assignment)
                                                    <div class="row">
                                                        <div class="surveys-homescreen-list-item-cell surveys-homescreen-list-item-surveyname col-lg-4 col-md-4 col-sm-5 col-xs-10"
                                                             style="display: inline-flex;" aria-label="Client">
                                                            <div class="icon-empty special visible-xs-inline"></div>
                                                            <i class="material-icons" style="display: inline-block">assignment</i>
                                                            <span class="surveys-homescreen-list-item-survey-value"
                                                                  style="display: inline-block; margin-top: 2px;">
                                                    {{$survey_assignment->uuid}}
                                                            </span>
                                                        </div>
                                                        <div class="surveys-homescreen-list-item-cell surveys-homescreen-list-item-created-at col-lg-2 col-md-3 col-sm-3 col-xs-12 hidden-xs"
                                                             aria-label="Survey name">
                                                            {{\App\Models\Survey::find($survey_assignment->survey_id)->strSurveyName}}
                                                        </div>
                                                        {{--<div class="surveys-homescreen-list-item-cell surveys-homescreen-list-item-updated-at col-lg-3 col-md-3 col-sm-3 col-xs-12 hidden-xs" aria-label="Assigned at">--}}
                                                        {{--{{$surveyAssignment->assign_timestamp}}--}}
                                                        {{--</div>--}}
                                                        <div class="surveys-homescreen-list-item-cell surveys-homescreen-list-item-updated-at col-lg-2 col-md-3 col-sm-3 col-xs-12 hidden-xs"
                                                             aria-label="Due">
                                                            {{$survey_assignment->due_timestamp}}
                                                        </div>
                                                        {{--<div class="surveys-homescreen-list-item-cell surveys-homescreen-list-item-updated-at col-lg-3 col-md-3 col-sm-3 col-xs-12 hidden-xs" aria-label="Date deactivated">--}}
                                                        {{--{{$surveyAssignment->date_deactivated}}--}}
                                                        {{--</div>--}}
                                                        <div class="surveys-homescreen-list-item-cell surveys-homescreen-list-item-updated-at col-lg-1 col-md-3 col-sm-3 col-xs-12 hidden-xs"
                                                             aria-label="Assign status">
                                                            {{$survey_assignment->assign_status}}
                                                        </div>
                                                        <div class="surveys-homescreen-list-item-cell surveys-homescreen-list-item-updated-at col-lg-1 col-md-3 col-sm-3 col-xs-12 hidden-xs"
                                                             aria-label="Active">
                                                            <?php $active = $survey_assignment->active_flag;?>
                                                            @if((int)$active == 0)
                                                                Inactive
                                                            @else
                                                                Active
                                                            @endif
                                                        </div>
                                                        <div class="surveys-homescreen-list-item-cell surveys-homescreen-list-item-popup col-lg-2 col-md-1 col-sm-1 col-xs-2"
                                                             role="button" aria-haspopup="true"
                                                             aria-label="More actions. Popup button."
                                                             aria-expanded="false">
                                                            <ul class="header-dropdown m-r--5"
                                                                style="list-style-type: none; margin-bottom: 0px;">
                                                                <li class="dropdown">
                                                                    <a href="javascript:void(0);"
                                                                       class="dropdown-toggle" data-toggle="dropdown"
                                                                       role="button" aria-haspopup="true"
                                                                       aria-expanded="false">
                                                                        <i class="material-icons">more_vert</i>
                                                                    </a>
                                                                    <ul class="dropdown-menu pull-right">
                                                                        <li><a href="javascript:void(0);">Action</a>
                                                                        </li>
                                                                        <li><a href="javascript:void(0);">Another
                                                                                action</a></li>
                                                                        <li><a href="javascript:void(0);">Something else
                                                                                here</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>



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
