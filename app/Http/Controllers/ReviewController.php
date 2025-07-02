<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Book;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('book')->get();
        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        $books = Book::all();
        return view('reviews.create', compact('books'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'content' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);
        Review::create($validated);
        return redirect()->route('reviews.index');
    }

    public function show($id)
    {
        $review = Review::with('book')->findOrFail($id);
        return view('reviews.show', compact('review'));
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        $books = Book::all();
        return view('reviews.edit', compact('review', 'books'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'content' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);
        $review = Review::findOrFail($id);
        $review->update($validated);
        return redirect()->route('reviews.index');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return redirect()->route('reviews.index');
    }
} 