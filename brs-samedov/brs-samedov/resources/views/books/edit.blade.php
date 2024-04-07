@extends('layouts.app')

@section('content')

<h1>Edit Book</h1>

<form action="{{ route('books.update', $book) }}" method="post">
    @csrf
    @method('put')

    <div>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}" required>
        @error('title')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="authors">Authors:</label>
        <input type="text" id="authors" name="authors" value="{{ old('authors', $book->authors) }}" required>
        @error('authors')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <!-- Add other form fields for editing -->

    <button type="submit">Update Book</button>
</form>

@endsection
