@extends('layouts.app')

@section('content')
<h1 class="mb-4">Edit Review</h1>
<div class="card">
    <div class="card-body">
        <form action="{{ route('reviews.update', $review->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="book_id" class="form-label">Book</label>
                <select name="book_id" id="book_id" class="form-select" required>
                    <option value="">Select Book</option>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}" {{ (old('book_id', $review->book_id) == $book->id) ? 'selected' : '' }}>{{ $book->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" value="{{ old('rating', $review->rating) }}" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content" class="form-control" required>{{ old('content', $review->content) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Update Review</button>
            <a href="{{ route('reviews.index') }}" class="btn btn-secondary ms-2"><i class="bi bi-arrow-left"></i> Back</a>
        </form>
    </div>
</div>
@endsection 