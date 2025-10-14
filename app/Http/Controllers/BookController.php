<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with(['author', 'publication']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhereHas('author', fn($q2) => $q2->where('name', 'like', "%{$search}%"))
                  ->orWhereHas('publication', fn($q2) => $q2->where('name', 'like', "%{$search}%"));
            });
        }

        $books = $query->latest()->get();

        if ($request->ajax()) {
            
            return view('books.partials.book_list', compact('books'))->render();
        }

        return view('books.index', compact('books'));
    }

    public function show(Book $book)
    {
        $sameAuthorBooks = Book::where('author_id', $book->author_id)
            ->where('id', '!=', $book->id)
            ->limit(4)
            ->get();

        $samePublicationBooks = Book::where('publication_id', $book->publication_id)
            ->where('id', '!=', $book->id)
            ->limit(4)
            ->get();

        return view('books.show', compact('book', 'sameAuthorBooks', 'samePublicationBooks'));
    }
}
