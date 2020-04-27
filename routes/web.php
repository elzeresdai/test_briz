<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','UserPhoneController@index');
Route::get('/{id}', ['as' => 'edit_user', 'uses' => 'UserPhoneController@edit']);
Route::post('update_user_info', ['as' => 'update_user_info', 'uses' => 'UserPhoneController@update']);
