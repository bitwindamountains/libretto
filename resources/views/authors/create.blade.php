@extends('layouts.app')

@section('content')
<h1 class="mb-4">Add New Author</h1>
<div class="card">
    <div class="card-body">
        <form action="{{ route('authors.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <button type="submit" class="btn btn-success"><i class="bi bi-plus-circle"></i> Add Author</button>
            <a href="{{ route('authors.index') }}" class="btn btn-secondary ms-2"><i class="bi bi-arrow-left"></i> Back</a>
        </form>
    </div>
</div>
@endsection 