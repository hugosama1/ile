<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

Route::get('introduccion', function()
{
	return View::make('introduccion');
});


Route::get('menu-principal', function()
{
	return View::make('menu-principal');
});

Route::get('ejercicios-menu', function()
{
	return View::make('ejercicios-menu');
});


Route::get('graficas', function()
{
	return View::make('graficas');
});

Route::get('ejercicios', function()
{
	return View::make('ejercicios');
});

Route::get('lecciones', function()
{
	return View::make('lecciones');
});

Route::get('leccion-parser', function()
{
	return View::make('leccion-parser');
});
Route::get('leccion-bnf', function()
{
	return View::make('leccion-bnf');
});

Route::get('leccion-scanner', function()
{
	return View::make('leccion-scanner');
});

Route::get('ejercicio-bnf', function()
{
	return View::make('ejercicio-bnf');
});

Route::post('api/login', "UserController@login");

Route::get('api/emotion', "EmotionRecognition@detectEmotion");


Route::get('api/ejercicios', "ExerciseController@getExercise");
Route::post('api/save_exercise', "ExerciseController@saveExercise");
Route::post('api/last_exercise', "ExerciseController@getLastExercise");
Route::post('api/save_time', "ExerciseController@saveTime");
Route::post('api/save_picture', "ExerciseController@savePicture");
Route::post('api/get_bnf_response', "ExerciseController@getBnfResponse");
Route::post('api/save_finished_exercise', "ExerciseController@saveFinishedExercise");
Route::post('api/finished_exercises', "ExerciseController@getFinishedExercises"); 




Route::post('api/process_emotions', "EmotionRecognition@processEmotions");
Route::post('api/save_emotion', "EmotionRecognition@saveEmotion");

Route::get('prueba', function()
{
	return View::make('prueba');
});