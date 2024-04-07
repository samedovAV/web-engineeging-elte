    @extends('layouts.app')

@section('content')

<h1>Add New Genre</h1>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('genres.store') }}" method="post">
    @csrf

    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
    </div>

    <div>
        <label for="style">Style:</label>
        <select id="style" name="style" required>
            <option value="primary">Primary</option>
            <option value="secondary">Secondary</option>
            <option value="success">Success</option>
            <option value="danger">Danger</option>
            <option value="warning">Warning</option>
            <option value="info">Info</option>
            <option value="light">Light</option>
            <option value="dark">Dark</option>
        </select>
    </div>

    <button type="submit">Add Genre</button>
</form>

@endsection
