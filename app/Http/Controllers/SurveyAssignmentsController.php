<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\SurveyAssignment;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class SurveyAssignmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $survey_assignments = SurveyAssignment::all();
        return view('manage/therapy/survey_assignments/therapy_survey_assign_show')
            ->with('survey_assignments', $survey_assignments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $clients = $user->clients;
        $surveys = $user->surveys;
        return view('manage/therapy/survey_assignments/therapy_survey_assign_create')
            ->with(['surveys' => $surveys, 'clients' => $clients]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'surveyChecked' => 'required',
            'dueDate' => 'required',
            'clientSelectHidden' => 'required',
        ]);
        $surveyChecked = $request['surveyChecked'];
        $dueDate = $request['dueDate'];
        $clientSelectHidden = $request['clientSelectHidden'];


        for ($i = 0;$i<count($surveyChecked); $i++){
            $surveyAssignment = new SurveyAssignment();
            $surveyAssignment['uuid']= $clientSelectHidden;
            $surveyAssignment['survey_id'] = (int)$surveyChecked[$i];
            $surveyAssignment['due_timestamp'] = $dueDate[$i];
            $surveyAssignment['assign_timestamp'] = Carbon::now();

            $surveyAssignment->save();
        }
        return redirect()->action($this->index());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $survey_assignment = SurveyAssignment::findOrFail($id);
        return view('manage/therapy/survey_assignments/therapy_survey_assign_show_each')
            ->with('$survey_assignment',$survey_assignment);
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
