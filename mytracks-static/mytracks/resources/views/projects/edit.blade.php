@extends('layout')

@section('title', 'New project')

@section('content')
    
  <div class="container py-3">
    <h2>Edit project (id = {{ $project['id'] }})</h2>
    <form action="{{ route('projects.update', ['project' => $project['id']]) }}" method="POST">
      @csrf
      @method('put')

      <div class="form-group">
        <label for="name">Project name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $project['name']) }}">
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3">{{ old('description', $project['description']) }}</textarea>
        @error('description')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="image_url">Background image URL</label>
        <input type="text" name="bg_url" class="form-control @error('bg_url') is-invalid @enderror" id="image_url" value="{{ old('bg_url', $project['bg_url']) }}" placeholder="http://example.com/image.png">
        @error('bg_url')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Update project</button>
      </div>

    </form>
  </div>

@endsection