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
Route::get('/AddQuestions/{id}','AddQuestion@index');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

