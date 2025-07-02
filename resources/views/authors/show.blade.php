@extends('layouts.app')

@section('content')
<h1 class="mb-4">{{ $author->name }}</h1>
<div class="card mb-4">
    <div class="card-body">
        <p class="card-text"><strong>Books:</strong></p>
        @if($author->books->count())
            <ul class="mb-2">
                @foreach($author->books as $book)
                    <li>{{ $book->title }}</li>
                @endforeach
            </ul>
        @else
            <p class="text-muted">No books yet.</p>
        @endif
    </div>
</div>
<div class="mt-4 d-flex gap-2">
    <a href="{{ route('authors.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back</a>
    <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-primary"><i class="bi bi-pencil"></i> Edit</a>
    <form action="{{ route('authors.destroy', $author->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
    </form>
</div>
@endsection 