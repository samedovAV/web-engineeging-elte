@extends('layout')

@section('title', 'New project')

@section('content')
    
  <div class="container py-3">
    <h2>New project</h2>
    <form action="{{ route('projects.store') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="name">Project name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', '') }}">
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3">{{ old('description', '') }}</textarea>
        @error('description')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="image_url">Background image URL</label>
        <input type="text" name="bg_url" class="form-control @error('bg_url') is-invalid @enderror" id="image_url" value="{{ old('bg_url', '') }}" placeholder="http://example.com/image.png">
        @error('bg_url')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Add new project</button>
      </div>

    </form>
  </div>

@endsection