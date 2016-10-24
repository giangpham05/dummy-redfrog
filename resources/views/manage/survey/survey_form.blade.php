@extends('manage.layouts.master')

@section('title')
    Survey name
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
    <script type="text/javascript">
        function load_js() {
            //var body= document.getElementsByName("body")[0];
            var ele = document.getElementById("customScript");
            if(ele!==null && ele!=="undefined")
            {
                document.body.removeChild(ele);
                console.info("---------- Script refreshed ----------");

                var script= document.createElement("script");
                script.id = "customScript";
                script.type= "text/javascript";
                script.src= "{{ URL::asset('src/assets/js/survey_create.js') }}?v1="+ new Date().getTime();
                document.body.appendChild(script);

            }


        }
        //load_js();
    </script>

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

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header" style="padding: 10px">
                            <h2 style="display: inline-block; padding-right: 5px">
                                CREATE SURVEY
                            </h2>
                            {{--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">--}}
                            {{----}}
                            {{--</div>--}}
                            {{--<div class="col-lg-4 col-md-4 col-sm-8 col-xs-8" style="display:inline-block">--}}
                            {{--<button type="button" class="btn bg-deep-orange btn-circle waves-effect waves-circle waves-light">--}}
                            {{--<i class="material-icons">add</i>Create survey--}}
                            {{--</button>--}}

                            {{--</div>--}}

                        </div>

                        <?php $username = Auth::user()->getUsername();?>
                        <div class="body">
                            @if ($errors->has('survey_name'))
                                <div class="alert alert-danger" id="survey_name_error">
                                    <strong>{{ $errors->first('survey_name') }}</strong>
                                </div>
                            @endif
                                @if ($errors->has('survey_description'))
                                    <div class="alert alert-danger" id="survey_description_error">
                                        <strong>{{ $errors->first('survey_description') }}</strong>
                                    </div>
                                @endif
                            <form class="form-horizontal" action="{{route('users.surveys.store', ['user'=>$username])}}" method="post">
                                {{ csrf_field() }}
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="survey_name">Survey name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="survey_name" name="survey_name" class="form-control" placeholder="Enter a survey name" required autofocu>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="survey_description">Description(optional)</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        {{--<div class="form-group">--}}
                                            {{--<div class="form-line">--}}
                                                {{--<textarea rows="4" cols="50" name="survey_description" class="form-control no-resize" placeholder="Survey description">--}}

                                                {{--</textarea>--}}
                                                {{--<input type="text" id="survey_description" name="survey_description" class="form-control" placeholder="Enter a survey description" autofocu>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea name="survey_description" rows="4" class="form-control no-resize" placeholder="Survey description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">CREATE</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                        {{-- CREATATION OF SURVEY GOES HERE --}}

                    </div>
                </div>
                {{--<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12" style="margin-left: 0px;padding-left: 0px">--}}
                {{--<div class="col_sidebar" style="position: relative">--}}
                {{--<div id="sidebar">--}}
                {{--<button type="button" id="create_question"--}}
                {{--class="btn btn-block btn-lg bg-red waves-effect waves-light">+ Add a new--}}
                {{--question--}}
                {{--</button>--}}

                {{--<button type="button" id="create_question" class="btn btn-default btn-circle waves-effect waves-circle waves-flat">--}}
                {{--<i class="material-icons">add_circle</i>--}}
                {{--</button>--}}

                {{--<button type="button" class="btn btn-default btn-circle waves-effect waves-circle waves-flat">--}}
                {{--<i class="material-icons">view_stream</i>--}}
                {{--</button>--}}

                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
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


    <!-- Custom Js -->
    <script type="text/javascript" src="{{ URL::asset('src/assets/js/admin.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>

    {{--<script id="survey_question" type="text/x-jsrender">--}}
    {{--<div class="question-canvas">--}}
    {{--<h1>Name : [%:count%]</h1>--}}


    <script type="text/javascript" src="{{ URL::asset('src/assets/js/demo.js') }}"></script>
    <script id="customScript" type="text/javascript" src="{{ URL::asset('src/assets/js/survey_create.js') }}?v=<?php echo date("YmdHis"); ?>"></script>
@stop

