@extends('layouts.app')

@section('content')
<h1 class="mb-4">Review for {{ $review->book->title }}</h1>
<div class="card mb-4">
    <div class="card-body">
        <p class="mb-1"><strong>Rating:</strong> {{ $review->rating }}/5</p>
        <p class="mb-0">{{ $review->content }}</p>
    </div>
</div>
<div class="mt-4 d-flex gap-2">
    <a href="{{ route('reviews.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back</a>
    <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-primary"><i class="bi bi-pencil"></i> Edit</a>
    <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
    </form>
</div>
@endsection 