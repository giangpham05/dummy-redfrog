@if($question_option ==='paragraph')
    <div class="form-group">

        <div class="form-line" style="border-bottom-style: dotted;">

            <input type="text" class="" placeholder="Long-answer text"
                   disabled="true" aria-label="Long-answer text" style="border: none"/>
        </div>
        <div class="form-line" style="border-bottom-style: dotted;">

            <input type="text" class="" disabled="true" aria-label="Long-answer text" style="border: none"/>
        </div>

    </div>
@elseif($question_option ==='short_answer')
    <div class="form-group">

        <div class="form-line" style="border-bottom-style: dotted;">

            <input type="text" class="" placeholder="Short-answer text"
                   disabled="true" aria-label="Short-answer text" style="border: none"/>
        </div>
    </div>
@elseif($question_option ==='check_boxes')
    <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">check_box_outline_blank</i>
            </span>
        <div class="form-line">
            <input type="text" class="form-control" value="Option 1">
        </div>
    </div>


@elseif($question_option ==='multiple')
    <div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">radio_button_unchecked</i>
            </span>
        <div class="form-line">
            <input type="text" class="form-control" value="Option 1">
        </div>
    </div>
@elseif($question_option ==='linear_scale')
    <p>linear scale</p>
@endif

