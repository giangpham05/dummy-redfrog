@extends('surveys.layouts.master')

@section('title')
    Welcome!
@endsection

@section('content')
    <h3 style="text-align: center">Please choose a survey:</h3>
    <div class="btn-group-vertical" style="display: block;">
        <ul>
            @foreach($surveys as $survey)
                <li>
                    <a href="{{ URL::route('survey.show',['survey_id' => $survey->id]) }}" class="waves-effect waves-light btn blue-grey darken-4">
                        {{ $survey->strSurveyName }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection