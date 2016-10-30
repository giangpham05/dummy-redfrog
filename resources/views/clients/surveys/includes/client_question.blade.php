<?php $isFound = \App\Models\ClientAnswer::where('question_id',$question->id)->first();?>
@if($isFound === null)
<div class="questions_row">
    <div data-question-type="single-choice" class="question_container col-lg-12 col-md-12 col-sm-12 col-xs-12" id="field{{$question->id}}" data-field="{{$question->id}}">
        <div id="question-field-{{$question->id}}" data-question-id="{{$question->id}}" class="question_open question_field">
            <fieldset class="field_edit" style="margin-top: 2px">
                <h4 id="question-title-{{$question->id}}">
                    {{isset($question_number)?$question_number:''}}. {{$question->strQuestionTitle}}
                    @if($question->required ==1)
                    <span style="color: red">*</span>
                    @endif
                </h4>
                <div class="question_body">
                    <?php $type = $question->question_types_id;?>
                    @if($type==1)
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="{{$question->id}}" rows="4" PLACEHOLDER="Your answer" class="form-control no-resize" {{$question->required ==1 ? 'required':''}}></textarea>
                                </div>
                            </div>
                    @elseif($type==2)
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" name="{{$question->id}}" type="text" PLACEHOLDER="Your answer" aria-label="Short-answer text" {{$question->required ==1 ? 'required':''}}/>
                            </div>
                        </div>
                    @elseif($type==3)
                        @foreach($question->options as $option)
                            <div class="input-group">
                                <input type="checkbox" name="{{$question->id}}[]" id="{{$question->id}}_{{$option->id}}" class="filled-in chk-col-red" value="{{$option->id}}"/>
                                <label for="{{$question->id}}_{{$option->id}}">{{$option->questionOption}}</label>

                            </div>
                        @endforeach
                    @elseif($type==4)
                        @foreach($question->options as $option)
                                <div class="input-group">
                                    <input type="radio" name="{{$question->id}}[]" id="{{$question->id}}_{{$option->id}}" value="{{$option->id}}" class="radio-col-red"/>
                                    <label for="{{$question->id}}_{{$option->id}}">{{$option->questionOption}}</label>

                                </div>
                        @endforeach
                    @else
                    @endif

                </div>
            </fieldset>

        </div>
    </div>

</div>

@else
    <div class="questions_row">
        <div data-question-type="single-choice" class="question_container col-lg-12 col-md-12 col-sm-12 col-xs-12" id="field{{$question->id}}" data-field="{{$question->id}}">
            <div id="question-field-{{$question->id}}" data-question-id="{{$question->id}}" class="question_open question_field">
                <fieldset class="field_edit" style="margin-top: 2px">
                    <h4 id="question-title-{{$question->id}}">
                        {{isset($question_number)?$question_number:''}}. {{$question->strQuestionTitle}}
                        @if($question->required ==1)
                            <span style="color: red">*</span>
                        @endif
                    </h4>
                    <div class="question_body">
                        <?php $type = $question->question_types_id;?>
                        @if($type==1)
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="{{$question->id}}" rows="4" PLACEHOLDER="Your answer"
                                              class="form-control no-resize" {{$question->required ==1 ? 'required':''}}>{{$isFound->questionAnswer}}</textarea>
                                </div>
                            </div>
                        @elseif($type==2)
                            <div class="form-group">
                                <div class="form-line">
                                    <input class="form-control" name="{{$question->id}}" type="text" PLACEHOLDER="Your answer"
                                           aria-label="Short-answer text" value="{{$isFound->questionAnswer}}" {{$question->required ==1 ? 'required':''}}/>
                                </div>
                            </div>
                        @elseif($type==3)
                            <?php
                                $paths = explode('_|@|_',$isFound->questionAnswer);
                                $paths = array_values( array_filter($paths));
                                $plucked = $question->options->pluck('id')->toArray(); $result =  array_diff($plucked,$paths);
                                ?>
                            <input type="hidden" name="{{$question->id}}[]" value="q{{$question->id}}">
                            @foreach($paths as $path)
                            <div class="input-group">
                                <input type="checkbox" name="{{$question->id}}[]" id="{{$question->id}}_{{$path}}" class="filled-in chk-col-red" value="{{$path}}" checked/>
                                <label for="{{$question->id}}_{{$path}}">{{\App\Models\Option::find($path)->questionOption}}</label>

                            </div>
                            @endforeach
                            @foreach($result as $k=>$item)
                            <div class="input-group">
                                <input type="checkbox" name="{{$question->id}}[]" id="{{$question->id}}_{{$item}}" class="filled-in chk-col-red" value="{{$item}}"/>
                                <label for="{{$question->id}}_{{$item}}">{{\App\Models\Option::find($item)->questionOption}}</label>

                            </div>
                            @endforeach
                        @elseif($type==4)
                            <?php
                            $paths = explode('_|@|_',$isFound->questionAnswer);
                            $paths = array_values( array_filter($paths));
                            $plucked = $question->options->pluck('id')->toArray(); $result =  array_diff($plucked,$paths);
                            ?>
                                <input type="hidden" name="{{$question->id}}[]" value="q{{$question->id}}">
                            @foreach($paths as $path)
                            <div class="input-group">
                            <input type="radio" name="{{$question->id}}[]" id="{{$question->id}}_{{$path}}" value="{{$path}}" class="radio-col-red" checked/>
                            <label for="{{$question->id}}_{{$path}}">{{\App\Models\Option::find($path)->questionOption}}</label>

                            </div>
                            @endforeach
                            @foreach($result as $k=>$item)
                            <div class="input-group">
                                <input type="radio" name="{{$question->id}}[]" id="{{$question->id}}_{{$item}}" value="{{$item}}" class="radio-col-red"/>
                                <label for="{{$question->id}}_{{$item}}">{{\App\Models\Option::find($item)->questionOption}}</label>

                            </div>
                            @endforeach
                        @endif

                    </div>
                </fieldset>

            </div>
        </div>

    </div>
@endif

