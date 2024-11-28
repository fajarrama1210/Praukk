<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\BookCategory;
use App\Models\Books;
use App\Models\BookShelf;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display the listing of books with filters applied.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $books = Books::all();
        return view('officer.book.list', compact('books'));
    }

    // public function dashuser(Request $request){
    //     // Dummy Data for Book Categories
    //     $bookCategories = BookCategories::all();

    //     // Dummy Data for Books
    //     $books = Books::all();

    //     // Apply filtering based on request parameters
    //     if ($request->has('filter_name') && $request->filter_name) {
    //         $books = $books->filter(function($book) use ($request) {
    //             return str_contains(strtolower($book->name), strtolower($request->filter_name));
    //         });
    //     }

    //     if ($request->has('filter_category_id') && $request->filter_category_id) {
    //         $books = $books->filter(function($book) use ($request) {
    //             return $book->category_id == $request->filter_category_id;
    //         });
    //     }

    //     // Paginate the books (for demo purposes, using a simple limit here)
    //     // $books = $books->paginate(10);

    //     return view('user.home', [
    //         'books' => $books,
    //         'bookCategories' => $bookCategories,
    //         'filter' => $request->all(), // Pass the filter data back to the view
    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BookCategory::all();
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
        $categories = BookCategory::all();
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
