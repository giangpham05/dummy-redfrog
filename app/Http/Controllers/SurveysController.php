<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DB;
use App\Models\Survey;
use App\Http\Requests;
//use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Session;

class SurveysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //like showStatistics
    {
        //showStatistics needs to be implemented here.
        return view('manage/dashboard');
    }

    public function showCurrentSurveys()
    {
        $id = Auth::user()->getId();

        //get surveys belongs to the current user
        $surveys = \App\Models\User::findOrFail($id)->surveys();
        if(Auth::user()->isAdmin())
        {
            return view('manage/admin/survey/admin_survey_show.blade.php')
                ->with('surveys',$surveys);
        }
        else
        {
            //therapy user
            //get template surveys
            $templateSurveys = Survey::where('role', '<', 2)->get();

            return view('manage/therapy/survey/therapy_survey_show.blade.php')
                ->with(['survey' => $surveys, 'templateSurveys' => $templateSurveys]);

        }
    }

    /**
     *
     */
    public function create()
    {

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
