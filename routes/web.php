<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//


//Route::get('/home', 'HomeController@index');


Route::get('/', function (){
    //return view('welcome');
    return redirect(route('login'));

})->middleware('guest');

//Route::get('/login',function (){
//    return view('auth/login');
//})->name('login');

Route::get('/script-disabled', function (){
    return view('errors.no-script');
})->name('no-script');
//CHANGE THEME
    Route::post('/updateTheme', function (\Illuminate\Http\Request $request){
        session(['theme' => $request['theme']]);
        session(['active' => $request['active']]);
        session(['id' => $request['id']]);
        return response()->json(['message' => $request['theme']]);
    })->name('updateTheme');

//GET QUESTION
Route::get('/survey/question', function (){
    return response()->json(['question' => view('manage/ui_render/question_render')->render()]);
})->name('getQuestion');

Route::get('/survey/question/question_type', function (\Illuminate\Http\Request $request){

    $view = view('manage/ui_render/question_type_render')->with('question_option', $request['question_option'])->render();
    return response()->json(['questionOption' => $view]);
})->name('getQuestionOption');

//Route::group(['middleware' => ['web']], function (){
//
//    //CHANGE THEME
//    Route::post('/updateTheme', function (\Illuminate\Http\Request $request){
//        session(['theme' => $request['theme']]);
//        session(['active' => $request['active']]);
//        session(['id' => $request['id']]);
//        return response()->json(['message' => $request['theme']]);
//    })->name('updateTheme');
//
//    ////////////////////////////////////////////////////////////////////////////////////////////////////////
//    //ADMIN SECTION
//
//    //GET DASHBOARD
//    Route::get('/','AdminsController@index');
//
//
//    //ALL SURVEY PAGES
//    Route::get('/all-surveys',[
//        'uses' => 'AdminsController@showAllSurveys',
//        'as'  => 'admin.surveys.show'
//    ]);
//
//
//    //ALL SURVEY ASSIGNMENT PAGES
//    Route::post('/survey-assignments/create-new',[
//        'uses' => 'AdminsController@createNewSurveyAssignment',
//        'as' => 'admin.surveysAssign.create'
//    ]);
//
//    Route::get('/survey-assignments/create-new',[
//        'uses' => 'AdminsController@showCreateAssignPage',
//        'as' => 'admin.surveysAssign.show'
//    ]);
//
//    Route::get('/survey-assignments/show-all-survey-assignments',[
//        'uses' => 'AdminsController@showAllAssignSurveysPage',
//        'as' => 'admin.surveysAssign.showAll'
//    ]);
//
//
//    ////////////////////////////////////////////////////////////////////////////////////////////////////////
//    //ADMIN SECTION
//    //GET DASHBOARD
//    Route::get('/therapy','TherapyController@index');
//
//
//    //ALL SURVEY PAGES
//    Route::get('/therapy/all-surveys',[
//        'uses' => 'AdminsController@showAllSurveys',
//        'as'  => 'therapy.surveys.show'
//    ]);
//
//
//    //ALL SURVEY ASSIGNMENT PAGES
//    Route::post('/therapy/survey-assignments/create-new',[
//        'uses' => 'AdminsController@createNewSurveyAssignment',
//        'as' => 'therapy.surveysAssign.create'
//    ]);
//
//    Route::get('/therapy/survey-assignments/create-new',[
//        'uses' => 'AdminsController@showCreateAssignPage',
//        'as' => 'therapy.surveysAssign.show'
//    ]);
//
//    Route::get('/therapy/survey-assignments/show-all-survey-assignments',[
//        'uses' => 'AdminsController@showAllAssignSurveysPage',
//        'as' => 'therapy.surveysAssign.showAll'
//    ]);
//
//
//
//
//    //CLIENT/NON-ADMIN SECTION
////        Route::get('/','SurveysController@index');
////    Route::resource('survey','SurveysController');
////Route::get('/survey',[
////    'as'     => 'survey',
////    'uses' => 'SurveysController@create'
////]);
//
////Route::get('/survey/{survey_id}', [
////    'uses' => 'SurveysController@test',
////    'as' =>'survey.show'
////]);
//    Route::get('/surveys/survey={survey_id}',[
//        'uses' => 'SurveysController@showForm',
//        'as' =>'survey.show'
//    ]);
//
//    Route::get('/survey/{survey_id}/section/{section_id}',[
//        'uses' => 'SurveysController@showSection',
//        'as' =>'section.show'
//    ]);
//
//    Route::post('/survey/{survey_id}/section/{section_id}', [
//        'as' => 'section_submit', 'uses' => 'SurveysController@store'
//    ]);
//
//});


Auth::routes();
Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm'])->middleware('validateBackHistory');
Route::group(['prefix' => 'manage', 'middleware' => ['auth','validateBackHistory']],function (){


    Route::get('users/dashboard', 'HomeController@index')->name('manage_dashboard');
    //Route::resource('{username}','UsersController');
    //Route::resource('survey-assignments','SurveyAssignmentsController');
    Route::resource('users','UsersController');
    /**
     * Survey routes for both admin and therapy
     */
    Route::get('users/{user}/surveys/current','SurveysController@showCurrentSurveys')->name('users.surveys.current');
    Route::resource('users.surveys','SurveysController');

    /**
     * Routes belong to therapists
     */
    Route::group([''],function (){

        //Route::resource('{username}','UsersController');
        //Route::resource('survey-assignments','SurveyAssignmentsController');

        /**
         * Survey assignment routes
         */
        Route::resource('users.survey-assignments','SurveyAssignmentsController');

        /**
         * Survey response routes
         */
        Route::get('survey-response','SurveyResponsesController@index')->name('survey-response.index');
        Route::get('survey-response/{id}','SurveyResponsesController@show')->name('survey-response.show');

        Route::delete('survey-response/{id}','SurveyResponsesController@destroy')->name('survey-response.destroy');

        /**
         * Client management routes
         */


    });
});




