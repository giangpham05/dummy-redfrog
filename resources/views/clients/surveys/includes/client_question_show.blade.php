<?php $username = Auth::user()->getUsername();?>
<div class="questions_row">
    {{--<div class="handle instant">&#9776;</div>--}}
    <div data-question-type="single-choice" class="question_container col-lg-12 col-md-12 col-sm-12 col-xs-12" id="field{{$question->id}}" data-field="{{$question->id}}">
        <div id="question-field-{{$question->id}}" data-question-id="{{$question->id}}" class="question_open question_field">
            <fieldset class="field_edit" style="margin-top: 2px">
                <h4 id="question-title-{{$question->id}}">
                    {{isset($question_number)?$question_number:'not'}}. {{$question->strQuestionTitle}}
                @if($question->required ==1)
                    <span style="color: red">*</span>
                    @endif
                </h4>
                <div class="question_body">
                    <?php $type = $question->question_types_id;?>
                    @if($type==1)
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="" rows="4" PLACEHOLDER="Your answer" class="form-control no-resize"></textarea>
                                </div>
                            </div>
                    @elseif($type==2)
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" type="text" PLACEHOLDER="Your answer" aria-label="Short-answer text"/>
                            </div>
                        </div>
                    @elseif($type==3)
                        @foreach($question->options as $option)
                            <div class="input-group">
                                <input type="checkbox" id="option{{$option->id}}" class="filled-in chk-col-red"/>
                                <label for="option{{$option->id}}">{{$option->questionOption}}</label>

                            </div>
                        @endforeach
                    @elseif($type==4)
                        @foreach($question->options as $option)
                                <div class="input-group">
                                    <input type="radio" name="questionOption{{$question->id}}" id="option{{$option->id}}" class="radio-col-red"/>
                                    <label for="option{{$option->id}}">{{$option->questionOption}}</label>

                                </div>

                                {{--<div class="input-group">--}}
                                {{--<span class="input-group-addon">--}}
                                    {{--<i class="material-icons">radio_button_unchecked</i>--}}
                                {{--</span>--}}
                                {{--<p class="option_show_text" style="margin: 5px">{{$option->questionOption}}dsdssd</p>--}}
                        @endforeach
                    @else
                    @endif

                </div>
            </fieldset>

        </div>
    </div>

</div>

