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
use App\Http\Middleware\CheckRole;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::resource('/Survey','SurveyController')->middleware('auth');
Route::resource('/Question','QuestionController')->middleware('auth');
Route::resource('/Answer','AnswerController')->middleware('auth');
Route::resource('/Professor','ProfessorController')->middleware(CheckRole::class);
Route::resource('/Classes','ClassesController')->middleware(CheckRole::class);
Route::resource('Groups','GroupsController')->middleware(CheckRole::class);
Route::resource('/Users','UsersController')->middleware(CheckRole::class);
Route::post('/Classes/{id}/addprof','ClassesController@addprof')->middleware(CheckRole::class);
Route::get('/AddQuestions/{id}','AddQuestion@index')->middleware(CheckRole::class);
Route::get('Professor/delete/{id}', ['as' => 'Professor.delete', 'uses' => 'ProfessorController@destroy'])->middleware(CheckRole::class);
Route::post('/import','ExcelController@import')->name('import')->middleware(CheckRole::class);
Route::get('/Classes/Group/Stud','ClassesController@AddStud')->middleware(CheckRole::class);
Route::get('/Survey/Manage/all','SurveyController@ManageSurveys')->middleware(CheckRole::class);
Route::get('/Survey/Show/all','SurveyController@ShowSurvey')->middleware(CheckRole::class);
Route::get('/Professor/add/new','ProfessorController@add')->middleware(CheckRole::class);
Route::get('/Professor/view/all','ProfessorController@viewall')->middleware(CheckRole::class);
Route::get('/Classes/add/new','ClassesController@add')->middleware(CheckRole::class);
Route::get('/Classes/view/all','ClassesController@viewall')->middleware(CheckRole::class);
Route::get('/Groups/add/new','GroupsController@add')->middleware(CheckRole::class);
Route::get('/Groups/view/all','GroupsController@viewall')->middleware(CheckRole::class);
Route::get('/Users/view/all','StudentsViewController@viewall')->middleware(CheckRole::class);
Route::get('/Users/add/new','StudentsViewController@add')->middleware(CheckRole::class);
Route::get('/Professor/{id}/Survey','ProfessorController@SurveyData')->middleware(CheckRole::class);
Route::post('/Question/{id}/Survey','QuestionController@addQuestions')->middleware(CheckRole::class);
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

