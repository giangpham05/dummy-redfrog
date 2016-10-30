<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Survey;
use App\Models\SurveyAssignment;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;
class SurveyAssignmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $clients = $user->clients;

        $collection = collect([]);

        foreach ($clients as $client){
            $survey_ass = SurveyAssignment::where('uuid', $client->id)->get();
            if(!$survey_ass->isEmpty()){
                $collection->put($client->id, $survey_ass);

            }
        }


        $collectionAfterFiltered = collect([]);

//        if(sizeof($collection)>0){
//            foreach ($collection as $key=>$value){
//
//                $col2 = $value->groupBy('survey_id');
//
//                $collectionAfterFiltered->put($key, $col2);
//
//
//            }
//
//        }
        return view('manage/therapy/survey_assignments/therapy_survey_assign_show')
            ->with('survey_assignments', $collection);




//            ->with('collection', $collectionAfterFiltered);


        //$survey_assignments = SurveyAssignment::all();

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
    public function store(Request $request, $user)
    {


        $errors = $this->sendFailedResponse($request);

        if(is_int($errors)){

            $client_selected = $request->get('client_field');

            $status = collect([]);

            $client = Client::findOrFail($client_selected);

            $surveys = $request->get('survey');
            foreach ($surveys as $key=>$value)
            {
                $label = array_get($surveys,$key);
                $dueDate = 'dueDateFor'.$label;


                $actualDue = $request->get($dueDate);

                $survey_assignment = DB::table('survey_assignments')->where([
                    ['uuid', '=', $client_selected],
                    ['survey_id', '=', $label],
                ])->get();

                $survey_name = Survey::find($label)->strSurveyName;
                if(!$survey_assignment->isEmpty()){
                    $this_survey = 'survey_'.$label;
                    $status->put($this_survey, 'The survey '.$survey_name.' cannot be assigned due to prior assignment has been made.');
                }
                else{
                    $new_assignment = new SurveyAssignment();
                    $new_assignment['uuid'] = $client_selected;
                    $new_assignment['survey_id'] = $label;
                    $new_assignment['assign_timestamp'] = Carbon::now();
                    $new_assignment['due_timestamp'] = $actualDue;
                    $new_assignment->save();
                }
            }


            if(count($status)<1){

                //$shuffled = $collection->shuffle();
                //dd($collection);
                Session::flash('success', 'All surveys have been assigned!');
                return redirect()->back();
            }

            else{
                Session::flash('status', $status);
                return redirect()->back();
            }
        }
        else{
            return redirect()->back()->with('errors',$errors);
        }


    }


    protected function sendFailedResponse(Request $request)
    {

        $errors = collect([]);
        if($request->get('client_field')=='default'){
            $errors->put('client_field','Please select a client');
        }

        $surveys = $request->get('survey');
        if(count($surveys)<1){
            $errors->put('survey','Please select at least one survey');
        }
        else{
            $error_text = false;
            foreach ($surveys as $key=>$value){
                $label = array_get($surveys,$key);
                $dueDate = 'dueDateFor'.$label;
                if($request->get($dueDate)==''){
                    $error_text = true;
                }
            }
            if($error_text){
                $errors->put('survey_due','Each survey you selected must have a due date');
            }

        }

        if(count($errors)<1){
            return $errors =1;

            //return redirect()->back()->with('errors',$errors);
        }
        else{
            return $errors;
        }
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
