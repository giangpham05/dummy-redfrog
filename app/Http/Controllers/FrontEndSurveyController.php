<?php

namespace App\Http\Controllers;

use App\Models\ClientAnswer;
use App\Models\Survey;
use App\Models\SurveyAssignment;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
class FrontEndSurveyController extends Controller
{


    public function index(Request $request, $uuid, $survey_id)
    {
        $this_survey = Survey::where('hash_id',$survey_id)->firstOrFail();

        $assignment = SurveyAssignment::where([
            ['uuid', '=', $uuid],
            ['survey_id', '=', $this_survey->id],
        ])->firstOrFail();


        $after_check_survey = Survey::findOrFail($assignment->survey_id);
            return view('clients/surveys/pages/client_survey_index')
                ->with(['survey' => $after_check_survey,'survey_id'=>$survey_id,'uuid'=>$uuid]);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Survey $survey_id
     * @param Section $section_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $uuid, $survey_id,$section_id)
    {
        //dd($request->all());
        $this_survey = Survey::where('hash_id',$survey_id)->firstOrFail();

        //dd($request->all());
        foreach ($request->all() as $key=> $input){
            if($key!='_token' && $key!='referrerScript'){
                $answer_string ='';
                if($input!='' || $input!=null){
                    if(is_array($input)){
                        foreach ($input as $innerKey=>$value){
                            if(strpos($value, 'q')===false){
                                $answer_string.= $value.'_|@|_';
                            }
                            else{

                            }

                        }
                    }
                    else{
                        $answer_string = $input;
                    }


                    $client_answer =null;
                    $under_test = ClientAnswer::where('question_id',$key)->first();

                    if($under_test==null){

                        $client_answer = new ClientAnswer();

                        $client_answer['uuid'] = $uuid;

                        $client_answer['survey_id'] = $this_survey->id;
                        $client_answer['question_id'] = $key;
                        $client_answer['questionAnswer'] = $answer_string;
                        $client_answer['created_at'] = Carbon::now();


                        $client_answer->save();
                    }

                    else{
                        $update = [['questionAnswer' => $answer_string],['created_at' => Carbon::now()]];
                        DB::table('clients_answers')
                            ->where([
                                ['uuid', '=', $uuid],
                                ['survey_id', '=', $this_survey->id],
                                ['question_id', '=', $key],
                            ])
                            ->update(['questionAnswer' => $answer_string]);

                    }


                }



            }
        }

        $next_section = $this_survey->sections->where('id','>', $section_id)->min('id');
        //Session::flash('referrer',$section_id);

        if($next_section!=null){
            return redirect(route('clients.surveys.section.show',['uuid'=>$uuid, 'survey_id'=>$survey_id, 'section_id'=>$next_section]));

        }
        else{
            return redirect(route('start',['uuid'=>$uuid, 'survey_id'=>$survey_id]));
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid, $survey_id, $section_id)
    {
        $this_survey = Survey::where('hash_id',$survey_id)->firstOrFail();

        $assignment = SurveyAssignment::where([
            ['uuid', '=', $uuid],
            ['survey_id', '=', $this_survey->id],
        ])->firstOrFail();


       // $after_check_survey = Survey::findOrFail($assignment->survey_id);
        $section = $this_survey->sections->where('id',$section_id)->first();

        return view('clients/surveys/pages/client_survey_show')
            ->with(['survey' => $this_survey,'survey_id'=>$survey_id,'uuid'=>$uuid, 'section'=>$section]);

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
