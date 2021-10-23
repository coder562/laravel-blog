<?php

use App\Http\Controllers\Admin\AdminController as AdminAdminController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

// AdminController
Route::get('admin/index',[AdminController::class,'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// AdminController
Route::get('admin/dashboard',[AdminAdminController::class,'index']);
Route::get('admin/users',[UsersController::class,'index']);
Route::post('admin/users_update/{id}',[UsersController::class,'update']);
Route::post('admin/users_delete/{id}',[UsersController::class,'delete']);

// UserController
Route::get('user/dashboard',[UserController::class,'index']);

//category controller
Route::get('admin/category/index',[CategoryController::class,'index']);
Route::post('admin/category/store',[CategoryController::class,'store']);
Route::post('admin/category_update/{id}',[CategoryController::class,'update']);
Route::post('admin/category_delete/{id}',[CategoryController::class,'delete']);
