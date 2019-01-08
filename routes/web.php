<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// CG: Add in route for each resource
Route::resource('courses', 'CourseController');
Route::resource('outcomes', 'OutcomeController');
Route::resource('topics', 'TopicController');
Route::resource('outcome_themes', 'OutcomeThemeController');
Route::resource('topic_themes', 'TopicThemeController');
Route::resource('levels', 'LevelController');
Route::resource('programs', 'ProgramController');
//
Route::get('programs/{id}/analyze', 'ProgramController@analyze');
