<?php $username = Auth::user()->getUsername();?>
<div class="questions_row row">
    <div data-question-type="single-choice" class="question_container col-lg-12 col-md-12 col-sm-12 col-xs-12" tabindex="10">
        <div id="question-field-{{$question->id}}" data-question-id="question{{$question->id}}">
            <fieldset>
                <h4 id="question-title-{{$question->id}}">{{isset($question_number)?$question_number:'not'}}. {{$question->strQuestionTitle}}</h4>
                <div class="question_body">
                    <?php $type = $question->question_types_id;?>
                    @if($type==1)
                        <div class="form-group">

                            <div class="form-line" style="border-bottom-style: dotted;">

                                <input type="text" class="" placeholder="Long-answer text"
                                       disabled="true" aria-label="Long-answer text" style="border: none"/>
                            </div>
                            <div class="form-line" style="border-bottom-style: dotted;">

                                <input type="text" class="" disabled="true" aria-label="Short-answer text"
                                       style="border: none"/>
                            </div>

                        </div>
                    @elseif($type==2)
                        <div class="form-group">

                            <div class="form-line" style="border-bottom-style: dotted;">

                                <input type="text" class="" placeholder="Long-answer text"
                                       disabled="true" aria-label="Short-answer text" style="border: none"/>
                            </div>
                        </div>
                    @elseif($type==3)
                        @foreach($question->options as $option)
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">check_box_outline_blank</i>
                                </span>
                                <p class="option_show_text" style="margin: 5px">{{$option->questionOption}}</p>
                            </div>
                        @endforeach
                    @elseif($type==4)
                        @foreach($question->options as $option)
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">radio_button_unchecked</i>
                                </span>
                                <p class="option_show_text" style="margin: 5px">{{$option->questionOption}}</p>
                            </div>
                        @endforeach
                    @else
                    @endif

                </div>
            </fieldset>
        </div>
    </div>

</div>

