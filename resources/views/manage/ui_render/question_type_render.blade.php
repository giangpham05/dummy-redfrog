@if(isset($question))
    <?php $overOneOption = count($question->options)>1 ? true: false;?>
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
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="material-icons">check_box_outline_blank</i>
                </span>
                <div class="form-line">
                    <input type="text" class="form-control" name="checkbox_input[]" value="{{$option->questionOption}}" placeholder="Enter an answer choice">
                </div>
                @if($overOneOption)
                    <span class="input-group-addon delete_option">
                        <i class="material-icons">clear</i>
                    </span>
                @endif
            </div>
        @endforeach
        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">check_box_outline_blank</i>
            </span>
            <div class="form-line">
                <a href="javascript:void(0);" class="add_choice">Add choice</a> Or <a href="javascript:void(0);" class="add_other">Add "OTHER"</a>
            </div>

        </div>

    @elseif($type == 4)

        @foreach($question->options as $option)
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="material-icons">radio_button_unchecked</i>
                </span>
                <div class="form-line">
                    <input type="text" class="form-control" name="radio_input[]" value="{{$option->questionOption}}" placeholder="Enter an answer choice">
                </div>
                @if($overOneOption)
                    {{--<button type="button" class="btn bg-deep-orange btn-circle waves-effect waves-circle waves-float">--}}
                        {{--<i class="material-icons">clear</i>--}}
                    {{--</button>--}}
                    <span class="input-group-addon delete_option">
                        <i class="material-icons">clear</i>
                    </span>

                @endif
            </div>
        @endforeach
        <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">radio_button_unchecked</i>
            </span>
            <div class="form-line">
                <a href="javascript:void(0);" class="add_choice">Add choice</a> Or <a href="javascript:void(0);" class="add_other">Add "OTHER"</a>
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
                <a href="javascript:void(0);" class="add_choice">Add choice</a> Or <a href="javascript:void(0);" class="add_other">Add "OTHER"</a>
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
                <a href="javascript:void(0);" class="add_choice">Add choice</a> Or <a href="javascript:void(0);" class="add_other">Add "OTHER"</a>
            </div>

        </div>

    @elseif($question_option ==='5')
        <p>linear scale</p>
    @endif

@endif


