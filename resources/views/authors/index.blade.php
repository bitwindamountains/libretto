@extends('layouts.app')

@section('content')
<h1 class="mb-4">Authors</h1>
<a href="{{ route('authors.create') }}" class="btn btn-success mb-3"><i class="bi bi-plus-circle"></i> Add New Author</a>
<div class="table-responsive">
<table class="table table-bordered table-striped align-middle">
    <thead class="table-light">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Books</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($authors as $i => $author)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $author->name }}</td>
            <td>
                @if($author->books->count())
                    <ul class="mb-0 ps-3">
                        @foreach($author->books as $book)
                            <li>{{ $book->title }}</li>
                        @endforeach
                    </ul>
                @else
                    <span class="text-muted">No books yet.</span>
                @endif
            </td>
            <td>
                <a href="{{ route('authors.show', $author->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
                <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i> Edit</a>
                <form action="{{ route('authors.destroy', $author->id) }}" method="POST" class="d-inline">
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
