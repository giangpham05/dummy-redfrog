<?php $username = Auth::user()->getUsername(); ?>
<div class="questions_row row">

    <div data-question-type="single-choice" class="question_container col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div id="question-field-temp" data-question-id="question-id" class="question_field">
            <div class="question_editing row">
                <div class="alert alert-danger" style="margin-top: 5px; display: none;">
                    Whoops. Something went wrong.
                </div>

                <form class="question_form_temp" tabindex="5"
                      action="{{route('users.surveys.sections.questions.store',['user'=>$username, 'survey'=>$survey,'section'=>$section])}}"
                      id="new_question_in_section_{{$section}}" method="post">
                    {{ csrf_field() }}
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="question-container">
                                <div class="col-lg-6 col-sm-12 col-xs-12" style="font-size: 24px">
                                    <select class="selectpicker" name="question_type">
                                        <option value="1"
                                                data-content="<span><i class='material-icons'>subject</i>Paragraph</span>"
                                                selected>Paragraph
                                        </option>
                                        <option value="2"
                                                data-content="<span><i class='material-icons'>short_text</i>Short answer</span>">
                                            Short answer
                                        </option>
                                        <option data-divider="true">divider</option>
                                        <option value="3"
                                                data-content="<span><i class='material-icons'>check_box</i>Checkboxes</span>">
                                            Checkboxes
                                        </option>
                                        <option value="4"
                                                data-content="<span><i class='material-icons'>radio_button_checked</i>Multiple choice</span>">
                                            Multiple choice
                                        </option>
                                        <option data-divider="true">divider</option>
                                        <option value="5"
                                                data-content="<span><i class='material-icons'>linear_scale</i>Linear scale</span>">
                                            Linear scale
                                        </option>

                                    </select>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-xs-12" style="margin-top: 15px;">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Question"
                                                   name="question" autofocus style="font-size: 20px;"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 qs_options">
                                    <div class="form-group">

                                        <div class="form-line" style="border-bottom-style: dotted;">

                                        <input type="text" placeholder="Long-answer text"
                                        disabled="true" aria-label="Long-answer text" style="border: none"/>
                                        </div>
                                        <div class="form-line" style="border-bottom-style: dotted;">

                                        <input type="text" disabled="true" aria-label="Long-answer text" style="border: none"/>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row more_options">

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="switch">
                                                <span style="font-weight: bold">Required</span>
                                                <label><input name="require_answer" type="checkbox"><span class="lever switch-col-red"></span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form_add_qs">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="float: right">
                                            <div class="col-xs-4" style="float: right">
                                                <Button class="btn btn-block bg-black waves-effect btn_cancel_question"
                                                        type="button">CANCEL
                                                </Button>
                                            </div>
                                            <div class="col-xs-4" style="float: right">
                                                <button class="btn btn-block bg-black waves-effect btn_save_question"
                                                        type="submit">SAVE
                                                </button>
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
