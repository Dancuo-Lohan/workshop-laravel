<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectManagerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::prefix('/developer')->name('developer.')->controller(DeveloperController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/new', 'create')->name('create');
    Route::post('/new', 'store');
    Route::get('/{developer:slug}/edit', 'edit')->name('edit');
    Route::post('/{developer:slug}/edit', 'update');
    Route::get('/{developer:slug}', 'show')->name('show');
});


Route::prefix('/administrator')->name('administrator.')->controller(AdministratorController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});


Route::prefix('/project-manager')->name('project-manager.')->controller(ProjectManagerController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/new', 'create')->name('create');
    Route::post('/new', 'store');
    Route::get('/{project-manager:slug}/edit', 'edit')->name('edit');
    Route::post('/{project-manager:slug}/edit', 'update');
    Route::get('/{project-manager:slug}', 'show')->name('show');
});


Route::prefix('/project')->name('project.')->controller(ProjectController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/new', 'create')->name('create');
    Route::post('/new', 'store');
    Route::get('/{project-manager:slug}/edit', 'edit')->name('edit');
    Route::post('/{project-manager:slug}/edit', 'update');
    Route::get('/{project-manager:slug}', 'show')->name('show');
});