@extends('layouts.app')

@section('content')
<h1 class="mb-4">Reviews</h1>
<a href="{{ route('reviews.create') }}" class="btn btn-success mb-3"><i class="bi bi-plus-circle"></i> Add New Review</a>
<div class="table-responsive">
<table class="table table-bordered table-striped align-middle">
    <thead class="table-light">
        <tr>
            <th>#</th>
            <th>Book</th>
            <th>Rating</th>
            <th>Content</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reviews as $i => $review)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $review->book->title }}</td>
            <td>{{ $review->rating }}/5</td>
            <td>{{ $review->content }}</td>
            <td>
                <div class="btn-group gap-1" role="group">
                    <a href="{{ route('reviews.show', $review->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
                    <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i> Edit</a>
                    <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection 