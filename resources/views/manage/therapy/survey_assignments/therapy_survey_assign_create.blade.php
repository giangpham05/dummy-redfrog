@extends('manage.layouts.master')

@section('title')
    Admin | Survey Assignment
@stop

@section('css')
    <link href="{{ URL::asset('src/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet"
          type="text/css">

    <!-- Waves Effect Css -->
    <link href="{{ URL::asset('src/plugins/node-waves/waves.css') }}" rel="stylesheet" type="text/css">

    <!-- Animation Css -->
    <link href="{{ URL::asset('src/plugins/animate-css/animate.css') }}" rel="stylesheet" type="text/css">

    <!-- Preloader Css -->
    <link href="{{ URL::asset('src/plugins/material-design-preloader/md-preloader.css') }}"
          rel="stylesheet" type="text/css">

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="{{ URL::asset('src/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}"
          rel="stylesheet" type="text/css">

    <!-- Custom Css -->
    <link href="{{ URL::asset('src/assets/css/style.css')}}" rel="stylesheet" type="text/css">

    <link href="{{ URL::asset('src/assets/css/admin.main.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('src/assets/js/pages/survey-assignments/css/table-fixed-header.css')}}" rel="stylesheet" type="text/css">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ URL::asset('src/assets/css/themes/all-themes.css') }}" rel="stylesheet" type="text/css">
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
                                Create New
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false">
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
                        {{--@if(session()->has('status'))--}}
                        {{--<div class="alert alert-success">--}}
                        {{--<strong>{{session()->get('status')}} dumy text</strong>--}}
                        {{--</div>--}}
                        {{--@endif--}}
                        <div id="form-validate-error" class="alert bg-red" role="alert" style="display: none"><ul></ul></div>
                        {{--SURVEY ASSIGN CONTENT GOES HERE--}}
                        <div class="survey-assign-container">
                            <div class="select-clients">
                                <div class="modal fade" id="select-clients-dialog" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="border-radius: 10px;">
                                            <div class="modal-header" style="border-bottom: 1px solid #e5e5e5;">
                                                <h4 class="modal-title" id="defaultModalLabel">Client Selection</h4>
                                            </div>
                                            <div class="modal-body"
                                                 style="border-bottom: 1px solid #e5e5e5;">
                                                <div class="scroll">
                                                    <div style="padding-top: 0px; border: none;">
                                                        <input id="searchClient" type="text" class="" placeholder="Search by Client UUID"/>
                                                    </div>
                                                    <table class="table table-fixed-header" style="margin-bottom: 0px;" id="popupClientSelect">
                                                        <thead>
                                                        <tr>
                                                            <th style="border: none">
                                                                Clients
                                                            </th>

                                                        </tr>
                                                        </thead>
                                                        <tbody id="fClientBody">
                                                        @for($c = 0; $c< count($clients); $c++)
                                                            <tr>
                                                                <td>
                                                                    <input name="survey" type="radio" id="{{$clients[$c]->id}}" value="{{$clients[$c]->id}}" class="radio-col-red"
                                                                           style="z-index:-1000; position: relative;"/>
                                                                    <label for="{{$clients[$c]->id}}" style="position: relative">{{$clients[$c]->id}}</label>
                                                                    {{--<input type="checkbox" id="{{$clients[$c]->id}}"--}}
                                                                    {{--class="filled-in chk-col-green" style="z-index:-1000; position: relative;" />--}}
                                                                    {{--<label style="position: relative" for="{{$clients[$c]->id}}"></label>--}}
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                        </tbody>
                                                    </table>

                                                </div>
                                                <div style="padding-top:10px; color: red; display: none" id="noboxchecked">
                                                    <label class="error">No client is selected.</label>
                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="btnDialogSelection" class="btn btn-success waves-effect">SAVE
                                                </button>
                                                <button type="button" class="btn btn-success waves-effect"
                                                        data-dismiss="modal">CLOSE
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--@if($surveys->isEmpty())--}}
                                {{--<h1>There is no survey select. Click here to create one</h1>--}}
                            {{--@else--}}
                                <div class="select-surveys">
                                    {{-- MAIN FORM--}}
                                    <form id="form_validation" onsubmit="return validate_form();"
                                          action="" method="post">
                                        {{--{{ URL::route('users.survey-assignments.store',['user' => Auth::user()->getUsername]) }}--}}
                                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                        <div>
                                            <div class="row" id="clients-selected">
                                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-lg-2 col-md-2 col-sm-1 col-xs-3"><h5 style="padding-left: 10px">Client</h5></div>
                                                        <div class="col-lg-2 col-md-2 col-sm-1 col-xs-2">
                                                            <button type="button" class="btn btn-info btn-circle waves-effect waves-circle waves-light" id="btnClientSelected">
                                                                <i class="material-icons">touch_app</i>
                                                            </button>
                                                        </div>
                                                        <div class="col-lg-2 col-md-2 col-sm-1 col-xs-2">
                                                            <button type="button" class="btn bg-deep-orange btn-circle waves-effect waves-circle waves-light">
                                                                <i class="material-icons">add</i>
                                                            </button>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div id="clientFromDialog">
                                                                {{--<input name="radClientSelect" type="radio" id="radClientSelect" value="" class="radio-col-red"/>--}}
                                                                {{--<label for="radClientSelect" style="position: relative"></label>--}}
                                                                <p type="text" name="clientSelect" id="clientSelect"/>
                                                            </div>
                                                            <input type="hidden" name="clientSelectHidden" id="clientSelectHidden" class="form-control"/>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <table class="table table-responsive" id="surveySelect">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        Survey Name
                                                    </th>
                                                    <th>Due</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($surveys as $survey)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" id="survey{{$survey->id}}" name="surveyChecked[]" value="{{$survey->id}}"
                                                                   class="filled-in chk-col-green" />
                                                            <label for="survey{{$survey->id}}">{{$survey->strSurveyName}}</label>

                                                        </td>
                                                        <td>
                                                            <div class="form-line">
                                                                <input type="text" class="datepicker form-control" data-survey="{{$survey->strSurveyName}}"
                                                                       name="dueDate[]" placeholder="Please choose a date...">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-6 col-lg-2 col-md-2 col-sm-3">
                                                <button class="btn bg-red btn-block btn-lg waves-effect" type="reset" id="resetlAll">RESET</button>
                                            </div>
                                            <div class="col-xs-6 col-lg-2 col-md-2 col-sm-3">
                                                <button class="btn bg-red btn-block btn-lg waves-effect" id="btnAssign" type="submit">ASSIGN</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            {{--@endif--}}


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
    <script type="text/javascript"
            src="{{ URL::asset('src/plugins/bootstrap/js/bootstrap.js') }}"></script>
    {{--<script src="{{ URL::asset('src/assets/test.js')}}"></script>--}}
    <!-- Select Plugin Js -->
    <script type="text/javascript"
            src="{{ URL::asset('src/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script type="text/javascript"
            src="{{ URL::asset('src/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script type="text/javascript" src="{{ URL::asset('src/plugins/node-waves/waves.js') }}"></script>


    <!-- Autosize Plugin Js -->
    <script type="text/javascript" src="{{ URL::asset('src/plugins/autosize/autosize.js') }}"></script>
    <!-- Moment Plugin Js -->
    <script type="text/javascript" src="{{ URL::asset('src/plugins/momentjs/moment.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('src/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
    <!-- Custom Js -->
    <script type="text/javascript" src="{{ URL::asset('src/assets/js/admin.js') }}"></script>
    {{--<script type="text/javascript"--}}
    {{--src="{{ URL::asset('src/assets/plugins/jquery-scroll-follow/lib/jquery-ui.js') }}"></script>--}}
    {{--<script type="text/javascript"--}}
    {{--src="{{ URL::asset('src/assets/plugins/jquery-scroll-follow/lib/jquery.scrollfollow.js') }}"></script>--}}
    <script type="text/javascript" src="{{ URL::asset('src/assets/js/pages/survey-assignments/client-select-table.js') }}"></script>

    <!-- Validation -->
    {{--<script type="text/javascript" src="{{ URL::asset('src/assets/plugins/jquery-validation/jquery.validate.js') }}"></script>--}}
    <script type="text/javascript" src="{{ URL::asset('src/assets/js/pages/survey-assignments/form-validation.js') }}"></script>

    <script type="text/javascript">
        $('.datepicker').bootstrapMaterialDatePicker({
            format: 'YYYY/MM/DD',
            clearButton: true,
            weekStart: 1,
            time: false
        });
    </script>

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
