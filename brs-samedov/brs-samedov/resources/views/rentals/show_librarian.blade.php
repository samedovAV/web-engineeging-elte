@extends('layouts.app')

@section('content')

<h1>Rental Details (Librarian)</h1>

<h2>Rental Data</h2>
<p>Book: {{ $rental->book->title }}</p>
<p>Author: {{ $rental->book->author }}</p>
<!-- Add other rental data -->

<h2>Librarian Actions</h2>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('rentals.update.librarian', $rental) }}" method="post">
    @csrf
    @method('put')

    <div>
        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="PENDING" {{ $rental->status == 'PENDING' ? 'selected' : '' }}>Pending</option>
            <option value="ACCEPTED" {{ $rental->status == 'ACCEPTED' ? 'selected' : '' }}>Accepted</option>
            <option value="REJECTED" {{ $rental->status == 'REJECTED' ? 'selected' : '' }}>Rejected</option>
            <option value="RETURNED" {{ $rental->status == 'RETURNED' ? 'selected' : '' }}>Returned</option>
        </select>
    </div>

    <div>
        <label for="deadline">Deadline:</label>
        <input type="date" id="deadline" name="deadline" value="{{ old('deadline', $rental->deadline) }}">
    </div>

    <button type="submit">Update Rental</button>
</form>

@endsection
