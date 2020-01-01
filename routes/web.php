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

// use Illuminate\Routing\Route;
// use Illuminate\Support\Facades\Auth;


Route::resource('/Survey','SurveyController');
Route::resource('/Question','QuestionController');
Route::resource('/Answer','AnswerController');
Route::resource('/Professor','ProfessorController');
Route::resource('/Classes','ClassesController');
Route::resource('Groups','GroupsController');
Route::post('/Classes/{id}/addprof','ClassesController@addprof');
Route::get('/AddQuestions/{id}','AddQuestion@index');
Route::get('Professor/delete/{id}', ['as' => 'Professor.delete', 'uses' => 'ProfessorController@destroy']);
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

