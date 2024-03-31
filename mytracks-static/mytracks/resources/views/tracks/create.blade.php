@extends('layout')

@section('title', 'New track')

@section('content')
    
<div class="container py-3">
  <h2>New track</h2>
  <form action="{{ route('projects.tracks.store', ['project' => $id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="form-group">
      <label for="name">Track name</label>
      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', '') }}">
      @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form-group">
      <label for="file">Audio file</label>
      <input type="file" name="file" class="form-control-file @error('file') is-invalid @enderror" id="file">
      @error('file')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form-group">
      <label for="color">Color</label>
      <input type="color" name="color" class="form-control @error('color') is-invalid @enderror" id="color" value="{{ old('color', '#ffffff') }}">
      @error('color')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <div class="form-group d-flex flex-wrap">
      @foreach ($filters as $filter)
        <div class="custom-control custom-switch col-sm-2">
          <input type="checkbox" class="custom-control-input" name="filters[]" id="filter-{{ $filter['id'] }}" value="{{ $filter['id'] }}">
          <label class="custom-control-label" for="filter-{{ $filter['id'] }}">
            {{ $filter['name'] }}
          </label>
        </div>
      @endforeach
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary">Add new track</button>
    </div>

  </form>
</div>

@endsection