<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectFormRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();
        return view('projects.list', [
            "projects" => $projects,
        ]); // projects/list.blade.php
    }
    public function create() {
        return view('projects.create');
    }
    public function store(ProjectFormRequest $request) {
        // $validatedData = $request->validate([
        //     "name"          => "required",
        //     "description"   => "nullable",
        //     "image_url"     => "nullable|url",
        // ]);
        // Project::create($validatedData); //save
        Project::create($request->validated()); //save
        return redirect("/projects");
    }
    public function show(Project $project) {
        // $project = Project::findOrFail($id);
        return view("projects.show", [
            "project" => $project,
        ]);
    }
    public function edit(Project $project) {
        // $project = Project::find($id);
        return view('projects.edit', [
            "project" => $project,
        ]);
    }
    public function update(Project $project, ProjectFormRequest $request) {
        // $validatedData = $request->validate([
        //     "name"          => "required",
        //     "description"   => "nullable",
        //     "image_url"     => "nullable|url",
        // ]);
        // $project = Project::find($id);
        // $project->update($validatedData); // save
        $project->update($request->validated()); // save
        return redirect("/projects/{$project->id}");
    }
    public function destroy(Project $project) {
        // $project = Project::find($id);
        $project->delete();
        return redirect("/projects");
    }
}
