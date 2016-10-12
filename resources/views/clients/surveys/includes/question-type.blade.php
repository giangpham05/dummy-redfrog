@if(App\Models\Question::find($question->question_types_id)->id == 1)

        @foreach(App\Models\QuestionType::where('id',$question->question_types_id )->first()->options as $option)
        {{--<label class="radio">--}}
            <td>
                <input class="with-gap" name="question_number{{$question->id}}" type="radio"
                       value="{{$option->questionOption}}" id="radio_{{$question->id}}{{$option->id}}"/>
                <label for="radio_{{$question->id}}{{$option->id}}">
                </label>
            </td>
        {{--</label>--}}
        @endforeach

<?php ?>
    {{--radBtn_DCQD --}}
@elseif(App\Models\Question::where('id',$question->question_types_id)->first()->id == 2)

    <td>
        <label class="radio">

            <input type="radio" name="" value="">Yes
        </label>
        <label class="radio">
            <input type="radio" name="">No
        </label>
    </td>
    {{--radBtn_FlexQs --}}

    {{--radBtn_RDQ --}}
@elseif(App\Models\Question::where('id',$question->question_types_id)->first()->id == 3)
    {{--radBtn_SP --}}
@elseif(App\Models\Question::where('id',$question->question_types_id)->first()->id == 4)
    {{--radBtn_SPM --}}
@elseif(App\Models\Question::where('id',$question->question_types_id)->first()->id == 5)
    {{--radBtn_VNP --}}
@elseif(App\Models\Question::where('id',$question->question_types_id)->first()->id == 6)
    {{--scale_GS1 --}}
@elseif(App\Models\Question::where('id',$question->question_types_id)->first()->id == 7)
    {{--scale_GS2 --}}
@elseif(App\Models\Question::where('id',$question->question_types_id)->first()->id == 8)

@elseif(App\Models\Question::where('id',$question->question_types_id)->first()->id == 9)
    {{--scale_GS3 --}}
@else
@endif
