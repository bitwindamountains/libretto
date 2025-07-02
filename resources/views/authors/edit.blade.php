@extends('layouts.app')

@section('content')
<h1 class="mb-4">Edit Author</h1>
<div class="card">
    <div class="card-body">
        <form action="{{ route('authors.update', $author->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $author->name) }}" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Update Author</button>
            <a href="{{ route('authors.index') }}" class="btn btn-secondary ms-2"><i class="bi bi-arrow-left"></i> Back</a>
        </form>
    </div>
</div>
@endsection 