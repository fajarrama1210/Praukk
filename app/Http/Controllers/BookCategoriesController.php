<?php

namespace App\Http\Controllers;

use App\Models\BookCategories;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class BookCategoriesController extends Controller
{
    /**
     * Menampilkan daftar kategori buku.
     */
    public function index()
    {
        $categories = BookCategory::all();

        return view('admin.category.list', compact('categories'));
    }

    public function indexOfficer()
    {
        $categories = BookCategory::all();
        return view('officer.category.list', compact('categories'));
    }

    /**
     * Menampilkan form untuk membuat kategori buku baru.
     */
    public function create()
    {
        return view('admin.category.add');
    }

    /**
     * Menyimpan data kategori buku yang baru dibuat ke dalam database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        BookCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.category.list')->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Menampilkan detail dari kategori buku tertentu (saat ini belum diimplementasikan).
     */
    public function show(BookCategory $bookCategory)
    {
        // Metode ini kosong dan dapat diimplementasikan untuk menampilkan detail kategori tertentu jika diperlukan.
    }

    /**
     * Menampilkan form untuk mengedit kategori buku yang dipilih.
     */
    public function edit(BookCategory $bookCategory)
    {
        return view('admin.category.update', compact('bookCategory'));
    }

    /**
     * Memperbarui data kategori buku yang dipilih di dalam database.
     */
    public function update(Request $request, BookCategory $bookCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255', 
        ]);

        // Memperbarui data kategori dengan input baru
        $bookCategory->update([
            'name' => $request->name,
        ]);

        // Mengarahkan kembali ke halaman daftar kategori dengan pesan sukses
        return redirect()->route('admin.category.list')->with('success', 'Kategori berhasil diperbarui');
    }

    /**
     * Menghapus kategori buku yang dipilih dari database.
     */
    public function destroy(BookCategory $bookCategory)
    {
        $category = BookCategory::findOrFail($bookCategory);
        $category->delete();
        return redirect()->route('admin.category.list')->with('success', 'Kategori berhasil dihapus');
    }
}
