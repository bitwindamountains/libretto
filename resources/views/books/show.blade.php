@extends('layouts.app')

@section('content')
<h1 class="mb-4">{{ $book->title }}</h1>
<div class="card mb-4">
    <div class="card-body">
        <p class="card-text"><strong>Author:</strong> {{ $book->author->name }}</p>
        <p class="card-text"><strong>Genres:</strong> {{ $book->genres->pluck('name')->join(', ') }}</p>
        <p class="card-text"><strong>Average Rating:</strong> {{ number_format($book->reviews->avg('rating') ?? 0, 1) }}</p>
    </div>
</div>
<h3>Reviews</h3>
@forelse($book->reviews as $review)
    <div class="card mb-2">
        <div class="card-body">
            <p class="mb-1"><strong>Rating:</strong> {{ $review->rating }}/5</p>
            <p class="mb-0">{{ $review->content }}</p>
        </div>
    </div>
@empty
    <p class="text-muted">No reviews yet.</p>
@endforelse
<div class="mt-4 d-flex gap-2">
    <a href="{{ route('books.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back</a>
    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary"><i class="bi bi-pencil"></i> Edit</a>
    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
    </form>
</div>
@endsection
