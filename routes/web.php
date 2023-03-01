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
Route::resource('team', TeamController::class);
Route::post('fetchcategory/{id}',[TeamController::class,'category']);
Route::resource('projects', ProjectsController::class);
Route::resource('tasks', TaskController::class);
Route::resource('productivity', ProductivityController::class);
Route::resource('reports', AdminController::class);
Route::resource('setting', SettingsController::class);