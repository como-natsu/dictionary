<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DictionaryController;


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



Route::get('/',[DictionaryController::class,'index']);
Route::get('/register',[DictionaryController::class,'register']);
Route::post('/register',[DictionaryController::class,'store']);
Route::patch('/dictionary/update',[DictionaryController::class,'update']);
Route::delete('/delete',[DictionaryController::class,'destroy']);
Route::get('/search',[DictionaryController::class,'search']);

