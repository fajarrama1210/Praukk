<?php

namespace App\Http\Controllers;
use App\Models\BookCategory;
use App\Models\PersonsalCollections;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Books;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    public function dashuser(Request $request)
    {
        // Jika pengguna sudah login, tampilkan koleksi pribadi
        if (Auth::check()) {
            // Mengambil koleksi pribadi pengguna yang login
            $collections = PersonsalCollections::with(['user', 'book'])->get();

            // Cek apakah koleksi kosong
            if ($collections->isEmpty()) {
                return view('user.home', [
                    'message' => 'Anda belum memiliki koleksi pribadi. Silakan tambahkan koleksi pertama Anda!'
                ]);
            }

            // Jika ada koleksi, tampilkan koleksi pribadi
            return view('user.home', compact('collections'));
        }

        // Jika pengguna belum login, tampilkan buku dengan filter
        else {
            // Ambil semua kategori buku untuk filter
            $bookCategories = BookCategory::all();

            // Mulai query untuk model Books
            $books = Books::query();

            // Terapkan filter berdasarkan parameter request
            if ($request->has('filter_name') && $request->filter_name) {
                $books = $books->where('name', 'like', '%' . $request->filter_name . '%');
            }

            if ($request->has('filter_category_id') && $request->filter_category_id) {
                $books = $books->where('category_id', $request->filter_category_id);
            }

            // Paginasikan buku (10 per halaman)
            $books = $books->paginate(10);

            // Kembalikan tampilan dengan buku yang difilter dan dipaginasi
            return view('user.home', [
                'books' => $books,
                'bookCategories' => $bookCategories,
                'filter' => $request->all(), // Kirimkan data filter ke view
            ]);
        }
    }
}
