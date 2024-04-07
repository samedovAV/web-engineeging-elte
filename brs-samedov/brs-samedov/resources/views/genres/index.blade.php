@extends('layouts.app')

@section('content')

<h1>Genre List</h1>

<ul>
    @foreach($genres as $genre)
        <li>
            {{ $genre->name }} - {{ $genre->style }}
            <a href="{{ route('genres.edit', $genre) }}">Edit</a>
            <form action="{{ route('genres.destroy', $genre) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>

<a href="{{ route('genres.create') }}">Add New Genre</a>

@endsection
