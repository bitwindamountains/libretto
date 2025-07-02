@extends('layouts.app')

@section('content')
<h1 class="mb-4">Genres</h1>
<a href="{{ route('genres.create') }}" class="btn btn-success mb-3"><i class="bi bi-plus-circle"></i> Add New Genre</a>
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
        @foreach($genres as $i => $genre)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ ucfirst($genre->name) }}</td>
            <td>
                @if($genre->books->count())
                    <ul class="mb-0 ps-3">
                        @foreach($genre->books as $book)
                            <li>{{ $book->title }}</li>
                        @endforeach
                    </ul>
                @else
                    <span class="text-muted">No books in this genre.</span>
                @endif
            </td>
            <td>
                <a href="{{ route('genres.show', $genre->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
                <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i> Edit</a>
                <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" class="d-inline">
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
