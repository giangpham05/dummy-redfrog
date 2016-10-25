@if(isset($question))
    @if($type ==1)
        <div class="form-group">

            <div class="form-line" style="border-bottom-style: dotted;">

                <input type="text" class="" placeholder="Long-answer text"
                       disabled="true" aria-label="Long-answer text" style="border: none"/>
            </div>
            <div class="form-line" style="border-bottom-style: dotted;">

                <input type="text" class="" disabled="true" aria-label="Long-answer text" style="border: none"/>
            </div>

        </div>

    @elseif($type == 2)
        <div class="form-group">
            <div class="form-line" style="border-bottom-style: dotted;">

                <input type="text" class="" placeholder="Short-answer text"
                       disabled="true" aria-label="Short-answer text" style="border: none"/>
            </div>
        </div>

    @elseif($type == 3)

        @foreach($question->options as $option)
            @if($option->questionOption!='Other')
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="material-icons">check_box_outline_blank</i>
                </span>
                <div class="form-line">
                    <input type="text" class="form-control" name="checkbox_input[]" value="{{$option->questionOption}}"
                           placeholder="Enter an answer choice">
                </div>
                <span class="input-group-addon delete_option">
                <i class="material-icons">clear</i>
            </span>
            </div>
            @elseif($option->questionOption=='Other')
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="material-icons">check_box_outline_blank</i>
                </span>
                    <div class="form-line">
                        <input type="text" class="form-control other" name="checkbox_input[]" value="{{$option->questionOption}}" disabled>
                    </div>
                    <span class="input-group-addon delete_option">
                <i class="material-icons">clear</i>
            </span>
                </div>
            @endif

        @endforeach
        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">check_box_outline_blank</i>
            </span>
            <div class="form-line">
                <a href="javascript:void(0);" class="add_choice">Add choice</a>
                <span>Or</span>
                <a href="javascript:void(0);" class="add_other">Add "OTHER"</a>

            </div>

        </div>

    @elseif($type == 4)

        @foreach($question->options as $option)
            @if($option->questionOption!='Other')

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="material-icons">radio_button_unchecked</i>
                </span>
                <div class="form-line">
                    <input type="text" class="form-control" name="radio_input[]" value="{{$option->questionOption}}" placeholder="Enter an answer choice">
                </div>
                <span class="input-group-addon delete_option">
                <i class="material-icons">clear</i>
            </span>
            </div>
            @elseif($option->questionOption=='Other')
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="material-icons">radio_button_unchecked</i>
                </span>
                    <div class="form-line">
                        <input type="text" class="form-control other" name="radio_input[]" value="{{$option->questionOption}}" disabled>
                    </div>
                    <span class="input-group-addon delete_option">
                <i class="material-icons">clear</i>
            </span>
                </div>
            @endif
        @endforeach
        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">radio_button_unchecked</i>
            </span>
            <div class="form-line">
                <a href="javascript:void(0);" class="add_choice">Add choice</a>
                <span>Or</span>
                <a href="javascript:void(0);" class="add_other">Add "OTHER"</a>

            </div>

        </div>
    @elseif($type == 5)
        <p>linear scale</p>
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
            <span class="input-group-addon delete_option">
                <i class="material-icons">clear</i>
            </span>
        </div>

        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">check_box_outline_blank</i>
            </span>
            <div class="form-line">
                <input type="text" class="form-control checkbox_input_class" name="checkbox_input[]" placeholder="Enter an answer choice">
            </div>
            <span class="input-group-addon delete_option">
                <i class="material-icons">clear</i>
            </span>
        </div>

        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">check_box_outline_blank</i>
            </span>
            <div class="form-line">
                <a href="javascript:void(0);" class="add_choice">Add choice</a>
                <span>Or</span>
                <a href="javascript:void(0);" class="add_other">Add "OTHER"</a>
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
            <span class="input-group-addon delete_option">
                <i class="material-icons">clear</i>
            </span>
        </div>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">radio_button_unchecked</i>
            </span>
            <div class="form-line">
                <input type="text" class="form-control radio_input_class radio_input_class_extra" name="radio_input[]" placeholder="Enter an answer choice">

            </div>

            <span class="input-group-addon delete_option">
                <i class="material-icons">clear</i>
            </span>
        </div>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">radio_button_unchecked</i>
            </span>
            <div class="form-line">
                <a href="javascript:void(0);" class="add_choice">Add choice</a>
                <span>Or</span>
                <a href="javascript:void(0);" class="add_other">Add "OTHER"</a>
            </div>

        </div>

    @elseif($question_option ==='5')
        <p>linear scale</p>
    @endif

@endif


