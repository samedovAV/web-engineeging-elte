<h1>{{ $genre->name }} Books</h1>

<ul>
    @foreach ($books as $book)
        <li>
            <a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a> by {{ $book->authors }}
        </li>
    @endforeach
</ul>

{{ $books->links() }}