<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q = $request->input('q');
        $books = Book::when($q, function ($query) use ($q) {
                $query->where('title', 'like', "%{$q}%")
                ->orWhere('author', 'like', "%{$q}%")
                ->orWhere('genre', 'like', "%{$q}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();


        return view('books.index', compact('books', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'published_year' => ['nullable', 'digits:4', 'integer', 'min:1000', 'max:' . date('Y')],
            'genre' => ['nullable', 'string', 'max:100'],
            'cover_url' => ['nullable', 'url'],
            'description' => ['nullable', 'string'],
        ]);


        Book::create($validated);
        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'published_year' => ['nullable', 'digits:4', 'integer', 'min:1000', 'max:' . date('Y')],
            'genre' => ['nullable', 'string', 'max:100'],
            'cover_url' => ['nullable', 'url'],
            'description' => ['nullable', 'string'],
        ]);


        $book->update($validated);
        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
