<?php $username = Auth::user()->getUsername();?>
<div class="questions_row row">

    <div data-question-type="single-choice" class="question_container col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div id="question-field-idnumber" data-question-id="question-id">
            <div class="question_editing row">
                <div class="alert alert-danger" style="margin-top: 5px; display: none;">
                    <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
                </div>
                <form class="" action="{{route('users.surveys.sections.questions.edit',['user'=>$username, 'survey'=>$survey,'section'=>$section,'question'=>$question])}}">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 demo-no-swipe">
                        <div class="handle instant">&#9776;</div>
                        <div class="row">
                            <div class="question-container">
                                <div class="col-lg-6 col-sm-12 col-xs-12" style="font-size: 24px">
                                    <select class="selectpicker" id="">
                                        <option value="paragraph" data-content="<span><i class='material-icons'>subject</i>Paragraph</span>">Paragraph</option>
                                        <option value="short_answer" data-content="<span><i class='material-icons'>short_text</i>Short answer</span>">Short answer</option>
                                        <option data-divider="true">divider</option>
                                        <option value="check_boxes" data-content="<span><i class='material-icons'>check_box</i>Checkboxes</span>">Checkboxes</option>
                                        <option value="multiple" data-content="<span><i class='material-icons'>radio_button_checked</i>Multiple choice</span>">Multiple choice</option>
                                        <option data-divider="true">divider</option>
                                        <option value="linear_scale" data-content="<span><i class='material-icons'>linear_scale</i>Linear scale</span>">Linear scale</option>

                                    </select>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-xs-12" style="margin-top: 15px;">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="" type="text" class="form-control" placeholder="Question" required autofocus style="font-size: 20px;" value="{{$question->strQuestionTitle}}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 qs_options">
                                    @include('manage.ui_render.question_type_render',['question'=>$question])

                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row more_options">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 headerDivider">
                                            <span><i class="material-icons">content_copy</i></span>
                                            <span><i class="material-icons">delete</i></span>
                                        </div>
                                        <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6">
                                            <div class="switch">
                                                <span style="font-weight: bold">Required</span>
                                                <label><input type="checkbox"><span class="lever switch-col-red"></span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="float: right">
                                            <div class="col-xs-4" style="float: right">
                                                <Button class="btn btn-block bg-black waves-effect btn_cancel_question" type="submit">CANCEL</Button>
                                            </div>
                                            <div class="col-xs-4" style="float: right">
                                                <button class="btn btn-block bg-black waves-effect btn_save_question" type="submit">SAVE</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>

</div>
