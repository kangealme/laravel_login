<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\SubmenuController;
use App\Http\Controllers\user\AdminController;
use App\Http\Controllers\User\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//Auth
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerStore']);
Route::get('/', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'loginHandler']);
Route::get('/logout', [AuthController::class, 'logout']);

//Admin
Route::get('/listUserAdmin', [AdminController::class, 'listUser']);
Route::get('/editUserAdmin/{id}', [AdminController::class, 'editUser']);
Route::delete('/delUserAdmin/{id}', [AdminController::class, 'delUser']);

//User
Route::get('/profiluser', [UserController::class, 'profilUser']);
Route::get('/edituser', [UserController::class, 'editUser']);
Route::post('/updateUser', [UserController::class, 'updateUser']);
Route::get('/listUser', [UserController::class, 'listUser']);

//Menu
// Route::get('/menu/{subMenu}', [SubmenuController::class, 'pilih']);
