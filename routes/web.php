<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [FrontendController::class, 'welcome']);
Route::get('/about', [FrontendController::class, 'about']);
Route::get('/contact', [FrontendController::class, 'contact']);
Route::get('/admin', [FrontendController::class, 'admin']);

// Department 
Route::get('/depart', [DepartmentController::class,'index']);
Route::post('/depart/insert',[DepartmentController::class, 'insert']);
Route::get('/depart/delete/{depart_id}',[DepartmentController::class,'delete']);
Route::get('/depart/edit/{depart_id}',[DepartmentController::class,'edit']);
Route::post('/depart/update', [DepartmentController::class,'updated']);
Route::get('/depart/restore/{depart_id}',[DepartmentController::class,'restore']);
Route::get('/depart/permanent/delete/{depart_id}',[DepartmentController::class,'p_delete']);
Route::get('/depart/trashed',[DepartmentController::class,'trashed']);


// Employee
Route::get('/employ',[EmployeeController::class, 'index']);
Route::post('/employ/insert',[EmployeeController::class,'insert']);
Route::get('/employ/delete/{employ_id}',[EmployeeController::class, 'delete']);
Route::get('/employ/edit/{employ_id}',[EmployeeController::class,'edit']);
Route::post('/employ/update', [EmployeeController::class, 'updated']);
Route::get('/employ/restore/{employ_id}',[EmployeeController::class,'restore']); 
Route::get('/employ/permanent/delete/{employ_id}',[EmployeeController::class,'p_delete']);
Route::get('/employ/trashed',[EmployeeController::class, 'trashed']);
// users
Route::post('/add/users', [HomeController::class, 'add_users']);

//profile
Route::get('/profile/edit', [ProfileController::class, 'profile']);
Route::post('/profile/update', [ProfileController::class, 'update']);
Route::post('/password/update', [ProfileController::class, 'pass_update']);
Route::post('/photo/change', [ProfileController::class, 'photo_edit']); 
