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
        // Mengambil semua data kategori buku dari database
        $categories = BookCategory::all();

        // Menyajikan data kategori ke dalam view 'admin.category.list'
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
        // Mengarahkan ke view 'admin.category.add' untuk menambahkan kategori baru
        return view('admin.category.add');
    }

    /**
     * Menyimpan data kategori buku yang baru dibuat ke dalam database.
     */
    public function store(Request $request)
    {
        // Melakukan validasi data yang diinput oleh pengguna
        $request->validate([
            'name' => 'required|string|max:255', // nama kategori wajib diisi, berupa string, maksimal 255 karakter
        ]);

        // Menyimpan data kategori baru ke dalam tabel 'book_categories'
        BookCategory::create([
            'name' => $request->name,
        ]);

        // Mengarahkan kembali ke halaman daftar kategori dengan pesan sukses
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
        // Mengarahkan ke view 'admin.category.update' dengan data kategori yang akan diedit
        return view('admin.category.update', compact('bookCategory'));
    }

    /**
     * Memperbarui data kategori buku yang dipilih di dalam database.
     */
    public function update(Request $request, BookCategory $bookCategory)
    {
        // Melakukan validasi data yang diinput oleh pengguna
        $request->validate([
            'name' => 'required|string|max:255', // nama kategori wajib diisi, berupa string, maksimal 255 karakter
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
