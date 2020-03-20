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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('Crud', 'CRUDController');

Route::get('Trash', 'TrashController@index');
Route::get('Trash/RestoreAll', 'TrashController@restoreAll');
Route::get('Trash/DeleteAll', 'TrashController@deleteAll');
Route::get('Trash/Restore/{id}', 'TrashController@restore');
Route::get('Trash/Delete/{id}', 'TrashController@restore');