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
    <?php $username = Auth::user()->getUsername();?>
    <section class="content">
        <div class="container-fluid">
            @include('manage.includes.block-header', ['title' => 'Surveys', 'icon'=>'view_list'])
            <div class="row clearfix" style="margin-top: 50px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        @if(Auth::user()->isAdmin())
                            <div class="header row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <h2 style="display: inline-block; padding-right: 5px">
                                        ALL SURVEYS
                                    </h2>
                                    <a href="{{URL::route('users.surveys.create',['user'=>$username])}}" class="btn bg-red waves-effect waves-light">+ Create survey</a>
                                </div>

                                {{--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">--}}
                                   {{----}}
                                {{--</div>--}}
                                {{--<div class="col-lg-4 col-md-4 col-sm-8 col-xs-8" style="display:inline-block">--}}
                                    {{--<button type="button" class="btn bg-deep-orange btn-circle waves-effect waves-circle waves-light">--}}
                                        {{--<i class="material-icons">add</i>Create survey--}}
                                    {{--</button>--}}

                                {{--</div>--}}
                            </div>
                        @else
                            {{-- Need to have something to do with survey selection created by admins --}}
                            <div class="header">
                                <h2>
                                    ALL SURVEYS
                                </h2>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="javascript:void(0);">Action</a></li>
                                            <li><a href="javascript:void(0);">Another action</a></li>
                                            <li><a href="javascript:void(0);">Something else here</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        @endif
                        {{-- For loop to get surveys go here --}}

                        <div class="surveys-homescreen-itemholder-content">
                            {{-- Survey shows for today --}}
                            <div class="surveys-homescreen-itemholder-container surveys-homescreen-list-container-vertical">
                                <div class="surveys-homescreen-list-header row">
                                    <div class="surveys-homescreen-cell surveys-homescreen-cell-surveyname col-lg-5 col-md-5 col-sm-5 col-xs-10">
                                        Survey By Title
                                    </div>
                                    <div class="surveys-homescreen-cell surveys-homescreen-cell-created-at col-lg-3 col-md-3 col-sm-3 hidden-xs">
                                        Created At
                                    </div>
                                    <div class="surveys-homescreen-cell surveys-homescreen-cell-updated-at col-lg-3 col-md-3 col-sm-3 hidden-xs">
                                        Updated At
                                    </div>
                                    <div class="surveys-homescreen-cell surveys-homescreen-cell-buttons col-lg-1 col-md-1 col-sm-1 col-xs-2" style="text-align: right;">
                                        <i class="material-icons" style="vertical-align: middle; display: inline-block;">sort_by_alpha</i>
                                    </div>
                                </div>
                                <div class="surveys-homescreen-item-section row">
                                    @foreach($surveys as $survey)
                                        <div class="surveys-homescreen-list-item col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="row">
                                                <div class="surveys-homescreen-list-item-cell surveys-homescreen-list-item-surveyname col-lg-5 col-md-5 col-sm-5 col-xs-10" style="display: inline-flex;">
                                                    <div class="icon-empty special visible-xs-inline"></div>
                                                    <i class="material-icons" style="display: inline-block">view_list</i>
                                                    <span class="surveys-homescreen-list-item-survey-value" style="display: inline-block; margin-top: 2px;">
                                                    {{$survey->strSurveyName}}
                                                </span>
                                                </div>
                                                <div class="surveys-homescreen-list-item-cell surveys-homescreen-list-item-created-at col-lg-3 col-md-3 col-sm-3 col-xs-12 hidden-xs" aria-label="Created at">{{$survey->created_at}}</div>
                                                <div class="surveys-homescreen-list-item-cell surveys-homescreen-list-item-updated-at col-lg-3 col-md-3 col-sm-3 col-xs-12 hidden-xs" aria-label="Updated at">{{$survey->updated_at}}</div>
                                                <div class="surveys-homescreen-list-item-cell surveys-homescreen-list-item-popup col-lg-1 col-md-1 col-sm-1 col-xs-2"
                                                     role="button" aria-haspopup="true"
                                                     aria-label="More actions. Popup button." aria-expanded="false" style="padding-right: 0px">
                                                    <ul class="header-dropdown m-r--5" style="float: right;">
                                                        <li class="dropdown">
                                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                                <i class="material-icons">more_vert</i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li><a href="javascript:void(0);">Action</a></li>
                                                                <li><a href="javascript:void(0);">Another action</a></li>
                                                                <li><a href="javascript:void(0);">Something else here</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach


                                </div>
                            </div>
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
