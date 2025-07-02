@extends('layouts.app')

@section('content')
<div class="card" style="text-align: center;">
    <h1>Welcome to Libretto App</h1>
    <p>Browse and review books, authors, and genres.</p>
    <div style="margin-top: 24px;">
        <a href="{{ url('/books') }}" class="card-link">Books</a>
        <a href="{{ url('/authors') }}" class="card-link" style="margin-left: 16px;">Authors</a>
        <a href="{{ url('/genres') }}" class="card-link" style="margin-left: 16px;">Genres</a>
    </div>
</div>
@endsection
