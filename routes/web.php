<?php

namespace  App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('home', HomeController::class);
Route::resource('admin', AdminController::class);
Route::resource('group', GroupController::class);
Route::resource('category', CategoryController::class);
Route::resource('designation', DesignationController::class);
Route::resource('team_member', AdminController::class);
Route::resource('projects', AdminController::class);
Route::resource('tasks', AdminController::class);
Route::resource('productivity', AdminController::class);
Route::resource('reports', AdminController::class);
Route::resource('setting', AdminController::class);