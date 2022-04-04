<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SessionHandler;
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

Route::get('/', [SessionHandler::class, 'index']);
Route::post('/', [SessionHandler::class, 'index']);
Route::get("/register", [SessionHandler::class, 'toRegister']);
Route::post('/addUser', [SessionHandler::class, 'addUser']);
Route::post('/updateEducation', [SessionHandler::class, 'updateEducation']);
Route::post('/updatePersonalInfo', [SessionHandler::class, 'updatePersonalInfo']);
Route::get("/home", [SessionHandler::class, 'toHome']);
Route::get("/logout", [SessionHandler::class, 'logout']);

Route::get("/vocational", [SessionHandler::class, 'vocational']);
Route::post("/publishVocational", [SessionHandler::class, 'addVocational']);
Route::post("/publishVocational/{id}", [SessionHandler::class, 'editVocational']);