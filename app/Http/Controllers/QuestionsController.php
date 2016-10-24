<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use App\Models\Section;
use Illuminate\Http\Request;

use App\Http\Requests;

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
        //return response()->json(['sds' => $request->all()]);
        $this->validate($request, [
            'question'=>'required|max:255',
        ]);
        //return response()->json(['test' => $request->all()]);
        $question = new Question();
        $question->strQuestionTitle = $request->get('question');
        $question->question_types_id = $request->get('question_type');

        if($request->has('require_answer')){
            $question->required = 1;
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

        $question->sections()->attach($section);
        $questions = Section::findOrFail($section)->questions;
        $count = sizeof($questions);
//        if($count>0){
//            $view = view('manage/ui_render/question_show')
//                ->with(['question'=>$question,'question_number'=>$count])->render();
//            return response()->json(['question'=>$view, 'question_number'=>$count]);
//        }
        //else{
            $view = view('manage/ui_render/question_show')
                ->with(['question'=>$question,'question_number'=>$count])->render();
            return response()->json(['question'=>$view, 'question_number'=>$count]);
        //}

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
