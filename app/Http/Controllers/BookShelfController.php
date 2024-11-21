<?php

namespace App\Http\Controllers;

use App\Models\BookShelf;
use Illuminate\Http\Request;

class BookShelfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shelves = BookShelf::all();

        return view('officer.bookshelf.list', compact('shelves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('officer.bookshelf.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', // nama kategori wajib diisi, berupa string, maksimal 255 karakter
        ]);

        BookShelf::create([
            'name' => $request->name,
        ]);

        // Mengarahkan kembali ke halaman daftar kategori dengan pesan sukses
        return redirect()->route('officer.bookshelf.list')->with('success', 'Rak Buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(BookShelf $bookShelf) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookShelf $bookShelf)
    {
        return view('officer.bookshelf.update', compact('bookShelf'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookShelf $bookShelf)
    {
        $request->validate([
            'name' => 'required|string|max:255', // nama kategori wajib diisi, berupa string, maksimal 255 karakter
        ]);

        // Memperbarui data kategori dengan input baru
        $bookShelf->update([
            'name' => $request->name,
        ]);

        // Mengarahkan kembali ke halaman daftar kategori dengan pesan sukses
        return redirect()->route('officer.bookshelf.list')->with('success', 'Rak Buku berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookShelf $bookShelf)
    {
        $shelf = BookShelf::findOrFail($bookShelf);
        $shelf->delete();
        return redirect()->route('officer.bookshelf.list')->with('success', 'Rak Buku berhasil dihapus');
    }
}
