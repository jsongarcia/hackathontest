<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SessionHandler;
use App\Http\Controllers\ReportHandler;
use App\Http\Controllers\AdminController;
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

Route::get('/editPersonalInfo', [SessionHandler::class, 'editPersonalInfo']);
Route::post('/updatePersonalInfo', [SessionHandler::class, 'updatePersonalInfo']);
Route::get("/home", [SessionHandler::class, 'toHome']);
Route::get("/logout", [SessionHandler::class, 'logout']);

Route::get("/education", [SessionHandler::class, 'educationHome']);
Route::get("/editEducation", [SessionHandler::class, 'editEducation']);
Route::post('/updateEducation', [SessionHandler::class, 'updateEducation']);

Route::get("/vocational", [SessionHandler::class, 'vocationalHome']);
Route::get("/editVocational/{id}", [SessionHandler::class, 'editVocational']);
Route::get("/vocational/addEntry", [SessionHandler::class, 'vocationalAdd']);
Route::post("/publishVocational", [SessionHandler::class, 'addVocational']);
Route::post("/publishVocational/{id}", [SessionHandler::class, 'publishVocational']);

Route::get("/college", [SessionHandler::class, 'collegeHome']);
Route::get("/editCollege/{id}", [SessionHandler::class, 'editCollege']);
Route::get("/college/addEntry", [SessionHandler::class, 'collegeAdd']);
Route::post("/publishCollege", [SessionHandler::class, 'addCollege']);
Route::post("/publishCollege/{id}", [SessionHandler::class, 'publishCollege']);

Route::get("/graduate", [SessionHandler::class, 'graduateHome']);
Route::get("/editGraduate/{id}", [SessionHandler::class, 'editGraduate']);
Route::get("/graduate/addEntry", [SessionHandler::class, 'graduateAdd']);
Route::post("/publishGraduate", [SessionHandler::class, 'addGraduate']);
Route::post("/publishGraduate/{id}", [SessionHandler::class, 'publishGraduate']);

Route::get("/civil", [SessionHandler::class, 'civilHome']);
Route::get("/editCivil/{id}", [SessionHandler::class, 'editCivil']);
Route::get("/civil/addEntry", [SessionHandler::class, 'civilAdd']);
Route::post("/publishCivil", [SessionHandler::class, 'addCivil']);
Route::post("/publishCivil/{id}", [SessionHandler::class, 'publishCivil']);

Route::get("/work", [SessionHandler::class, 'workHome']);
Route::get("/editWork/{id}", [SessionHandler::class, 'editWork']);
Route::get("/work/addEntry", [SessionHandler::class, 'workAdd']);
Route::post("/publishWork", [SessionHandler::class, 'addWork']);
Route::post("/publishWork/{id}", [SessionHandler::class, 'publishWork']);

Route::get("/cert", [SessionHandler::class, 'certHome']);
Route::get("/editCert/{id}", [SessionHandler::class, 'editCert']);
Route::get("/cert/addEntry", [SessionHandler::class, 'addCert']);
Route::post("/publishCert", [SessionHandler::class, 'certAdd']);
Route::post("/publishCert/{id}", [SessionHandler::class, 'publishCert']);

Route::get("/report",[ReportHandler::class, 'report']);
Route::get("/report/preview/", [ReportHandler::class, 'generateReport']);

//ADMIN FUNCTIONS

Route::get("/admin",[AdminController::class, 'index']);
Route::get("/admin/info",[AdminController::class, 'info']);
Route::get("/admin/info/generate",[AdminController::class, 'generate']);
Route::get("/admin/activate/{id}",[AdminController::class, 'activate']);
Route::get("/admin/logout",[AdminController::class, 'logout']);