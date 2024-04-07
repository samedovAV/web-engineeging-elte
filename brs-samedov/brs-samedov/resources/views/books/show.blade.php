@extends('layouts.app')

@section('content')

<h1>Book Details</h1>
<h1>{{ $book->title }}</h1>

<p><strong>Author:</strong> {{ $book->author }}</p>
<p><strong>Genre:</strong> {{ $book->genre->name }}</p>
<p><strong>Date of Publish:</strong> {{ $book->released_at }}</p>
<p><strong>Number of Pages:</strong> {{ $book->pages }}</p>
<p><strong>Language:</strong> {{ $book->language_code }}</p>
<p><strong>ISBN Number:</strong> {{ $book->isbn }}</p>
<p><strong>Number of Copies in the Library (In Stock):</strong> {{ $book->in_stock }}</p>
<p><strong>Number of Available Books:</strong> {{ $book->in_stock - $book->borrows()->where('status', 'ACCEPTED')->count() }}</p>
<p><strong>Description:</strong> {{ $book->description }}</p>

@if ($book->cover_image)
    <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}">
@endif

<a href="{{ route('books.edit', $book) }}">Edit</a>

<form action="{{ route('books.destroy', $book) }}" method="post">
    @csrf
    @method('delete')
    <button type="submit">Delete</button>
</form>

@endsection