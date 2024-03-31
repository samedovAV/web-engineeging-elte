@extends('layout')

@section('title', 'Transposer')

@section('content')

  <div class="container py-3">
    <h2>Transposer</h2>
    @isset($newKey)
      <div class="alert alert-success">
        New key is {{ $newKey }}.
      </div>
    @endisset

    <form action="{{ route('transposer') }}" method="get">
      <div class="form-group">
        <label for="key">Key</label>
        <input type="text" name="key" class="form-control @error('key') is-invalid @enderror" id="key" value="{{ !is_null(request('key')) ? request('key') : 'C' }}">
        @error('key')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="distance">Distance</label>
        <input type="text" name="distance" class="form-control @error('distance') is-invalid @enderror" id="distance" value="{{ !is_null(request('distance')) ? request('distance') : '2' }}">
        @error('distance')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>

    </form>
  </div>

@endsection