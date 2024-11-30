<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use App\Models\Books;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function dashuser(Request $request)
    {
        // Get all book categories for filtering options
        $bookCategories = BookCategory::all();

        // Start building the query for the Books model
        $books = Books::query();

        // Apply filtering based on request parameters
        if ($request->has('filter_name') && $request->filter_name) {
            $books = $books->where('name', 'like', '%' . $request->filter_name . '%');
        }

        if ($request->has('filter_category_id') && $request->filter_category_id) {
            $books = $books->where('category_id', $request->filter_category_id);
        }

        // Paginate the books (10 per page)
        $books = $books->paginate(10);

        // Return the view with filtered and paginated books
        return view('user.home', [
            'books' => $books,
            'bookCategories' => $bookCategories,
            'filter' => $request->all(), // Pass the filter data back to the view
        ]);
    }
}
