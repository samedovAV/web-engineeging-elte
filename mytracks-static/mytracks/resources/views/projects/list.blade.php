@extends('layout')

@section('title', 'Projects')

@section('content')

  <div class="container">
    <div class="row">

      @foreach($projects as $project)
        <div class="col-sm-3 my-3">
          <div class="card h-100">
            <img src="{{ $project['bg_url'] ?: 'https://imagazin.hu/wp-content/uploads/2017/12/apple_music.png' }}" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">{{ $project['name'] }}</h5>
              <p class="card-text">{{ $project['description'] }}</p>
            <p class="card-text"><small class="text-muted">Last modified: {{ $project['updated_at'] }}</small></p>
              <a href="{{ route('projects.show', ['project' => $project['id']]) }}" class="btn btn-primary">Open</a>
              <a href="{{ route('projects.edit', ['project' => $project['id']]) }}" class="btn btn-outline-primary">Edit</a>
              <form action="{{ route('projects.destroy', ['project' => $project['id']]) }}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <button class="btn btn-warning">Delete</button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
      
      <div class="col-sm-3 my-3">
        <div class="card h-100">
          <a href="{{ route('projects.create') }}" class="btn btn-secondary h-100 py-5">Create a new project</a>
        </div>
      </div>

    </div>
  </div>

@endsection