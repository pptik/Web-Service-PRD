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
Route::get('/dashboard_topics', 'CTopik@topik_dashboard');
Route::get('/universities', 'CUniversities@daftar');
Route::get('/registrationroles', 'CRoles@registrationroles');
Route::post('/topik_yang_sudah_dikerjakan', 'CTopik@topik_yang_sudah_dikerjakan');
Route::post('/nama_universitas', 'CUniversities@nama_universitas');
Route::post('/login', 'CUsers@login');
Route::post('/register', 'CUsers@register');
Route::post('/ambil_profile', 'CUsers@ambil_profile');
Route::post('/ubah_profile', 'CUsers@ubah_profile');
Route::post('/jumlah_sub_topik_dashboard', 'CTopik@jumlah_sub_topik_dashboard');
Route::post('/judul_bimbingan', 'CBimbingan@ambil_judul');

