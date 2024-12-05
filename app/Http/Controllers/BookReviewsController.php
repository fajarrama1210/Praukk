<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use App\Models\BookReviews;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $bookId, $request)
    {
        // $book = Books::findOrFail($bookId);
        // $reviews = $book->reviews()->latest()->get();

        // Ambil semua kategori buku untuk filter
        $bookCategories  = BookCategory::all();

        // Mulai query untuk model Books
        $books = Books::query();

        // Terapkan filter berdasarkan parameter request
        if ($request->has('filter_name') && $request->filter_name) {
            $books = $books->where('name', 'like', '%' . $request->filter_name . '%');
        }

        if ($request->has('filter_category_id') && $request->filter_category_id) {
            $books = $books->where('category_id', $request->filter_category_id);
        }

        // Paginate the books (10 per page)
        $books = $books->paginate(10);

        return view('user.review', compact('book', 'reviews', 'bookCategories', 'books'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'comment' => 'required|string|max:1000',
        ]);

        // Simpan ulasan baru
        $review = new BookReviews();
        $review->book_id = $request->book_id;
        $review->user_id = Auth::id(); // ID user yang login
        $review->review = $request->comment;
        $review->save();

        // Kembali ke halaman buku dengan komentar terbaru
        return back()->with('success', 'Ulasan berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show(BookReviews $bookReviews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookReviews $bookReviews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookReviews $bookReviews)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookReviews $bookReviews)
    {
        //
    }
}
