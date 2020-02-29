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

// use Illuminate\Routing\Route;
// use Illuminate\Support\Facades\Auth;


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
Route::get('/Professor/{id}/Survey','ProfessorController@SurveyData')->middleware(CheckRole::class);
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

