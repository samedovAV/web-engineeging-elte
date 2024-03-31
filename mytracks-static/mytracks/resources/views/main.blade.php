@extends('layout')

@section('title', 'Main page')

@section('content')
  <div class="jumbotron">
    <h1 class="display-4">MyTracks</h1>
    <p class="lead">A place where you can store, edit and view your music projects.</p>
    <hr class="my-4">
    <p>There are already {{ $number_of_tracks }} tracks in our system.</p>
    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
  </div>
@endsection
