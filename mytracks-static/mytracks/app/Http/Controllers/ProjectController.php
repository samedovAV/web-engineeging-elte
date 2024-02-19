<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function list() {
        $projects = [
            "name" => "my project 1"
        ];
        return view('projects', [
            "projects.list" => $projects,
        ]);
    }
    //

    public function create() {
        return view('projects.create');
    }
}
