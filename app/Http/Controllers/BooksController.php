<?php

namespace App\Http\Controllers;

use App\Models\BookCategories;
use App\Models\Books;
use App\Models\BookShelf;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Books::all();
        return view('officer.book.list', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BookCategories::all();
        $shelves = BookShelf::all();
        return view('officer.book.add', compact('categories', 'shelves'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'writer' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'category_id' => 'required',
            'shelf_id' => 'required',
            'publish_year' => 'required|integer|min:1900|max:' . date('Y'),
            'code' => 'required|string|max:255',
            'stock' => 'required|integer|min:1', // Validasi untuk kolom stock
        ]);

        Books::create([
            'title' => $request->title,
            'writer' => $request->writer,
            'publisher' => $request->publisher,
            'publish_year' => $request->publish_year,
            'category_id' => $request->category_id,
            'shelf_id' => $request->shelf_id,
            'code' => $request->code,
            'stock' => $request->stock, // Tambahkan stock di sini
        ]);

        return redirect()->route('officer.book.list')->with('success', 'Buku baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Books $books)
    {
        // Implementasi tambahan jika diperlukan
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Books $books)
    {
        $categories = BookCategories::all();
        $shelves = BookShelf::all();
        return view('officer.book.update', compact('books', 'categories', 'shelves'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Books $books)
    {
        $books->update([
            'title' => $request->title,
            'writer' => $request->writer,
            'publisher' => $request->publisher,
            'publish_year' => $request->publish_year,
            'category_id' => $request->category_id,
            'shelf_id' => $request->shelf_id,
            'code' => $request->code,
            'stock' => $request->stock,
        ]);

        return redirect()->route('officer.book.list')->with('success', 'Buku berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Books $books)
    {
        $books->delete();
        return redirect()->route('officer.book.list')->with('success', 'Buku berhasil dihapus');
    }
}
