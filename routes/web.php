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


Route::get('/', function () {
    //return view('welcome');
    return redirect(route('login'));

})->middleware('guest');

//Route::get('/login',function (){
//    return view('auth/login');
//})->name('login');

/**
 * Javascript disabled route
 */
Route::get('/script-disabled', function () {
    return view('errors.no-script');
})->name('no-script');

/**
 * Route for update theme, just a minor function
 */
Route::post('/updateTheme', function (\Illuminate\Http\Request $request) {
    session(['theme' => $request['theme']]);
    session(['active' => $request['active']]);
    session(['id' => $request['id']]);
    return response()->json(['message' => $request['theme']]);
})->name('updateTheme');

/**
 * Route for getting question UI, this is done on the server side since we are unable
 * to render html markups from the client side
 */
Route::get('/survey/question/question_type', function (\Illuminate\Http\Request $request) {

    $view = view('manage/ui_render/question_type_render')->with('question_option', $request['question_option'])->render();
    return response()->json(['questionOption' => $view, 'all' => $request->all()]);
})->name('getQuestionOption');

/**
 * AUTHORISED ROUTES
 */
Auth::routes();

Route::get('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm'])->middleware('validateBackHistory');

Route::group(['prefix' => 'manage', 'middleware' => ['auth', 'validateBackHistory']], function () {

    /**
     * Route for dashboard
     */
    Route::get('users/dashboard', 'HomeController@index')->name('manage_dashboard');

    Route::resource('users', 'UsersController');

    /**
     * Survey routes for both admin and therapy
     */
//    Route::get('users/{user}/surveys/current', 'SurveysController@showCurrentSurveys')->name('users.surveys.current');
//
//    Route::post('users/{user}/surveys', 'SurveysController@store')
//        ->name('users.surveys.store');
//
//    Route::get('users/{user}/surveys', 'SurveysController@index')->name('users.surveys.index');

//    Route::get('users/{user}/surveys/create','SurveysController@create')
//        ->name('users.surveys.create');
//
//    Route::put('users/{user}/surveys/{survey}','SurveysController@update')
//        ->name('users.surveys.update');
//
//    Route::get('users/{user}/surveys/{survey}','SurveysController@show')
//        ->name('users.surveys.show');
//
//    Route::delete('users/{user}/surveys/{survey}','SurveysController@destroy')
//        ->name('users.surveys.destroy');
//
//    Route::get('users/{user}/surveys/{survey}/edit','SurveysController@edit')
//        ->name('users.surveys.edit');


    Route::get('users/{user}/surveys/{survey}/preview','SurveysController@surveyPreview')
        ->name('users.surveys.preview');

    Route::resource('users.surveys', 'SurveysController');

    Route::resource('users.surveys.sections', 'SectionsController', ['except' => ['index']]);

    Route::resource('users.surveys.sections.questions', 'QuestionsController', ['except' => ['index']]);


    /**
     * Routes belong to therapists
     */
    Route::group(['middleware'=>'therapy'], function () {

        //Route::resource('{username}','UsersController');
        //Route::resource('survey-assignments','SurveyAssignmentsController');

        /**
         * Survey assignment routes
         */
        Route::resource('users.survey-assignments', 'SurveyAssignmentsController');

        /**
         * Survey response routes
         */

        //Route::resource('users.survey-responses', 'SurveyAssignmentsController');

        Route::get('users/{username}/survey-response', 'SurveyResponsesController@index')->name('survey-response.index');
        Route::get('users/{username}/survey-response/{uuid}/{survey_id}', 'SurveyResponsesController@show')->name('survey-response.show');

        Route::delete('users/{username}/survey-response/{id}', 'SurveyResponsesController@destroy')->name('survey-response.destroy');

    });
});

/**
 * Client management routes
 */






