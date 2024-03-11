<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function list() {
        $projects = Project::all();
        return view('projects.list', [
            "projects" => $projects,
        ]); // projects/list.blade.php
    }
    public function create() {
        return view('projects.create');
    }
    public function store(Request $request) {
        $validatedData = $request->validate([
            "name"          => "required",
            "description"   => "nullable",
            "image_url"     => "nullable|url",
        ]);
        Project::create($validatedData); //save
        return redirect("/projects");
    }
    public function show($id) {
        $project = Project::find($id);
        return view("projects.show", [
            "project" => $project,
        ]);
    }
    public function edit($id) {
        $project = Project::find($id);
        return view('projects.edit', [
            "project" => $project,
        ]);
    }
    public function update($id, Request $request) {
        $validatedData = $request->validate([
            "name"          => "required",
            "description"   => "nullable",
            "image_url"     => "nullable|url",
        ]);
        $project = Project::find($id);
        $project->update($validatedData); // save
        return redirect("/projects/{$id}");
    }
    public function delete($id) {
        $project = Project::find($id);
        $project->delete();
        return redirect("/projects");
    }
}
