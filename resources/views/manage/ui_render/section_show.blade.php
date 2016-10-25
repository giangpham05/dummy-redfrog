<?php $username = Auth::user()->getUsername()?>
<div class="page_controller" id="{{$section->id}}">
    <div class="card section_page" id="{{$section->id}}">
        <div class="header" style="padding: 15px">
            <h2 style="display: inline-block; padding-right: 5px">
                SECTION  OUT OF {{count($survey->sections)}}
            </h2>

        </div>

        <div class="section_body" id="">
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
