<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function list() {
        $projects = [
            [ "name" => "my project 1" ],
            [ "name" => "my project 2" ],
            [ "name" => "my project 3" ],
        ];
        return view('projects.list', [
            "projects" => $projects,
        ]); // projects.blade.php
    }

    public function create() {
        return view('projects.create');
    }

    public function store(Request $request) {
        $request->validate([
            "name" => "required",
            "description" => "nullable",
            "image_url" => "nullable|url",
        ]);
    }
}
