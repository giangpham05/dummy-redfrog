@extends('surveys.layouts.master')

@section('title')
    Welcome!
@endsection

@section('content')
    <h1 class="survey-heading">{!! $survey->strSurveyName !!}</h1>


    {{--<form action="{{ URL::route('survey.show',['survey_id' => $survey->id]) }}" method="get">--}}
    {{--{{$survey}}--}}
    {{--<input type="submit" name="sub" value="Next">--}}
    {{--</form>--}}
    <hr>
    <p>{!! $survey->strSurveyDesc !!}</p>
    <hr>
    <h2>Please complete the following sections:</h2>
    <div class="btn-group-vertical" style="display: block;">
        <ul>
        @foreach($survey->sections as $section)
            <li>
                <a href="{{ URL::route('section.show',['survey_id' => $survey->id, 'section_id' => $section->id]) }}"
                   class="waves-effect waves-light btn blue-grey darken-4">{{ $section->strSectionTitle }}</a>

            </li>
        @endforeach
        </ul>
    </div>
@endsection




