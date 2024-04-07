@extends('layouts.app')

@section('content')

<h1>Rental List</h1>

<h2>Pending Rentals</h2>
<ul>
    @foreach($pendingRentals as $rental)
        <li><a href="{{ route('rentals.show', $rental) }}">{{ $rental->book->title }} - {{ $rental->book->author }} - {{ $rental->rental_date }} - {{ $rental->deadline }}</a></li>
    @endforeach
</ul>

<h2>Accepted and In-Time Rentals</h2>
<ul>
    @foreach($acceptedInTimeRentals as $rental)
        <li><a href="{{ route('rentals.show', $rental) }}">{{ $rental->book->title }} - {{ $rental->book->author }} - {{ $rental->rental_date }} - {{ $rental->deadline }}</a></li>
    @endforeach
</ul>

<h2>Late Rentals</h2>
<ul>
    @foreach($lateRentals as $rental)
        <li><a href="{{ route('rentals.show', $rental) }}">{{ $rental->book->title }} - {{ $rental->book->author }} - {{ $rental->rental_date }} - {{ $rental->deadline }}</a></li>
    @endforeach
</ul>

<h2>Rejected Rentals</h2>
<ul>
    @foreach($rejectedRentals as $rental)
        <li><a href="{{ route('rentals.show', $rental) }}">{{ $rental->book->title }} - {{ $rental->book->author }} - {{ $rental->rental_date }} - {{ $rental->deadline }}</a></li>
    @endforeach
</ul>

<h2>Returned Rentals</h2>
<ul>
    @foreach($returnedRentals as $rental)
        <li><a href="{{ route('rentals.show', $rental) }}">{{ $rental->book->title }} - {{ $rental->book->author }} - {{ $rental->rental_date }} - {{ $rental->deadline }}</a></li>
    @endforeach
</ul>

@endsection
