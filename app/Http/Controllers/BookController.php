<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Menampilkan daftar buku
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // Menampilkan form untuk menambah buku
    public function create()
    {
        return view('books.create');
    }

    // Menyimpan buku baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'publisher' => 'nullable|max:255',
            'published_year' => 'nullable|date_format:Y',
            'pages' => 'nullable|integer',
            'description' => 'nullable|max:1000',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    // Menampilkan form untuk mengedit buku
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // Memperbarui buku
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'publisher' => 'nullable|max:255',
            'published_year' => 'nullable|date_format:Y',
            'pages' => 'nullable|integer',
            'description' => 'nullable|max:1000',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    // Menghapus buku
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
