<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\LoginController;
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
    return;
})->middleware('logged');

Route::controller(LoginController::class)->middleware('logged')->group(function () {
    Route::get('/login', 'index')->name('home');
    Route::post('/login', 'authenticate')->name('login');
});

Route::prefix('/developer')->middleware('role:developer')->name('developer.')->controller(DeveloperController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/new', 'create')->name('create');
    Route::post('/new', 'store');
    Route::get('/{developer:slug}/edit', 'edit')->name('edit');
    Route::post('/{developer:slug}/edit', 'update');
    Route::get('/{developer:slug}', 'show')->name('show');
});

Route::prefix('/administrator')->middleware('role:admin')->name('administrator.')->controller(AdministratorController::class)->group(function () {
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
    Route::get('/{project:slug}/edit', 'edit')->name('edit');
    Route::post('/{project:slug}/edit', 'update');
    Route::get('/{project:slug}', 'show')->name('show');
});
