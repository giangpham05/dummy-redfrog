<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Survey;
use App\Models\SurveyAssignment;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class TherapyController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        return view('therapy.therapy');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function test(Request $request){
        if($request->ajax()) {
            //$data = $request->all();
            //session()->put('theme', $data);
            return 'sometext';
        }
    }

    /**
     * @return view('therapy/pages/surveys-crud/all-surveys')->with('surveys', $surveys);
     */
    public function showAllSurveys()
    {
        $surveys = Survey::all();
        return view('therapy/pages/surveys-crud/all-surveys')->with('surveys', $surveys);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createNewSurveyAssignment(Request $request)
    {
        //return view('administration/pages/surveys-assign/assign-survey');
//        $this->validate($request, array(
//
//        ));
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
//        Session::flash('status', 'Task was successful!');
        //return view('administration/pages/surveys-assign/assign-survey');
        //return redirect(route('admin.surveysAssign.show'));
        //return view('administration/pages/surveys-assign/result');
        //return back();
        //ini_set('date.timezone', 'UTC');
        //$date = Carbon::now('Australia/Sydney');
        //$date = Carbon::now();
//        return view('administration/pages/surveys-assign/result');
        return redirect(route('admin.surveysAssign.showAll'));
    }

    /**
     * @return view('therapy/pages/surveys-assign/assign-survey')
     */
    public function showCreateAssignPage()
    {
        $clients = Client::all();
        $surveys = Survey::all();
        return view('therapy/pages/surveys-assign/assign-survey')
            ->with(['clients' => $clients,'surveys'=> $surveys]);
    }

    /**
     * @return view('therapy/pages/surveys-assign/all-assign-surveys')->with('surveyAssignments',$survey_assignment)
     */
    public function showAllAssignSurveysPage()
    {
        $survey_assignment = SurveyAssignment::all();
        return view('therapy/pages/surveys-assign/all-assign-surveys')->with('surveyAssignments',$survey_assignment);
    }
}
