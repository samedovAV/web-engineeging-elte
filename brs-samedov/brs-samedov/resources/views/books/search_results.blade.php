<h1>Search Results for "{{ $filter }}"</h1>

@if ($books->isEmpty())
    <p>No books found.</p>
@else
    <ul>
        @foreach ($books as $book)
            <li>
                <a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a> by {{ $book->authors }}
            </li>
        @endforeach
    </ul>

    {{ $books->links() }}
@endif