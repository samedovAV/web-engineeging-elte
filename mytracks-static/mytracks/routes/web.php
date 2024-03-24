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

// // listing
// Route::get('/projects', [ProjectController::class, "list"])->name("projects.list"); 
// // creating a project
// Route::get('/projects/create', [ProjectController::class, "create"]); 
// Route::post('/projects/create', [ProjectController::class, "store"]);
// // show one project
// Route::get('/projects/{project}', [ProjectController::class, "show"]);
// // editing a project
// Route::get('/projects/{project}/edit', [ProjectController::class, "edit"]);
// Route::post('/projects/{project}/edit', [ProjectController::class, "update"]);
// // deleting a project
// Route::post('/projects/{project}/delete', [ProjectController::class, "delete"]);
Route::resource('projects', ProjectController::class);