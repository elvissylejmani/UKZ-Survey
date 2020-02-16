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


Route::resource('/Survey','SurveyController')->middleware('auth');
Route::resource('/Question','QuestionController')->middleware('auth');
Route::resource('/Answer','AnswerController')->middleware('auth');
Route::resource('/Professor','ProfessorController')->middleware('auth');
Route::resource('/Classes','ClassesController')->middleware('auth');
Route::resource('Groups','GroupsController')->middleware('auth');
Route::resource('/Users','UsersController')->middleware('auth');
Route::post('/Classes/{id}/addprof','ClassesController@addprof')->middleware('auth');
Route::get('/AddQuestions/{id}','AddQuestion@index')->middleware('auth');
Route::get('Professor/delete/{id}', ['as' => 'Professor.delete', 'uses' => 'ProfessorController@destroy'])->middleware('auth');
Route::post('/import','ExcelController@import')->name('import')->middleware('auth');
Route::get('/Classes/Group/Stud','ClassesController@AddStud');
Route::get('/Professor/{id}/Survey','ProfessorController@SurveyData');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

