<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientAnswer;
use App\Models\Survey;
use App\Models\SurveyAssignment;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use DB;

class SurveyResponsesController extends Controller
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
            $client_answers = ClientAnswer::where('uuid', $client->id)->get();
            if(!$client_answers->isEmpty()){
                $collection->put($client->id, $client_answers);

            }
        }


        $collectionAfterFiltered = collect([]);

        foreach ($collection as $key=>$value){
            //$this_client_survey = $collection->get($key);
            //$this_client = Client::find($key);

            //$col = $collection->get($key);

            $col2 = $value->groupBy('survey_id');

            $collectionAfterFiltered->put($key, $col2);

//            $surveyAssign = $this_client->survey_assignments;
//
//            foreach ($surveyAssign as $value){
//
//                $filtered = $col->filter(function ($value, $key) {
//                    return $value == $value->survey_id;
//                });
//            }
            //$client_survey_assign = SurveyAssignment::findOrFail($this_client_survey);

        }

        //return dd($collectionAfterFiltered);




        return view('manage/therapy/survey_response/show_all_responses')
            ->with('collection', $collectionAfterFiltered);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $username, $uuid, $survey_id)
    {
        $id = Survey::where('hash_id', $survey_id)->first()->id;
        $questionsAnswered = DB::table('clients_answers')->where([
            ['uuid', '=', $uuid],
            ['survey_id', '=', $id],
        ])->get();
        return view('manage/therapy/survey_response/show_each')
            ->with([
                'questionAnswer' =>$questionsAnswered,
                'uuid'=>$uuid,
                'survey_id' =>$id
            ]);
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
