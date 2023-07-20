<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TraineeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

// Auth::routes();
// Route::get('/user',[TraineeController::class, 'abc'])->middleware('trainee');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

// Route::get('/aa', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('admin',[LoginController::class,'showLogin']);
Route::post('/admin',[LoginController::class,'adminLogin'])->name('admin.login-view');

Route::get('admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');

Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');


Route::get('/admin/dashboard',function(){
    return view('admin');
});
