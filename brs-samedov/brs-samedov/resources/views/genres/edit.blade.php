@extends('layouts.app')

@section('content')

<h1>Edit Genre</h1>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('genres.update', $genre) }}" method="post">
    @csrf
    @method('put')

    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $genre->name) }}" required>
    </div>

    <div>
        <label for="style">Style:</label>
        <select id="style" name="style" required>
            <option value="primary" {{ $genre->style == 'primary' ? 'selected' : '' }}>Primary</option>
            <option value="secondary" {{ $genre->style == 'secondary' ? 'selected' : '' }}>Secondary</option>
            <!-- Add other options for styles -->
        </select>
    </div>

    <button type="submit">Update Genre</button>
</form>

@endsection
