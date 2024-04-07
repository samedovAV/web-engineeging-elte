@extends('layouts.app')

@section('content')

<h1>My Rentals</h1>

<h2>Pending Rentals</h2>
<ul>
    @foreach ($pendingRentals as $rental)
        <li>
            <strong>Title:</strong> {{ $rental->book->title }}<br>
            <strong>Author:</strong> {{ $rental->book->author }}<br>
            <strong>Date of Rental:</strong> {{ $rental->created_at }}<br>
            <strong>Deadline:</strong> {{ $rental->deadline }}<br>
            <a href="{{ route('rental.show', $rental) }}">View Rental Details</a>
        </li>
    @endforeach
</ul>

<h2>Accepted Rentals (On Time)</h2>
<ul>
    @foreach ($acceptedOnTimeRentals as $rental)
        <li>
            <strong>Title:</strong> {{ $rental->book->title }}<br>
            <strong>Author:</strong> {{ $rental->book->author }}<br>
            <strong>Date of Rental:</strong> {{ $rental->created_at }}<br>
            <strong>Deadline:</strong> {{ $rental->deadline }}<br>
            <a href="{{ route('rental.show', $rental) }}">View Rental Details</a>
        </li>
    @endforeach
</ul>

<h2>Accepted Rentals (Late)</h2>
<ul>
    @foreach ($acceptedLateRentals as $rental)
        <li>
            <strong>Title:</strong> {{ $rental->book->title }}<br>
            <strong>Author:</strong> {{ $rental->book->author }}<br>
            <strong>Date of Rental:</strong> {{ $rental->created_at }}<br>
            <strong>Deadline:</strong> {{ $rental->deadline }}<br>
            <a href="{{ route('rental.show', $rental) }}">View Rental Details</a>
        </li>
    @endforeach
</ul>

<h2>Rejected Rentals</h2>
<ul>
    @foreach ($rejectedRentals as $rental)
        <li>
            <strong>Title:</strong> {{ $rental->book->title }}<br>
            <strong>Author:</strong> {{ $rental->book->author }}<br>
            <strong>Date of Rental:</strong> {{ $rental->created_at }}<br>
            <strong>Deadline:</strong> {{ $rental->deadline }}<br>
            <a href="{{ route('rental.show', $rental) }}">View Rental Details</a>
        </li>
    @endforeach
</ul>

<h2>Returned Rentals</h2>
<ul>
    @foreach ($returnedRentals as $rental)
        <li>
            <strong>Title:</strong> {{ $rental->book->title }}<br>
            <strong>Author:</strong> {{ $rental->book->author }}<br>
            <strong>Date of Rental:</strong> {{ $rental->created_at }}<br>
            <strong>Deadline:</strong> {{ $rental->deadline }}<br>
            <a href="{{ route('rental.show', $rental) }}">View Rental Details</a>
        </li>
    @endforeach
</ul>

@endsection
