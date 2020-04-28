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
Route::get('delete_user/{id}', ['as' => 'delete_user', 'uses' => 'UserPhoneController@destroy']);
Route::get('/{id}', ['as' => 'edit_user', 'uses' => 'UserPhoneController@edit']);
Route::post('create_user', ['as' => 'create_user', 'uses' => 'UserPhoneController@store']);
Route::post('update_user_info', ['as' => 'update_user_info', 'uses' => 'UserPhoneController@update']);
Route::post('del_number', ['as' => 'del_number', 'uses' => 'PhoneController@delIssetNumber']);
