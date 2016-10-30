<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Section;
use Illuminate\Http\Request;
use DB;
use App\Models\Survey;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Input;
class SurveysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $surveys = Auth::user()->surveys;
        return view('manage/survey/survey_show')->with('surveys',$surveys);;
    }

    public function showCurrentSurveys()
    {

    }

    /**
     *
     */
    public function create()
    {
        return view('manage/survey/survey_form');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //need to store survey here and redirect to edit page
        $this->validate($request, [
            'survey_name' => 'required|max:255',
        ]);
        $survey = new Survey();
        $strSurveyName = $request['survey_name'];
        $survey['user_id'] = Auth::user()->getId();
        $survey['strSurveyName'] = $strSurveyName;
        $survey['slug'] = str_slug($strSurveyName, '-');
        $survey['created_at'] = \Carbon\Carbon::now();
        $survey['updated_at'] = \Carbon\Carbon::now();

        if($request['survey_description'] === '' || $request['survey_description']===null){
            $survey['strSurveyDesc'] = 'Not provided';
            $survey->save();
        }
        else{
            $this->validate($request, [
                'survey_description' => 'required',
            ]);

            $survey['strSurveyDesc'] = $request['survey_description'];

            $survey->save();
        }

        DB::table('surveys')
            ->where('id', $survey->id)
            ->update(['hash_id' => md5($survey->id)]);


        //return $request->all();

        $current = Survey::findOrFail($survey->id);
        $hash = $current->hash_id;

        $section = new Section();
        $section['strSectionDesc'] = 'Not provided';
        $section['created_at'] = \Carbon\Carbon::now();
        $section->save();

        $current->sections()->attach($section->id);
        return redirect(route('users.surveys.edit', ['user'=> Auth::user()->getUsername(), 'survey' => $hash]));
    }


    /**
     * Render form for editing survey name and title.
     *
     * @param User $username
     * @param  string  $survey
     * @return \Illuminate\Http\Response
     */
    public function show($username,$survey)
    {
        //$id = Auth::user()->getId();
        $user = Auth::user();
        //$survey = Survey::findOrFail($id);
        $this_survey = $user->surveys()->where('hash_id', '=', $survey)->firstOrFail();
        return response()->json(['survey_name' => $this_survey->strSurveyName, 'survey_desc'=>$this_survey->strSurveyDesc]);

    }

    /**
     * Show the survey preview.
     *
     * @param User $username
     * @param  string  $survey
     * @return \Illuminate\Http\Response
     */

    public function surveyPreview($username,$survey)
    {
        $user = Auth::user();

        $this_survey =  $user->surveys()->where('hash_id',$survey)->firstOrFail();

        $section = $this_survey->sections->paginate(1);
        return view('clients/surveys/pages/client_survey_show')
            ->with('section',$section);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $survey
     * @return \Illuminate\Http\Response
     */
    public function edit($username, $survey)
    {
        $user = Auth::user();

        //get surveys belongs to the current user

        $this_survey = $user->surveys()->where('hash_id', '=', $survey)->firstOrFail();



        return view('manage/survey/survey_create')->with('survey',$this_survey);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $survey_hash
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$user, $survey_hash)
    {
        //$id = Auth::user()->getId();

        $this->validate($request, [
            'survey-name' => 'required|max:255',
        ]);

        $this_survey = Auth::user()->surveys()->where('hash_id', '=', $survey_hash)->firstOrFail();

        $strSurveyName = $request['survey-name'];
        $this_survey['strSurveyName'] = $strSurveyName;
        $this_survey['slug'] = str_slug($strSurveyName, '-');
        $this_survey['updated_at'] = \Carbon\Carbon::now();

        if($request['survey-description'] === '' || $request['survey-description']===null){
            $this_survey->save();
        }
        else{
            $this->validate($request, [
                'survey-description' => 'required',
            ]);

            $this_survey['strSurveyDesc'] = $request['survey-description'];

            $this_survey->save();
        }

        //get surveys belongs to the current user

        return response()->json(['questionOption' => $request['survey-name']]);
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
