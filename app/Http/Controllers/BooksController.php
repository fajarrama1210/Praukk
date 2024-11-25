<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display the listing of books with filters applied.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Dummy Data for Book Categories
        $bookCategories = collect([
            (object)['id' => 1, 'name' => 'Science'],
            (object)['id' => 2, 'name' => 'Literature'],
            (object)['id' => 3, 'name' => 'History'],
        ]);

        // Dummy Data for Books
        $books = collect([
            (object)[
                'id' => 1, 'name' => 'Physics 101', 'published_year' => 2020, 'category' => 'Science',
                'category_id' => 1, 'total_stock' => 5
            ],
            (object)[
                'id' => 2, 'name' => 'History of Ancient Egypt', 'published_year' => 2018, 'category' => 'History',
                'category_id' => 3, 'total_stock' => 0
            ],
            (object)[
                'id' => 3, 'name' => 'Shakespeare\'s Plays', 'published_year' => 2015, 'category' => 'Literature',
                'category_id' => 2, 'total_stock' => 10
            ]
        ]);

        // Apply filtering based on request parameters
        if ($request->has('filter_name') && $request->filter_name) {
            $books = $books->filter(function($book) use ($request) {
                return str_contains(strtolower($book->name), strtolower($request->filter_name));
            });
        }

        if ($request->has('filter_category_id') && $request->filter_category_id) {
            $books = $books->filter(function($book) use ($request) {
                return $book->category_id == $request->filter_category_id;
            });
        }

        // Paginate the books (for demo purposes, using a simple limit here)
        // $books = $books->paginate(10);

        return view('user.home', [
            'books' => $books,
            'bookCategories' => $bookCategories,
            'filter' => $request->all(), // Pass the filter data back to the view
        ]);
    }
}
