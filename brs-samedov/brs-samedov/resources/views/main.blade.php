@extends('layouts.main')

@section('content')
<div class="p-5 mb-4 bg-body-tertiary rounded-3">
  <h1>Main Page</h1>

  <p>Number of users in the system: {{ $userCount }}</p>
  <p>Number of genres: {{ $genreCount }}</p>
  <p>Number of books: {{ $bookCount }}</p>
  <p>Number of active book rentals: {{ $activeRentalsCount }}</p>

  <h2>List of Genres</h2>
  <ul>
      @foreach ($genres as $genre)
          <li><a href="{{ route('genres.show', $genre->id) }}">{{ $genre->name }}</a></li>
      @endforeach
  </ul>

  <h2>Search for Books</h2>
  <form action="{{ route('books.search') }}" method="GET">
    <input type="text" name="filter" placeholder="Search by title or author">
    <button type="submit">Search</button>
</form>
</div>
@endsection