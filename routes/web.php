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


Route::get('/list', function () {
    return view('list');

});
Route::get('list','User@dbCheck'); 
Route::post('/dbcon',"Valid@submit");
Route::get('reg','User@reg'); 
Route::get('list2','User@Check');
Route::get('/register/{id}','register@reg');
Route::post('/register','register@register');
Route::get('/cr',"Cross@cross");
Route::get('/complaint',"register@complaint");
Route::get('/cncl',"register@cancel");
Route::post('/upload','register@upload'); 
Route::get('track','User@track'); 
Route::post('/trk',"Valid@track");