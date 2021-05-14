<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeeController;


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



// Trang Login
Route::get('/',[LoginController::class, 'index']);

// Trang employee
 Route::get('/layout-employee',[LoginController::class, 'employee']);

// Trang employee
 Route::get('/v1/user/form',[LoginController::class, 'form_employee']);

// Trang user đánh giá
Route::get('/form-user-danhgia',[LoginController::class, 'form_user_danhgia']);

// Trang admin
Route::get('/form-admin',[LoginController::class, 'form_admin']);

// Login post
Route::post('/user-dashboard',[LoginController::class, 'Dashboard']);

// employee đánh giá

Route::post('/v1/user/danhgia',[employeeController::class, 'danh_gia']);

//  Xem kết quả đánh giá
Route::get('/v1/user/score',[employeeController::class, 'show_danh_gia']);

//  Show profit
Route::get('/v1/user/{id}',[employeeController::class, 'show_profit']);

//  Update profit
Route::post('/v1/user/update/{id}',[employeeController::class, 'update_profit']);





