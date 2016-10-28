<?php $username = Auth::user()->getUsername();
    $type = $question->question_types_id;
?>
<div class="question_editing row">
    <div class="alert alert-danger" style="margin-top: 5px; display: none;">
        Whoops.Something went wrong.
    </div>
    <form class="question_form" method="put"
          action="{{route('users.surveys.sections.questions.update',['user'=>$username, 'survey'=>$survey,'section'=>$section,'question'=>$question])}}">
        {{ csrf_field() }}
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="question-container">
                    <div class="col-lg-6 col-sm-12 col-xs-12" style="font-size: 24px">
                        <select class="selectpicker" name="question_type">
                            <option value="1" data-content="<span><i class='material-icons'>subject</i>Paragraph</span>" {{$type==1 ? 'selected':''}}>Paragraph</option>
                            <option value="2" data-content="<span><i class='material-icons'>short_text</i>Short answer</span>" {{$type==2 ? 'selected':''}}>Short answer</option>
                            <option data-divider="true">divider</option>
                            <option value="3" data-content="<span><i class='material-icons'>check_box</i>Checkboxes</span>" {{$type==3 ? 'selected':''}}>Checkboxes</option>
                            <option value="4" data-content="<span><i class='material-icons'>radio_button_checked</i>Multiple choice</span>" {{$type==4 ? 'selected':''}}>Multiple choice</option>
                            <option data-divider="true">divider</option>
                            <option value="5" data-content="<span><i class='material-icons'>linear_scale</i>Linear scale</span>" {{$type==5 ? 'selected':''}}>Linear scale</option>

                        </select>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-xs-12" style="margin-top: 15px;">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" name="question" placeholder="Question" required autofocus style="font-size: 20px;"
                                       value="{{$question->strQuestionTitle}}"/>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 qs_options">
                        @include('manage.ui_render.question_type_render',['question'=>$question,'type'=>$type])

                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row more_options">
                            {{--<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 headerDivider">--}}
                                {{--<span><i class="material-icons">content_copy</i></span>--}}
                                {{--<span><i class="material-icons">delete</i></span>--}}
                            {{--</div>--}}
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="switch">
                                    <span style="font-weight: bold">Required</span>
                                    <label><input type="checkbox" name="require_answer" {{$question->required==1 ? 'checked': ''}}><span class="lever switch-col-red"></span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="float: right">
                                <div class="col-xs-4" style="float: right">
                                    <Button class="btn btn-block bg-black waves-effect btn_cancel_question_edit" type="button">CANCEL</Button>
                                </div>
                                <div class="col-xs-4" style="float: right">
                                    <button class="btn btn-block bg-black waves-effect btn_save_question_edit" type="submit">SAVE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </form>
</div>


