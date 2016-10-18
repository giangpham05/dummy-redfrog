<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DB;
use App\Models\Survey;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class SurveysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveys = Auth::user()->surveys;
        return view('manage/survey/survey_show')->with('surveys',$surveys);;
    }

    public function showCurrentSurveys()
    {

    }

    /**
     *
     */
    public function create()
    {
        $id = Auth::user()->getId();

        //get surveys belongs to the current user

        if(Auth::user()->isAdmin())
        {
            return view('manage/survey/survey_create');
        }
        else if(Auth::user()->isTherapist())
        {
            //therapy user
            //get template surveys
            $templateSurveys = Survey::where('inheritFlag', '=', 0)->get();

            return view('manage/survey/survey_create')
                ->with(['templateSurveys' => $templateSurveys]);

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $survey = Survey::findOrFail($id);
        return view('manage/therapy/survey_assignments/therapy_survey_assign_show_each')
            ->with('$survey',$survey);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
