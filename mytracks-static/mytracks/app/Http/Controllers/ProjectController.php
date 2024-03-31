<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectFormRequest;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// php artisan make:controller ProjectController
class ProjectController extends Controller
{
  public function index()
  {
    return view('projects.list', [
      'projects' => Auth::user()->projects,
    ]);
  }

  public function show(Project $project)
  {
    $this->authorize('access', $project);
    $project->load('tracks.filters');
    return view('projects.show', compact('project'));
  }

  public function create()
  {
    return view('projects.create');
  }

  public function store(ProjectFormRequest $request) 
  {
    $data = $request->validated();
    $data['user_id'] = Auth::id();
    Project::create($data);
    return redirect()->route('projects.index');
  }

  public function edit(Project $project)
  {
    $this->authorize('access', $project);
    return view('projects.edit', compact('project'));
  }

  public function update(ProjectFormRequest $request, Project $project) 
  {
    $this->authorize('access', $project);
    $project->update($request->validated());
    return redirect()->route('projects.index');
  }

  public function destroy(Project $project)
  {
    $this->authorize('access', $project);
    $project->delete();
    return redirect()->route('projects.index');
  }
}
