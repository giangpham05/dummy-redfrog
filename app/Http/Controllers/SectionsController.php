<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Models\Section;
class SectionsController extends Controller
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
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user, $survey)
    {
        return redirect(route());
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param User $user
     * @param Survey $survey
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user,$survey)
    {
        $this_survey = Survey::where('hash_id','=',$survey)->firstOrFail();


        $section = new Section;
        $section['strSectionDesc'] = 'Not provided';
        $section['created_at'] = \Carbon\Carbon::now();
        $section->save();

        $this_survey->sections()->attach($section->id);

        $view = view('manage/ui_render/section_show')
            ->with(['survey'=>$this_survey,'section'=>$section])->render();



        return response()->json(['section'=>$view]);
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
     * @param  Request  $request
     * @param  User  $user
     * @param  Survey  $survey
     * @param  Section  $section
     * @return \Illuminate\Http\Json Response
     */
    public function destroy(Request $request, $user, $survey, $section)
    {
        $this_section = Section::findOrFail($section);

        $this_survey = Survey::findOrFail($survey);

        $questions = $this_section->questions;

        foreach ($questions as $question){
            DB::table('options')->where('question_id','=', $question->id)->delete();
            $this_section->questions()->detach($question->id);
        }

        $this_survey->sections()->detach($section);

        return response()->json(['test'=>'ok']);
    }
}
