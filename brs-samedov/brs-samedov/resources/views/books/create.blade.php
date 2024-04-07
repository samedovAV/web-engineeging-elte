@extends('layouts.app')

@section('content')

<h1>Add New Book</h1>

<form action="{{ route('books.store') }}" method="post">
    @csrf

    <div>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        @error('title')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="authors">Authors:</label>
        <input type="text" id="authors" name="authors" value="{{ old('authors') }}" required>
        @error('authors')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="released_at">Released Date:</label>
        <input type="date" id="released_at" name="released_at" value="{{ old('released_at') }}" required>
        @error('released_at')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="pages">Pages:</label>
        <input type="number" id="pages" name="pages" value="{{ old('pages') }}" required>
        @error('pages')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <!-- Add other form fields for ISBN, description, genres, in_stock -->

    <button type="submit">Add Book</button>
</form>

@endsection
