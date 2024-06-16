<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return redirect('posts');
});
Route::get('register/', [AuthController::class, 'register']);
Route::post('register/', [AuthController::class, 'register']);
Route::get('login/', [AuthController::class, 'login']);
Route::post('login/', [AuthController::class, 'login']);
Route::get('logout/', [AuthController::class, 'logout']);
Route::get('posts/', [UserController::class, 'posts']);

Route::get('makepost/', [AdminController::class, 'makepost']);
Route::post('makepost/', [AdminController::class, 'makepost']);

Route::get('makestyle/', [AdminController::class, 'makestyle']);
Route::post('makestyle/', [AdminController::class, 'makestyle']);

Route::get('users/', [AdminController::class, 'userlist']);


Route::get('user/{id}', [AdminController::class, 'user']);
Route::post('addstyle/', [AdminController::class, 'addstyle']);
Route::get('deletestyle/{user_id}/{style_id}', [AdminController::class, 'deletestyle']);


Route::get('selectstyle/{id}', [UserController::class, 'selectstyle']);
Route::post('selectstyle/{id}', [UserController::class, 'selectstyle']);
Route::get('select/{user_id}/{style_id}', [UserController::class, 'select']);
