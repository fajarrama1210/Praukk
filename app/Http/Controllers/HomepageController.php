<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use App\Models\BookReviews;
use App\Models\PersonsalCollections;
use App\Models\Books;
use App\Models\Loans;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    public function dashuser(Request $request)
    {
        // Jika pengguna sudah login, tampilkan koleksi pribadi
        if (Auth::check()) {
            // Mengambil koleksi pribadi pengguna yang login
            $collections = PersonsalCollections::with(['user', 'book'])->where('user_id', Auth::id())->get();

            // Ambil semua kategori buku untuk filter
            $bookCategories  = BookCategory::all();

            // Query untuk mengambil buku
            $books = Books::query();

            // Terapkan filter berdasarkan parameter request
            if ($request->has('filter_name') && $request->filter_name) {
                $books = $books->where('title', 'like', '%' . $request->filter_name . '%');
            }

            if ($request->has('filter_category_id') && $request->filter_category_id) {
                $books = $books->where('category_id', $request->filter_category_id);
            }

            // Paginate the books (10 per page)
            $books = $books->paginate(10);

            // Cek pinjaman yang terlambat
            $this->checkLateLoans(); // This updates the late loans

            // Mendapatkan status pinjaman dari request
            $status = $request->input('status', '');

            // Fetch pinjaman berdasarkan filter status
            $loans = Loans::when($status, function ($query, $status) {
                return $query->where('status', $status);
            })->paginate(10); // Paginate the results

            // Kembalikan view dengan data yang diperlukan
            return view('user.home', compact('collections', 'books', 'bookCategories', 'loans', 'status'));
        }

        // Jika pengguna belum login, tampilkan buku dengan filter
        else {
            // Mendapatkan semua kategori buku untuk dropdown filter
            $bookCategories = BookCategory::all();

            // Mendapatkan parameter filter dari request
            $filter = $request->only('filter_name', 'filter_category_id', 'filter_on');

            // Membangun query pencarian
            $query = Books::query();

            // Jika filter nama ada, ganti 'name' dengan 'title'
            if (!empty($filter['filter_name'])) {
                $query->where('title', 'like', '%' . $filter['filter_name'] . '%');
            }

            // Jika filter kategori ada
            if (!empty($filter['filter_category_id'])) {
                $query->where('category_id', $filter['filter_category_id']);
            }

            // Mengambil data buku yang sudah difilter
            $books = $query->paginate(10);

            // Cek pinjaman yang terlambat
            $this->checkLateLoans(); // This updates the late loans

            // Mendapatkan status pinjaman dari request
            $status = $request->input('status', '');

            // Fetch pinjaman berdasarkan filter status
            $loans = Loans::when($status, function ($query, $status) {
                return $query->where('status', $status);
            })->paginate(10); // Paginate the results

            // Kembalikan view dengan data yang diperlukan
            return view('user.home', [
                'books' => $books,
                'bookCategories' => $bookCategories,
                'filter' => $request->all(), // Kirim data filter ke view
                'loans' => $loans, // Kirim data pinjaman
                'status' => $status, // Kirim filter status
            ]);
        }
    }


    public function checkLateLoans()
    {
        $loans = Loans::all();

        foreach ($loans as $loan) {
            $returnDate = Carbon::parse($loan->return_date);

            // Check if return date is past today
            if ($returnDate->lt(Carbon::today())) {
                $lateDays = now()->diffInDays($returnDate, false);

                $loan->update([
                    'status' => 'lated',
                    'late_days' => abs($lateDays),
                ]);
            }
            // Check if return date is today
            elseif ($returnDate->eq(Carbon::today())) {
                $loan->update([
                    'status' => 'borrowed',
                    'late_days' => 0, // No lateness
                ]);
            } else {
                $loan->update([
                    'status' => 'borrowed',
                    'late_days' => 0,
                ]);
            }
        }
    }

    public function review(Request $request)
    {
        $bookCategories  = BookCategory::all();

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

        // Get the status filter from the request
        $status = $request->input('status', '');

        // Cek apakah koleksi kosong

        $status = $request->input('status', '');

        $comments = BookReviews::with('user', 'book')->get();

        // Jika ada koleksi, tampilkan koleksi pribadi
        return view('user.review', compact('bookCategories', 'books', 'comments'));
    }

    public function addCollection(Request $request)
    {
        $userId = Auth::user()->id;

        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        $existingCollection = PersonsalCollections::where('user_id', $userId)
            ->where('book_id', $validated['book_id'])
            ->first();

        if ($existingCollection) {
            return redirect()->back()->with('error', 'Buku ini sudah ada di koleksi Anda.');
        }

        PersonsalCollections::create([
            'user_id' => $userId,
            'book_id' => $validated['book_id'],
        ]);

        return redirect()->back()->with('success', 'Buku berhasil ditambahkan ke koleksi Anda.');
    }
    /**
     * Hapus koleksi berdasarkan ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Cari koleksi berdasarkan ID
        $collection = PersonsalCollections::find($id);

        // Periksa apakah koleksi ditemukan
        if (!$collection) {
            return redirect()->back()->with('error', 'Koleksi tidak ditemukan.');
        }

        // Periksa apakah koleksi milik pengguna yang sedang login
        if ($collection->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus koleksi ini.');
        }

        // Hapus koleksi
        $collection->delete();

        return redirect()->back()->with('success', 'Koleksi berhasil dihapus.');
    }
}
