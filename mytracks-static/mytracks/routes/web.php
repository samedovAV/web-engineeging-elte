<?php

use App\Http\Controllers\ProjectController;
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
    $noProject = 42;
    return view('main', [
        // "numberOfProjects" => 42,
        "numberOfProjects" => $noProject,
    ]); // main.blade.php
});

Route::get('/projects', [ProjectController::class, "list"]);

Route::get('/projects/create', [ProjectController::class, "create"]);

Route::post('/projects/create', [ProjectController::class, "store"]);