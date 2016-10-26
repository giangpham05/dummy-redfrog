@extends('manage.layouts.master')

@section('title')
    Creating survey: {{$survey->strSurveyName}}
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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">--}}
    <link href="{{URL::asset('src/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="{{ URL::asset('src/assets/css/style.css')}}" rel="stylesheet" type="text/css">

    <link href="{{ URL::asset('src/assets/css/manage-survey.css')}}" rel="stylesheet" type="text/css">

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

@stop

@section('main')
    <?php $username = Auth::user()->getUsername();?>
    <section class="content">
        <div class="container-fluid">
             @include('manage.includes.block-header', ['title' => 'Create survey', 'icon'=>'view_list'])
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="sections_controller">
                    @foreach($survey->sections as $key=>$section)
                        <div class="page_controller" id="{{$section->id}}">
                            <div class="card section_page" id="{{$section->id}}">
                                <div class="header" style="padding: 15px">
                                    <h2 style="display: inline-block; padding-right: 5px">
                                        SECTION {{$key + 1}} OUT OF {{count($survey->sections)}}
                                    </h2>
                                    <ul class="header-dropdown m-r--5">
                                        <li class="dropdown">
                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons">more_vert</i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:void(0);">
                                                        <i class="material-icons">format_color_text</i>Rename
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       data-route="{{route('users.surveys.sections.destroy',['user'=>$username,'survey'=>$survey->id,'section'=>$section->id])}}">
                                                        <i class="material-icons">delete</i>Remove</a>
                                                </li>

                                                <li>
                                                    <a href="javascript:void(0);">
                                                        <i class="material-icons">remove_red_eye</i>Preview</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                                <div class="section_body">
                                    <div class="survey_container" id="survey_container">
                                        <div class="row survey_container_row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 survey_row_title_container" data-survey-id="{{$survey->id}}"
                                                 data-route="{{route('users.surveys.show',['user' =>$username, 'survey'=>md5($survey->id)])}}">
                                                <div class="survey_title_wrapper row" tabindex="-2">
                                                    <h4>{{$survey->strSurveyName}}</h4>
                                                </div>


                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 section_row_title_container" data-survey-id="{{$section->id}}">
                                                <div class="section_title_wrapper row" tabindex="-2">
                                                    @if($section->strSectionTitle ===null || $section->strSectionTitle ==='')

                                                        <h4>Add Section Title</h4>
                                                    @else
                                                        <h4>{{$section->strSectionTitle}}</h4>
                                                    @endif
                                                </div>


                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 questions_container" id="questions-container">

                                            @if(count($section->questions))
                                                @foreach($section->questions as $q_key=> $question)
                                                    @include('manage.ui_render.question_show', ['question' => $question,'question_number'=>$q_key+1])
                                                @endforeach
                                            @endif
                                            <!------------------------- NEW QUESTION GOES HERE -------------------------->
                                                <!-- --------------------------------------------------------------------- -->

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn-add-new-qs" tabindex="-5">

                                                    <div class="row" style="text-align: center; width:50%;margin:0 auto;padding: 10px 0px;">
                                                        <button type="button" id="btn_{{$section->id}}_create_question_" data-section-id="{{$section->id}}"
                                                                class="btn btn-block btn-lg bg-red waves-effect waves-light create_question" data-url="{{route('users.surveys.sections.questions.create',['user'=>$username, 'survey'=>md5($survey->id),'section'=>$section->id])}}">+ Add a new
                                                            question
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>




                                        <?php $username = Auth::user()->getUsername()?>
                                            <form class="survey_edit_actions form-horizontal" action="{{route('users.surveys.update',['user' =>$username, 'survey'=>md5($survey->id)])}}"
                                                  method="put" style="position: absolute;top:0; width: 100%" id="form_section{{$section->id}}">
                                                {{--{{ csrf_field() }}--}}
                                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                                                <div class="row clearfix row_edit">
                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                        <label for="survey-name">Survey name</label>
                                                    </div>
                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                        <div class="form-group">
                                                            <div class="form-line" style="font-size: 28px">
                                                                <input type="text" class="form-control survey-name" placeholder="Survey name" name="survey-name"
                                                                       value="{{$survey->strSurveyName}}" style="font-size: 24px;font-weight: bold">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row clearfix row_edit">
                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                        <label for="survey-description">Description(optional)</label>
                                                    </div>
                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                    <textarea name="survey-description" rows="4" class="form-control survey-description no-resize"
                                                              placeholder="Survey description">{{$survey->strSurveyDesc!=='Not provided' ? $survey->strSurveyDesc : "Survey description"}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 buttons" style="margin-top: 10px;margin-bottom: 10px;">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                            <div class="col-xs-5">
                                                                <button class="btn btn-block bg-black waves-effect btn_save" type="submit">SAVE</button>
                                                            </div>
                                                            <div class="col-xs-5">
                                                                <button class="btn btn-block bg-black waves-effect btn_cancel" type="button">CANCEL</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div tabindex="6" class="row addNewSection_row" style="margin-top: 10px;margin-bottom: 10px;">
                                <div class="addNewSection col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top: 12px; padding-bottom: 12px">
                                    <a class="new_section" href="javascript:void(0);">
                                        <i class="material-icons" style="vertical-align: middle">insert_drive_file</i>
                                        <span style="vertical-align: middle">Add New Section</span>
                                    </a>

                                </div>
                            </div>

                        </div>
                    @endforeach


                </div>
            </div>
            <script type="text/javascript">
                var token = '{{Session::token()}}';

                var url_question_option = '{{route('getQuestionOption')}}';

                var url_section = '{{route('users.surveys.sections.store',['user' =>$username, 'survey'=>md5($survey->id)])}}';
            </script>
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
    <script type="text/javascript" src="{{URL::asset('src/plugins/jquery-validation/jquery.validate.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>

    <!-- Slip -->
    <script type="text/javascript" src="{{ URL::asset('src/plugins/Slip/slip.js') }}"></script>

    <!-- Toast -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <!-- Custom Js -->
    <script type="text/javascript" src="{{ URL::asset('src/assets/js/admin.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>

    {{--<script id="survey_question" type="text/x-jsrender">--}}
        {{--<div class="question-canvas">--}}
            {{--<h1>Name : [%:count%]</h1>--}}


    {{--</script>--}}

    <script type="text/javascript">
        $(document).ready(function () {
            $('.surveys-homescreen-list-item-surveyname').find('.icon-empty').click(function () {
                $(this).toggleClass('special');
//                alert('something wrong here');
            });

        });
    </script>

    <!-- Demo Js -->

    <script type="text/javascript" src="{{ URL::asset('src/assets/js/demo.js') }}"></script>
    <script id="customScript" type="text/javascript" src="{{ URL::asset('src/assets/js/pages/survey_crud/survey_create.js') }}?v=<?php echo date("YmdHis"); ?>"></script>
    <script id="customScript1" type="text/javascript" src="{{ URL::asset('src/assets/js/pages/survey_crud/survey_edit.js') }}?v=<?php echo date("YmdHis"); ?>"></script>
@stop

