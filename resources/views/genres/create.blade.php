@extends('layouts.app')

@section('content')
<h1 class="mb-4">Add New Genre</h1>
<div class="card">
    <div class="card-body">
        <form action="{{ route('genres.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <button type="submit" class="btn btn-success"><i class="bi bi-plus-circle"></i> Add Genre</button>
            <a href="{{ route('genres.index') }}" class="btn btn-secondary ms-2"><i class="bi bi-arrow-left"></i> Back</a>
        </form>
    </div>
</div>
@endsection 