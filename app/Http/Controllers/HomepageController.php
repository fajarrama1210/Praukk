<?php

namespace App\Http\Controllers;
use App\Models\BookCategory;
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
            $collections = PersonsalCollections::with(['user', 'book'])->get();

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


            $this->checkLateLoans(); // This updates the late loans

            // Get the status filter from the request
            $status = $request->input('status', '');

            // Cek apakah koleksi kosong
            
            $status = $request->input('status', '');

            // Fetch loans based on the filter status
            $loans = Loans::when($status, function ($query, $status) {
                return $query->where('status', $status);
            })->paginate(10); // Paginate the results

            // Jika ada koleksi, tampilkan koleksi pribadi
            return view('user.home', compact('collections', 'books', 'bookCategories', 'loans'));
        }

        // Jika pengguna belum login, tampilkan buku dengan filter
        else {
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
                'bookCategories' => $bookCategories ,
                'filter' => $request->all(), // Pass the filter data back to the view
                'loans' => $loans, // Pass the loans data
                'status' => $status, // Pass the status filter
            ]);
        }

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

            // Fetch loans based on the filter status

            // Jika ada koleksi, tampilkan koleksi pribadi
            return view('user.review', compact('bookCategories', 'books',));
        }
    }