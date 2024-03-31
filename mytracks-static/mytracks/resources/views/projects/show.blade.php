@extends('layout')

@section('title', $project['name'])

@section('content')

  <div class="container">
    <div class="card w-100">
      <div class="d-flex no-gutters bg-dark text-light">
        <div class="flex-grow-1">
          <img src="{{ $project['bg_url'] ?: 'https://imagazin.hu/wp-content/uploads/2017/12/apple_music.png' }}" class="card-img-top float-right" style="max-width: 320px;">
          <div class="card-body">
            <h4 class="card-title">{{ $project['name'] }}</h4>
            <p class="card-text">{{ $project['description'] }}</p>
            <a href="{{ route('projects.show', ['project' => $project['id']]) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('projects.destroy', ['project' => $project['id']]) }}" method="post" class="d-inline">
              @csrf
              @method('delete')
              <button class="btn btn-warning">Delete</button>
            </form>
          </div>
        </div>
        {{-- <div class="" style="width: 320px;"> --}}
        {{-- </div> --}}
      </div>
      <div class="card-body">
        <a href="{{ route('projects.tracks.create', ['project' => $project['id']]) }}" class="btn btn-primary">Add new track</a>
        <ul class="list-group list-group-flush">
          @foreach ($project->tracks as $track)
            <li class="list-group-item list-group-item-action" style="border-left: 30px solid {{ $track['color'] }}">
              <div class="d-flex justify-content-between align-items-center my-0">
                <span> 
                  {{ $track['name'] }} 
                  {{-- <small>{{ $track['filename'] }}</small> --}}
                  @isset($track['filename'])
                    <audio controls src="{{ Storage::url($track['filename']) }}">
                  @endisset
                </span>
                <div>
                  {{-- <span class="badge badge-primary badge-pill">Muted</span> --}}
                  <a href="{{ route('tracks.edit', ['track' => $track['id']]) }}" class="btn btn-primary btn-sm">Edit</a>
                  <form action="{{ route('tracks.destroy', ['track' => $track['id']]) }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-warning btn-sm">Delete</button>
                  </form>
                </div>
              </div>
              @foreach ($track->filters as $filter)
                <span class="badge badge-secondary">{{ $filter['name'] }}</span>
              @endforeach
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>

@endsection