@if(isset($question))
    <?php $type = $question->question_type()?>
    @if($type ==='1')
        <div class="form-group">
            <div class="form-line">
                <textarea name="option_para" rows="4" class="form-control no-resize" placeholder="Survey description">
                        {{$question->options()->first()}}</textarea>
            </div>
        </div>

    @elseif($type === '2')
        <div class="form-line">
                <textarea name="option_short_answer" rows="4" class="form-control no-resize" placeholder="Survey description">
                        {{$question->options()->first()}}</textarea>
        </div>

    @elseif($type === '3')
        @foreach($question->options as $option)
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="material-icons">check_box_outline_blank</i>
                </span>
                <div class="form-line">
                    <input type="text" class="form-control" name="checkbox_input[]" value="{{$option->questionOption}}" placeholder="Enter an answer choice">
                </div>
            </div>
        @endforeach

    @elseif($type === '4')
        @foreach($question->options as $option)
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="material-icons">radio_button_unchecked</i>
                </span>
                <div class="form-line">
                    <input type="text" class="form-control" name="radio_input[]" value="{{$option->questionOption}}" placeholder="Enter an answer choice">
                </div>
            </div>
        @endforeach
    @elseif($type === '5')
    @endif


@else

    @if($question_option ==='1')
        <div class="form-group">

            <div class="form-line" style="border-bottom-style: dotted;">

                <input type="text" class="" placeholder="Long-answer text"
                       disabled="true" aria-label="Long-answer text" style="border: none"/>
            </div>
            <div class="form-line" style="border-bottom-style: dotted;">

                <input type="text" class="" disabled="true" aria-label="Long-answer text" style="border: none"/>
            </div>

        </div>
    @elseif($question_option ==='2')
        <div class="form-group">
            <div class="form-line" style="border-bottom-style: dotted;">

                <input type="text" class="" placeholder="Short-answer text"
                       disabled="true" aria-label="Short-answer text" style="border: none"/>
            </div>
        </div>
    @elseif($question_option ==='3')
        <div class="input-group">
        <span class="input-group-addon">
            <i class="material-icons">check_box_outline_blank</i>
        </span>
            <div class="form-line">
                <input type="text" class="form-control checkbox_input_class" name="checkbox_input[]" placeholder="Enter an answer choice">
            </div>
        </div>

        <div class="input-group">
        <span class="input-group-addon">
            <i class="material-icons">check_box_outline_blank</i>
        </span>
            <div class="form-line">
                <input type="text" class="form-control checkbox_input_class" name="checkbox_input[]" placeholder="Enter an answer choice">
            </div>
        </div>



    @elseif($question_option ==='4')
        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">radio_button_unchecked</i>
            </span>
            <div class="form-line">
                <input type="text" class="form-control radio_input_class" name="radio_input[]" placeholder="Enter an answer choice">
            </div>
        </div>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">radio_button_unchecked</i>
            </span>
            <div class="form-line">
                <input type="text" class="form-control radio_input_class radio_input_class_extra" name="radio_input[]" placeholder="Enter an answer choice">
            </div>
        </div>

    @elseif($question_option ==='5')
        <p>linear scale</p>
    @endif

@endif


