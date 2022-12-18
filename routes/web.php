<?php

use App\Http\Controllers\UserController;
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

Route::get('/users/list', 'UserController@listOfUsers')->middleware('auth');
Route::get('/users/todolist', 'TodoController@listOfToDos')->name('toDoLists.listOfToDos')->middleware('auth');
Route::get('/users/todolist/create', 'TodoController@create')->name('toDoLists.create')->middleware('auth');
Route::post('/users/todolist', 'TodoController@store')->name('toDoLists.store')->middleware('auth');
Route::get('/users/todolist/edit/{id}', 'TodoController@edit')->name('toDoLists.edit')->middleware('auth');
Route::post('/users/todolist/{toDoLists}', 'TodoController@update')->name('toDoLists.update')->middleware('auth');
Route::delete('/users/todolist/{id}', 'TodoController@destroy')->name('toDoLists.destroy')->middleware('auth');

Route::delete('/users/{id}', 'UserController@destroy')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
