<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionaireController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'questionaires', 'namespace' => '\App\Http\Controllers'], function () {
    Route::post('', 'QuestionaireController@store');
    Route::get('/create', 'QuestionaireController@create');
    Route::put('/{questionaire}/update', 'QuestionaireController@update')->name('questionaires.questionaire.update');
    Route::get('/{questionaire}/edit', 'QuestionaireController@edit');
    Route::get('/{questionaire}', 'QuestionaireController@show');

    Route::group(['prefix' => '/{questionaireId}'], function () {
       Route::get('/questions/create', 'QuestionController@create');
       Route::post('/questions', 'QuestionController@store');
    });
});

Route::get('surveys/{questionaire}-{slug}', [SurveyController::class, 'show']);

Route::post('surveys/{questionaire}-{slug}', [SurveyController::class, 'store']);
