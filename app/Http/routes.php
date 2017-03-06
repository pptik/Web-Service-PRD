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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/a', function () {
    return 'welcome';
});

Route::get('/topik', 'CTopik@daftar');
Route::get('/universities', 'CUniversities@daftar');
Route::get('/registrationroles', 'CRoles@registrationroles');
Route::post('/login', 'CUsers@login');
Route::post('/register', 'CUsers@register');
