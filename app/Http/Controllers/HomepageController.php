<?php

namespace App\Http\Controllers;
use App\Models\BookCategory;
<<<<<<< HEAD
use App\Models\PersonsalCollections;
=======
use App\Models\Books;
use App\Models\Loans;
use Carbon\Carbon;
>>>>>>> 5fd41fa4e4523e2806d6d838a3c9c8e7f5acdd8b
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
<<<<<<< HEAD
=======

        // Paginate the books (10 per page)
        $books = $books->paginate(10);

        // Fetch loans and process late loans
        $this->checkLateLoans(); // This updates the late loans

        // Get the status filter from the request
        $status = $request->input('status', '');

        // Fetch loans based on the filter status
        $loans = Loans::when($status, function ($query, $status) {
            return $query->where('status', $status);
        })->paginate(10); // Paginate the results

        // Return the view with books, loans, and filter data
        return view('user.home', [
            'books' => $books,
            'bookCategories' => $bookCategories,
            'filter' => $request->all(), // Pass the filter data back to the view
            'loans' => $loans, // Pass the loans data
            'status' => $status, // Pass the status filter
        ]);
>>>>>>> 5fd41fa4e4523e2806d6d838a3c9c8e7f5acdd8b
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
}
