<?php

use App\Http\Controllers\ProjectController;
use App\Models\Project;
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
    $noProject = Project::count();
    return view('main', [
        // "numberOfProjects" => 42,
        "numberOfProjects" => $noProject,
    ]); // main.blade.php
});

Route::get('/projects', [ProjectController::class, "list"]);
Route::get('/projects/create', [ProjectController::class, "create"]);
Route::post('/projects/create', [ProjectController::class, "store"]);
Route::get('/projects/{id}', [ProjectController::class, "show"]);

Route::get('/projects/{id}/edit', [ProjectController::class, "edit"]);
Route::post('/projects/{id}/edit', [ProjectController::class, "update"]);

Route::post('/projects/{id}/delete', [ProjectController::class, "delete"]);
