<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;

class LibraryController extends Controller
{
    public function showBooks()
    {
        $books = Book::with(['author', 'genres', 'reviews'])->get();
        return view('books.index', compact('books'));
    }

    public function showAuthors()
    {
        $authors = Author::with('books')->get();
        return view('authors.index', compact('authors'));
    }

    public function showBookDetails($id)
    {
        $book = Book::with(['author', 'genres', 'reviews'])->findOrFail($id);
        return view('books.show', compact('book'));
    }
    
    public function showGenres()
{
    $genres = Genre::with('books')->get();
    return view('genres.index', compact('genres'));
}

}
