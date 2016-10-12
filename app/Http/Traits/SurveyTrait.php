<?php

namespace App\Http\Traits;

use App\Models\Client;
use App\Models\ClientAnswer;
use Illuminate\Http\Request;
use DB;
use App\Models\Survey;
use App\Http\Requests;
/**
 * Created by PhpStorm.
 * User: GIANGPHAM
 * Date: 10/10/2016
 * Time: 1:16 AM
 */
trait SurveyTrait
{
    public function index()
    {
        $surveys = Survey::all();

        return view('surveys.welcome')->with('surveys',$surveys);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //public function doSomething($squirrel)



    }
    public function test($survey_id)
    {


        return view('surveys.pages.form')->with('survey',$survey_id);
    }

    public function showForm($survey_id)
    {
        //$survey = collect(['section'=>1,'survey number'=>Survey::where('id',$survey_id)->get()]);
        $survey = Survey::find($survey_id);
        //$test = $survey->sections;
        //$survey = 'test';
        //return View::make('surveys/form', ['survey' => $survey]);
        //$user = App\User::find(1);
        //$sections = $survey->sections;
        //$survey->put('sections','someesss');
        //$survey->put('another one','someesss');
        //$sections = $survey->sections->toJSon();
        //$section_count = 0;
        //$sections = $survey->sections;
        //$survey->all_section = $sections;
        //$test = $survey->get('all_section');
//        if(Session::has('section_count')){
//            $section_count = Session::get('section_count');
//            //$section_count =0;
//            if($section_count < $test->count()){
//                $section_count++;
//            }
//            else{
//                $section_count = 0;
//            }
//            Session::put('section_count',$section_count);
//
//        }
//        else{
//            Session::put('section_count',0);
//        }
//        //session(['section_count' => 'value']);
//        $test2 = $test[Session::get('section_count')];

//        if(isset($test2)){
        //Session::forget('section_count');
        return view('surveys.pages.sections')
            ->with('survey', $survey);
        //return view('surveys.form', compact('survey',$survey));
        //}

    }

    public function showSection($survey_id, $section_id)
    {
        $survey = Survey::find($survey_id);
        $sections = $survey->sections;
        $section_out = null;
        foreach ($sections as $section){
            if($section->id == $section_id){
                $section_out = $section;
                break;
            }
            else{
                $section_out ='';
            }
            //$section_out = isset($sections[$section_id]) ? $sections[$section_id] : '';
        }

        //$section = $sections[$section_id];
        return view('surveys.pages.form')
            ->with(['survey' => $survey,'section'=> $section_out]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Survey $survey_id
     * @param Section $section_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $survey_id, $section_id)
    {
        $sections = Survey::find($survey_id)->sections;
        $section_out = null;
        foreach ($sections as $section){
            if($section->id == $section_id){
                $section_out = $section;
                break;
            }
        }
        $output = '';

        if(isset($_POST['submit'])){
            if($section_out!=null){
                foreach ($section_out->questions as $question){
                    $id = (string)($question->id);
                    $radName = 'question_number'.$id;
                    $result = $request[$radName];
                    if($result!=null){

                        $client = Client::find('a69fda20-4a29-11e6-a20e-d565001a30f8');
                        $client_answer = new ClientAnswer;
                        $client_answer->uuid = $client->id;
                        $client_answer->survey_id = $survey_id;
                        $client_answer->question_id = $question->id;
                        $client_answer->questionAnswer = $result;
                        $client_answer->save();

                    }

//                    $output = $output.'<h6>'.$request->$test.'</h6>';
                    //$output.=$result;
                    //echo $result;
                }
//                $selected_val = $_POST['Color'];  // Storing Selected Value In Variable
                //echo "You have selected :";  // Displaying Selected Value
            }

        }

        return ClientAnswer::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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