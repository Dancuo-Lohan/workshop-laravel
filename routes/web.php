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

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


// #####################################################
// #####################################################
// #####################################################
// Routes de l'admin
Route::prefix('/administrator')->middleware('role:admin')->name('administrator.')->controller(AdministratorController::class)->group(function () {
    Route::get('/', 'index')->name('index');

    Route::prefix('/projectManager')->name('projectManager.')->controller(AdministratorController::class)->group(function () {
        Route::get('/', 'projectManager')->name('index');
        Route::get('/new', 'createProjectManager')->name('create');
        Route::post('/new', 'storeProjectManager');
        Route::get('/{projectManager:slug}/edit', 'editProjectManager')->name('edit');
        Route::post('/{projectManager:slug}/edit', 'updateProjectManager');
        Route::get('/{projectManager:slug}', 'showProjectManager')->name('show');
    });

    Route::prefix('/client')->name('client.')->controller(AdministratorController::class)->group(function () {
        Route::get('/', 'client')->name('index');
        Route::get('/new', 'createClient')->name('create');
        Route::post('/new', 'storeClient');
        Route::get('/{client:slug}/edit', 'editClient')->name('edit');
        Route::post('/{client:slug}/edit', 'updateClient');
        Route::get('/{client:slug}', 'showClient')->name('show');
    });

    Route::prefix('/developer')->name('developer.')->controller(AdministratorController::class)->group(function () {
        Route::get('/', 'developer')->name('index');
        Route::get('/new', 'createDeveloper')->name('create');
        Route::post('/new', 'storeDeveloper');
        Route::get('/{developer:id}/edit', 'editDeveloper')->name('edit');
        Route::post('/{developer:id}/edit', 'updateDeveloper');
        Route::get('/{developer:id}', 'showDeveloper')->name('show');
    });

    Route::prefix('/project')->name('project.')->controller(AdministratorController::class)->group(function () {
        Route::get('/', 'project')->name('index');
        Route::get('/new', 'createProject')->name('create');
        Route::post('/new', 'storeProject');
        Route::get('/{project:slug}/edit', 'editProject')->name('edit');
        Route::post('/{project:slug}/edit', 'updateProject');
        Route::get('/{project:slug}', 'showProject')->name('show');
    });

    Route::prefix('/task')->name('task.')->controller(AdministratorController::class)->group(function () {
        Route::get('/', 'task')->name('index');
        Route::get('/new', 'createTask')->name('create');
        Route::post('/new', 'storeTask');
        Route::get('/{task:slug}/edit', 'editTask')->name('edit');
        Route::post('/{task:slug}/edit', 'updateTask');
        Route::get('/{task:slug}', 'showTask')->name('show');
    });
});



// #####################################################
// #####################################################
// #####################################################
// Routes du chef de projet
Route::prefix('/projectManager')->name('projectManager.')->controller(ProjectManagerController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/new', 'create')->name('create');
    Route::post('/new', 'store');
    Route::get('/{projectManager:slug}/edit', 'edit')->name('edit');
    Route::post('/{projectManager:slug}/edit', 'update');
    Route::get('/{projectManager:slug}', 'show')->name('show');
});



// #####################################################
// #####################################################
// #####################################################
// Routes du développeur
Route::prefix('/developer')->middleware('role:developer')->name('developer.')->controller(DeveloperController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/new', 'create')->name('create');
    Route::post('/new', 'store');
    Route::get('/{developer:slug}/edit', 'edit')->name('edit');
    Route::post('/{developer:slug}/edit', 'update');
    Route::get('/{developer:slug}', 'show')->name('show');
});



Route::prefix('/project')->name('project.')->controller(ProjectController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/new', 'create')->name('create');
    Route::post('/new', 'store');
    Route::get('/{project:slug}/edit', 'edit')->name('edit');
    Route::post('/{project:slug}/edit', 'update');
    Route::get('/{project:slug}', 'show')->name('show');
});
