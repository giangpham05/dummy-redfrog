# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).


## ROUTE

+--------+-----------+-----------------------------------------------------------------------------------+------------------------------------------+------------------------------------------------------------------------+-------------------------------+
| Domain | Method    | URI                                                                               | Name                                     | Action                                                                 | Middleware                    |
+--------+-----------+-----------------------------------------------------------------------------------+------------------------------------------+------------------------------------------------------------------------+-------------------------------+
|        | GET|HEAD  | /                                                                                 |                                          | Closure                                                                | web,guest                     |
|        | GET|HEAD  | api/user                                                                          |                                          | Closure                                                                | api,auth:api                  |
|        | POST      | login                                                                             |                                          | App\Http\Controllers\Auth\LoginController@login                        | web,guest                     |
|        | GET|HEAD  | login                                                                             | login                                    | App\Http\Controllers\Auth\LoginController@showLoginForm                | web,validateBackHistory,guest |
|        | POST      | logout                                                                            |                                          | App\Http\Controllers\Auth\LoginController@logout                       | web                           |
|        | GET|HEAD  | manage/users                                                                      | users.index                              | App\Http\Controllers\UsersController@index                             | web,auth,validateBackHistory  |
|        | POST      | manage/users                                                                      | users.store                              | App\Http\Controllers\UsersController@store                             | web,auth,validateBackHistory  |
|        | GET|HEAD  | manage/users/create                                                               | users.create                             | App\Http\Controllers\UsersController@create                            | web,auth,validateBackHistory  |
|        | GET|HEAD  | manage/users/dashboard                                                            | manage_dashboard                         | App\Http\Controllers\HomeController@index                              | web,auth,validateBackHistory  |
|        | GET|HEAD  | manage/users/{username}/survey-response                                           | survey-response.index                    | App\Http\Controllers\SurveyResponsesController@index                   | web,auth,validateBackHistory  |
|        | DELETE    | manage/users/{username}/survey-response/{id}                                      | survey-response.destroy                  | App\Http\Controllers\SurveyResponsesController@destroy                 | web,auth,validateBackHistory  |
|        | GET|HEAD  | manage/users/{username}/survey-response/{id}                                      | survey-response.show                     | App\Http\Controllers\SurveyResponsesController@show                    | web,auth,validateBackHistory  |
|        | GET|HEAD  | manage/users/{user}                                                               | users.show                               | App\Http\Controllers\UsersController@show                              | web,auth,validateBackHistory  |
|        | PUT|PATCH | manage/users/{user}                                                               | users.update                             | App\Http\Controllers\UsersController@update                            | web,auth,validateBackHistory  |
|        | DELETE    | manage/users/{user}                                                               | users.destroy                            | App\Http\Controllers\UsersController@destroy                           | web,auth,validateBackHistory  |
|        | GET|HEAD  | manage/users/{user}/edit                                                          | users.edit                               | App\Http\Controllers\UsersController@edit                              | web,auth,validateBackHistory  |
|        | GET|HEAD  | manage/users/{user}/survey-assignments                                            | users.survey-assignments.index           | App\Http\Controllers\SurveyAssignmentsController@index                 | web,auth,validateBackHistory  |
|        | POST      | manage/users/{user}/survey-assignments                                            | users.survey-assignments.store           | App\Http\Controllers\SurveyAssignmentsController@store                 | web,auth,validateBackHistory  |
|        | GET|HEAD  | manage/users/{user}/survey-assignments/create                                     | users.survey-assignments.create          | App\Http\Controllers\SurveyAssignmentsController@create                | web,auth,validateBackHistory  |
|        | DELETE    | manage/users/{user}/survey-assignments/{survey_assignment}                        | users.survey-assignments.destroy         | App\Http\Controllers\SurveyAssignmentsController@destroy               | web,auth,validateBackHistory  |
|        | PUT|PATCH | manage/users/{user}/survey-assignments/{survey_assignment}                        | users.survey-assignments.update          | App\Http\Controllers\SurveyAssignmentsController@update                | web,auth,validateBackHistory  |
|        | GET|HEAD  | manage/users/{user}/survey-assignments/{survey_assignment}                        | users.survey-assignments.show            | App\Http\Controllers\SurveyAssignmentsController@show                  | web,auth,validateBackHistory  |
|        | GET|HEAD  | manage/users/{user}/survey-assignments/{survey_assignment}/edit                   | users.survey-assignments.edit            | App\Http\Controllers\SurveyAssignmentsController@edit                  | web,auth,validateBackHistory  |
|        | GET|HEAD  | manage/users/{user}/surveys                                                       | users.surveys.index                      | App\Http\Controllers\SurveysController@index                           | web,auth,validateBackHistory  |
|        | POST      | manage/users/{user}/surveys                                                       | users.surveys.store                      | App\Http\Controllers\SurveysController@store                           | web,auth,validateBackHistory  |
|        | GET|HEAD  | manage/users/{user}/surveys/create                                                | users.surveys.create                     | App\Http\Controllers\SurveysController@create                          | web,auth,validateBackHistory  |
|        | GET|HEAD  | manage/users/{user}/surveys/current                                               | users.surveys.current                    | App\Http\Controllers\SurveysController@showCurrentSurveys              | web,auth,validateBackHistory  |
|        | GET|HEAD  | manage/users/{user}/surveys/{survey}                                              | users.surveys.show                       | App\Http\Controllers\SurveysController@show                            | web,auth,validateBackHistory  |
|        | DELETE    | manage/users/{user}/surveys/{survey}                                              | users.surveys.destroy                    | App\Http\Controllers\SurveysController@destroy                         | web,auth,validateBackHistory  |
|        | PUT|PATCH | manage/users/{user}/surveys/{survey}                                              | users.surveys.update                     | App\Http\Controllers\SurveysController@update                          | web,auth,validateBackHistory  |
|        | GET|HEAD  | manage/users/{user}/surveys/{survey}/edit                                         | users.surveys.edit                       | App\Http\Controllers\SurveysController@edit                            | web,auth,validateBackHistory  |
|        | POST      | manage/users/{user}/surveys/{survey}/sections                                     | users.surveys.sections.store             | App\Http\Controllers\SectionsController@store                          | web,auth,validateBackHistory  |
|        | GET|HEAD  | manage/users/{user}/surveys/{survey}/sections/create                              | users.surveys.sections.create            | App\Http\Controllers\SectionsController@create                         | web,auth,validateBackHistory  |
|        | DELETE    | manage/users/{user}/surveys/{survey}/sections/{section}                           | users.surveys.sections.destroy           | App\Http\Controllers\SectionsController@destroy                        | web,auth,validateBackHistory  |
|        | GET|HEAD  | manage/users/{user}/surveys/{survey}/sections/{section}                           | users.surveys.sections.show              | App\Http\Controllers\SectionsController@show                           | web,auth,validateBackHistory  |
|        | PUT|PATCH | manage/users/{user}/surveys/{survey}/sections/{section}                           | users.surveys.sections.update            | App\Http\Controllers\SectionsController@update                         | web,auth,validateBackHistory  |
|        | GET|HEAD  | manage/users/{user}/surveys/{survey}/sections/{section}/edit                      | users.surveys.sections.edit              | App\Http\Controllers\SectionsController@edit                           | web,auth,validateBackHistory  |
|        | POST      | manage/users/{user}/surveys/{survey}/sections/{section}/questions                 | users.surveys.sections.questions.store   | App\Http\Controllers\QuestionsController@store                         | web,auth,validateBackHistory  |
|        | GET|HEAD  | manage/users/{user}/surveys/{survey}/sections/{section}/questions/create          | users.surveys.sections.questions.create  | App\Http\Controllers\QuestionsController@create                        | web,auth,validateBackHistory  |
|        | DELETE    | manage/users/{user}/surveys/{survey}/sections/{section}/questions/{question}      | users.surveys.sections.questions.destroy | App\Http\Controllers\QuestionsController@destroy                       | web,auth,validateBackHistory  |
|        | GET|HEAD  | manage/users/{user}/surveys/{survey}/sections/{section}/questions/{question}      | users.surveys.sections.questions.show    | App\Http\Controllers\QuestionsController@show                          | web,auth,validateBackHistory  |
|        | PUT|PATCH | manage/users/{user}/surveys/{survey}/sections/{section}/questions/{question}      | users.surveys.sections.questions.update  | App\Http\Controllers\QuestionsController@update                        | web,auth,validateBackHistory  |
|        | GET|HEAD  | manage/users/{user}/surveys/{survey}/sections/{section}/questions/{question}/edit | users.surveys.sections.questions.edit    | App\Http\Controllers\QuestionsController@edit                          | web,auth,validateBackHistory  |
|        | POST      | password/email                                                                    |                                          | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail  | web,guest                     |
|        | GET|HEAD  | password/reset                                                                    |                                          | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm | web,guest                     |
|        | POST      | password/reset                                                                    |                                          | App\Http\Controllers\Auth\ResetPasswordController@reset                | web,guest                     |
|        | GET|HEAD  | password/reset/{token}                                                            |                                          | App\Http\Controllers\Auth\ResetPasswordController@showResetForm        | web,guest                     |
|        | GET|HEAD  | register                                                                          |                                          | App\Http\Controllers\Auth\RegisterController@showRegistrationForm      | web,guest                     |
|        | POST      | register                                                                          |                                          | App\Http\Controllers\Auth\RegisterController@register                  | web,guest                     |
|        | GET|HEAD  | script-disabled                                                                   | no-script                                | Closure                                                                | web                           |
|        | GET|HEAD  | survey/question/question_type                                                     | getQuestionOption                        | Closure                                                                | web                           |
|        | POST      | updateTheme                                                                       | updateTheme                              | Closure                                                                | web                           |
+--------+-----------+-----------------------------------------------------------------------------------+------------------------------------------+------------------------------------------------------------------------+-------------------------------+
