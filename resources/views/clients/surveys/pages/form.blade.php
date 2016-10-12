@extends('surveys.layouts.master')
@section('title')
    Survey|CDI Survey
@endsection

@section('content')

    @if(!empty($section))
        <h1 class="survey-heading">{!! $survey->strSurveyName !!}</h1>


        {{--<form action="{{ URL::route('survey.show',['survey_id' => $survey->id]) }}" method="get">--}}
        {{--{{$survey}}--}}
        {{--<input type="submit" name="sub" value="Next">--}}
        {{--</form>--}}
        <hr>
        <p>{!! $survey->strSurveyDesc !!}</p>
        <hr>
        <?php $count = 1; ?>
        {{--@foreach($survey->sections as $section)--}}
        <h4>{!! $section->strSectionTitle !!}</h4>
        <h5>{!! $section->strSectionDesc !!}</h5>
        {{--{!! $questions =  !!}--}}
        <form action="{{ URL::route('section_submit',['survey_id' => $survey->id,'section_id'=>$section->id]) }}" method="post">
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <table class="table">
                <thead class="bg-primary">
                <?php $question = App\Models\Section::find($section->id)->questions->first(); ?>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    @foreach(App\Models\QuestionType::where('id',$question->question_types_id )->first()->options as $option)
                        <th>{{$option->questionOption}}</th>
                    @endforeach
                </tr>


                </thead>
                <tbody>
                @foreach (App\Models\Section::find($section->id)->questions as $question)
                    <tr>
                        <td>{!! $count++ !!}</td>
                        <td>
                            {!! $question->strQuestionTitle !!}
                        </td>
                        {{--<td>--}}
                        {{--<label class="radio">--}}

                        {{--<input type="radio" name="optradio">Yes--}}
                        {{--</label>--}}
                        {{--<label class="radio">--}}
                        {{--<input type="radio" name="optradio">No--}}
                        {{--</label>--}}
                        {{--</td>--}}
                        @include('surveys.includes.question-type')
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                <ul class="pager">
                    <li><input id="prev" type="button" value="&larr; Previous"></li>
                    <li><input id="next" type="submit" name="submit" value="&rarr; Next"></li>
                </ul>
            </div>
        </form>
        {{--@endforeach--}}
    @else
        <div class="alert alert-danger">
            <strong>Not Found!</strong> Section cannot found!
        </div>
    @endif
@endsection

