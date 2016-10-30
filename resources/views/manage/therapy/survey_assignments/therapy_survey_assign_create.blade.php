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
    <link href="{{URL::asset('src/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="{{ URL::asset('src/assets/css/style.css')}}" rel="stylesheet" type="text/css">

    <link href="{{ URL::asset('src/assets/css/pages/survey-assignments/survey_assign.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('src/assets/css/pages/survey-assignments/table-fixed-header.css')}}" rel="stylesheet" type="text/css">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ URL::asset('src/assets/css/themes/all-themes.css') }}" rel="stylesheet" type="text/css">
@stop


@section('main')
    <?php $username = Auth::user();?>
    <section class="content">
        <div class="container-fluid">
            @include('manage.includes.block-header', ['title' => 'Survey Assignment', 'icon'=>'assignment'])

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Assign surveys
                            </h2>
                        </div>

                        <div id="form-validate-error" class="alert bg-red" role="alert" style="display: none"><ul></ul></div>
                        {{--SURVEY ASSIGN CONTENT GOES HERE--}}
                        <div class="survey-assign-container">
                            @if($surveys->isEmpty())
                            <h1>There is no survey select. Click here to create one</h1>
                            @else

                            <div class="select-surveys">
                                <!-- Button trigger modal -->
                                <!-- Modal -->
                                <div class="modal fade" id="myModalForm" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <button type="button" class="close"
                                                        data-dismiss="modal">
                                                    <span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">
                                                    Add New Client
                                                </h4>
                                            </div>
                                            <form role="form" id="addNewClientForm" method="get">
                                                <!-- Modal Body -->
                                                <div class="modal-body">


                                                        <div class="form-group">
                                                            <label for="clientUuid">Client UUID</label>
                                                            <input type="text" class="form-control"
                                                                   id="clientUuid" name="clientUuid" placeholder="Please enter a valid uuid" required/>
                                                        </div>

                                                </div>

                                                <!-- Modal Footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="submit" id="btnAddClient" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(\Illuminate\Support\Facades\Session::has('status'))

                                    <div class="alert alert-info">
                                        <ul>
                                            @foreach (\Illuminate\Support\Facades\Session::get('status')->all() as $mess)
                                                <li>{{ $mess }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(\Illuminate\Support\Facades\Session::has('success'))
                                    <div class="alert alert-info">
                                        <div class="alert alert-success">
                                            <strong>Success!</strong> {{\Illuminate\Support\Facades\Session::get('success')}}
                                        </div>
                                    </div>
                                @endif
                                {{-- MAIN FORM--}}
                                <form id="form_validation"
                                      action="{{route('users.survey-assignments.store',['user'=>$username])}}" method="post">
                                    {{--{{ URL::route('users.survey-assignments.store',['user' => Auth::user()->getUsername]) }}--}}
                                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                    <div class="list_client_top row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" id="clients-selected">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-1 col-xs-3"><h5 style="padding-left: 10px">Client</h5></div>
                                                <select class="selectpicker" name="client_field" data-live-search="true" data-size="5"
                                                        data-width="30%" data-style="btn-primary btn-lg"  style="font-size: 28px;">
                                                    <option value="default">Please select a client</option>
                                                    @for($c = 0; $c< count($clients); $c++)
                                                        <option data-tokens="{{$clients[$c]->id}}" value="{{$clients[$c]->id}}">{{$clients[$c]->id}}</option>
                                                    @endfor

                                                </select>
                                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalForm">
                                                    Add New Client
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="list_of_surveys row">
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
                                                        <input type="checkbox" id="survey{{$survey->id}}" name="survey[]" value="{{$survey->id}}"
                                                               class="filled-in chk-col-green" />
                                                        <label for="survey{{$survey->id}}">{{$survey->strSurveyName}}</label>

                                                    </td>
                                                    <td>
                                                        <div class="form-line">
                                                            <input type="text" class="datepicker form-control" data-survey="{{$survey->strSurveyName}}"
                                                                   name="dueDateFor{{$survey->id}}" placeholder="Please choose a date...">
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
    <script type="text/javascript" src="{{URL::asset('src/plugins/jquery-validation/jquery.validate.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>


    <!-- Custom Js -->
    <script type="text/javascript" src="{{ URL::asset('src/assets/js/admin.js') }}"></script>
    {{--<script type="text/javascript"--}}
    {{--src="{{ URL::asset('src/assets/plugins/jquery-scroll-follow/lib/jquery-ui.js') }}"></script>--}}
    {{--<script type="text/javascript"--}}
    {{--src="{{ URL::asset('src/assets/plugins/jquery-scroll-follow/lib/jquery.scrollfollow.js') }}"></script>--}}
    <script type="text/javascript" src="{{ URL::asset('src/assets/js/pages/survey-assignments/client-select-table.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('src/assets/js/pages/survey-assignments/add_client.js') }}"></script>

    <!-- Validation -->
    {{--<script type="text/javascript" src="{{ URL::asset('src/assets/plugins/jquery-validation/jquery.validate.js') }}"></script>--}}
    <script type="text/javascript" src="{{ URL::asset('src/assets/js/pages/survey-assignments/form-validation.js') }}"></script>

    <script type="text/javascript">
        $('.datepicker').bootstrapMaterialDatePicker({
            format: 'YYYY/MM/DD',
            clearButton: true,
            weekStart: 1,
            time: false,
            minDate : new Date()
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
