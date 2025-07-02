@extends('layouts.app')

@section('content')
<h1 class="mb-4">Edit Book</h1>
<div class="card">
    <div class="card-body">
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $book->title) }}" required>
            </div>
            <div class="mb-3">
                <label for="author_id" class="form-label">Author</label>
                <select name="author_id" id="author_id" class="form-select" required>
                    <option value="">Select Author</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}" {{ (old('author_id', $book->author_id) == $author->id) ? 'selected' : '' }}>{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="genres" class="form-label">Genres</label>
                <select name="genres[]" id="genres" class="form-select" multiple>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" {{ ($book->genres->contains($genre->id) || (collect(old('genres'))->contains($genre->id))) ? 'selected' : '' }}>{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Update Book</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary ms-2"><i class="bi bi-arrow-left"></i> Back</a>
        </form>
    </div>
</div>
@endsection 