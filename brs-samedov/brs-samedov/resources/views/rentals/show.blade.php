<h1>Rental Details</h1>

<h2>Book Details</h2>
<p>
    <strong>Title:</strong> {{ $rental->book->title }}<br>
    <strong>Author:</strong> {{ $rental->book->author }}<br>
    <strong>Date:</strong> {{ $rental->created_at }}<br>
    <a href="{{ route('book.show', $rental->book) }}">View Book Details</a>
</p>

<h2>Rental Data</h2>
<p>
    <strong>Name of Borrower:</strong> {{ $rental->reader->name }}<br>
    <strong>Date of Rental Request:</strong> {{ $rental->created_at }}<br>
    <strong>Status:</strong> {{ $rental->status }}<br>
    @if ($rental->status != 'PENDING')
        <strong>Date of Procession:</strong> {{ $rental->request_processed_at }}<br>
        <strong>Librarian's Name:</strong> {{ $rental->librarian->name }}<br>
    @endif
    @if ($rental->status == 'RETURNED')
        <strong>Date of Return:</strong> {{ $rental->returned_at }}<br>
        <strong>Librarian's Name:</strong> {{ $rental->return_managed_by->name }}<br>
    @endif
    @if ($rental->status == 'ACCEPTED' && $rental->deadline < now())
        <strong>Late Information:</strong> This rental is late<br>
    @endif
</p>
