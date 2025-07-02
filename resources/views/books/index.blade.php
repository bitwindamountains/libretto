@extends('layouts.app')

@section('content')
<h1 class="mb-4">Books List</h1>
<a href="{{ route('books.create') }}" class="btn btn-success mb-3"><i class="bi bi-plus-circle"></i> Add New Book</a>
<div class="table-responsive">
<table class="table table-bordered table-striped align-middle">
    <thead class="table-light">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Author</th>
            <th>Genres</th>
            <th>Avg Rating</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $i => $book)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author->name }}</td>
            <td>{{ $book->genres->pluck('name')->join(', ') }}</td>
            <td>{{ number_format($book->reviews->avg('rating') ?? 0, 1) }}</td>
            <td>
                <a href="{{ route('books.show', $book->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i> Edit</a>
                <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
