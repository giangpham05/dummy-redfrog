<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use App\Models\Section;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * @param user $user
     * @param survey $survey
     * @param section $section
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user, $survey,$section)
    {
        $view = view('manage/ui_render/question_render')
            ->with(['survey'=>$survey, 'section'=>$section])->render();
        return response()->json(['question'=>$view]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param user $user
     * @param survey $survey
     * @param section $section
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$user, $survey, $section)
    {
        $this->validate($request, [
            'question'=>'required|max:255',
        ]);

        $question = new Question;
        $question['strQuestionTitle'] = $request->get('question');
        $question['question_types_id'] = $request->get('question_type');
        $question->save();

        if($request->has('require_answer')){
            $question['required'] = 1;
        }

        if(!$request->has('radio_input') && !$request->has('checkbox_input')){

            $question->save();

        }

        else if($request->has('radio_input')){

            $question->save();
            $radios = $request->get('radio_input');

            foreach ($radios as $rad){
                if($rad!==''){
                    Option::create([
                        'questionOption' => $rad,
                        'question_id' => $question->id,
                        'inheritFlag' => 0,
                    ]);
                }
            }

        }

        else if($request->has('checkbox_input')){

            $question->save();
            $checkboxes = $request->get('checkbox_input');

            foreach ($checkboxes as $check){
                if($check!==''){
                    Option::create([
                        'questionOption' => $check,
                        'question_id' => $question->id,
                        'inheritFlag' => 0,
                    ]);
                }
            }
        }
        $questions = Section::findOrFail($section)->questions;
        $count = 1;
        if($questions->isEmpty()){
            $question->sections()->attach($section, ['orderNo'=>$count]);

        }

        else{
            $count  = sizeof($questions);
            $count = $count +1;
            $question->sections()->attach($section, ['orderNo'=>$count]);

        }


        $view = view('manage/ui_render/question_show')
            ->with(['question'=>$question,'question_number'=>$count])->render();
        return response()->json(['question'=>$view, 'question_number'=>$count]);

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
     * @param  User  $user
     * @param  Survey  $survey
     * @param  Section  $section
     * @param  Question  $question
     * @return \Illuminate\Http\Response->json()
     */
    public function edit($user, $survey, $section, $question)
    {
        $question_model = Question::findOrFail($question);
        $view = view('manage/ui_render/question_edit')
            ->with(['username'=>$user,'survey'=>$survey,'section'=>$section,'question'=>$question_model])->render();
        return response()->json(['question_edit'=>$view, 'status'=>'ok']);
        //return response()->json(['status'=>'ok']);
        //return 'hello';

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $user
     * @param  User  $survey
     * @param  User  $section
     * @param  User  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$user, $survey, $section,$question)
    {

        $this->validate($request, [
            'question'=>'required|max:255',
        ]);

        $this_question = Question::findOrFail($question);

        //return response()->json(['test' => $request->all()]);
        $this_question['strQuestionTitle'] = $request->get('question');
        $this_question['question_types_id'] = $request->get('question_type');
        $this_question->save();

        if($request->has('require_answer')){
            $this_question['required'] = 1;
        }

        if(!$request->has('radio_input') && !$request->has('checkbox_input')){

            $this_question->save();

        }

        else if($request->has('radio_input')){

            $this_question->save();

//            foreach ($this_question->options as $option){
//                $option->delete();
//            }
            DB::table('options')->where('question_id','=', $this_question->id)->delete();
            $radios = $request->get('radio_input');

            foreach ($radios as $rad){
                if($rad!==''){
                    Option::create([
                        'questionOption' => $rad,
                        'question_id' => $this_question->id,
                        'inheritFlag' => 0,
                    ]);
                }
            }

        }

        else if($request->has('checkbox_input')){

            $this_question->save();
//            foreach ($this_question->options as $option){
//                $option->delete();
//            }

            DB::table('options')->where('question_id','=', $this_question->id)->delete();

            $checkboxes = $request->get('checkbox_input');

            foreach ($checkboxes as $check){
                if($check!==''){
                    Option::create([
                        'questionOption' => $check,
                        'question_id' => $this_question->id,
                        'inheritFlag' => 0,
                    ]);
                }
            }
        }

        //$question->sections()->attach($section);
        $questions = Section::findOrFail($section)->questions;
        $count = sizeof($questions);

        $view = view('manage/ui_render/question_show')
            ->with(['question'=>$this_question,'question_number'=>$count])->render();



        return response()->json(['question'=>$view, 'question_number'=>$count]);

        //return response()->json(['question'=>$this_question->options]);


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
