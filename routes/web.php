<?php

use App\Http\Controllers\TodoController;
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

/*Route::get('/', function () {
    return view('todo.layout');
});*/
Route::get('/',[TodoController::class,'all']);
Route::get('all',[TodoController::class,'all']);

Route::post('create',[TodoController::class,'create']);

Route::get('edit/{id}',[TodoController::class,'edit']);
Route::put('update/{id}',[TodoController::class,'update']);

Route::post('doing/{id}',[TodoController::class,'doing']);

Route::post('done/{id}',[TodoController::class,'done']);

//Route::get('delete/{id}',[TodoController::class,'delete']);

Route::delete('delete/{id}',[TodoController::class,'delete']);
