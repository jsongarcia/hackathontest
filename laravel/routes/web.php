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

Route::get("/education/home", [SessionHandler::class, 'educationHome']);

Route::get("/vocational/home", [SessionHandler::class, 'vocationalHome']);
Route::get("/vocational", [SessionHandler::class, 'vocational']);
Route::post("/publishVocational", [SessionHandler::class, 'addVocational']);
Route::post("/publishVocational/{id}", [SessionHandler::class, 'editVocational']);

Route::get("/college/home", [SessionHandler::class, 'collegeHome']);
Route::get("/college", [SessionHandler::class, 'college']);
Route::post("/publishCollege", [SessionHandler::class, 'addCollege']);
Route::post("/publishCollege/{id}", [SessionHandler::class, 'editCollege']);

Route::get("/graduate/home", [SessionHandler::class, 'graduateHome']);
Route::get("/graduate", [SessionHandler::class, 'graduate']);
Route::post("/publishGraduate", [SessionHandler::class, 'addGraduate']);
Route::post("/publishGraduate/{id}", [SessionHandler::class, 'editGraduate']);

Route::get("/civil/home", [SessionHandler::class, 'civilHome']);
Route::get("/civil", [SessionHandler::class, 'civil']);
Route::post("/publishCivil", [SessionHandler::class, 'addCivil']);
Route::post("/publishCivil/{id}", [SessionHandler::class, 'editCivil']);

Route::get("/work", [SessionHandler::class, 'work']);
Route::get("/work/home", [SessionHandler::class, 'workHome']);
Route::post("/publishWork", [SessionHandler::class, 'addWork']);
Route::post("/publishWork/{id}", [SessionHandler::class, 'editWork']);

Route::get("/cert/home", [SessionHandler::class, 'certHome']);