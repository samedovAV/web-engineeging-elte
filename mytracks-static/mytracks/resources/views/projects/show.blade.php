@extends('layouts.main')

@section('content')
<div class="container py-3">
  <h2>{{ $project->name }}</h2>
  <p>{{ $project->description }}</p>
  <p>
    <a href="{{ route('projects.edit', ['project' => $project->id]) }}" class="btn btn-secondary">Edit project</a>
    <form action="{{ route('projects.destroy', ['project' => $project->id]) }}" method="post" class="d-inline-block">
      @csrf
      @method("DELETE")
      <button type="submit" class="btn btn-danger">Delete project</button>
    </form>
    <a href="new-track.html" class="btn btn-primary">Add new track</a>
  </p>
  <div class="list-group">
    
    @foreach($project->tracks as $track)
    <a href="#" class="list-group-item list-group-item-action" style="background-color: {{ $track->color }} ">
      <p class="d-flex justify-content-between align-items-center">
        <span> 
          {{ $track->name }} 
          <small>{{ $track->filename }}</small>
        </span>
        <span class="badge badge-primary badge-pill">Muted</span>
      </p>
      <ul class="list-group list-group-horizontal">
        <li class="list-group-item p-1">Cras justo odio</li>
        <li class="list-group-item p-1">Dapibus ac facilisis in</li>
        <li class="list-group-item p-1">Morbi leo risus</li>
      </ul>
    </a>
    @endforeach

  </div>
</div>
@endsection
