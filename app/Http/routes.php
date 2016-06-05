<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::post('/salveazaUrl', [
        'uses' => 'forms\salveaza@salveazaForm',
        'as' => 'salveazaUrl',
        'middleware' => 'auth',

    ]);

    Route::get('/parse', [
        'uses' => 'parse@parseaza',
        'as' => 'parseaza',
        'middleware' => 'auth',

    ]);

    Route::get('/history', [
        'uses' => 'HomeController@history',
        'as' => 'istoric',
        'middleware' => 'auth',

    ]);
   /* Route::get('sendemail', [
        'uses' => 'sendmail@mail',
        'as' => 'mail',


    ]);*/




    

});