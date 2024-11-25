<?php

use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//ini
Route::get('/', [BooksController::class, 'index'])->name('book.index');

Auth::routes();
Route::get('/testing', function () {
    return view('index');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Prefix untuk semua route admin
Route::prefix('admin')->group(function () {
    // Dashboard
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('adminDashboard');

    // Routes untuk kategori
    Route::prefix('category')->group(function () {
        Route::get('/add', function () {
            return view('admin.category.add');
        })->name('addCategory');

        Route::get('/', function () {
            return view('admin.category.list');
        })->name('listCategory');

        Route::get('/update', function () {
            return view('admin.category.update');
        })->name('updateCategory');
    });
    Route::prefix('libraryOfficer')->group(function () {
        Route::get('/add', function () {
            return view('admin.libraryOfficer.add');
        })->name('addLibrar');

        Route::get('/', function () {
            return view('admin.libraryOfficer.list');
        })->name('listLibrary');

        Route::get('/update', function () {
            return view('admin.libraryOfficer.update');
        })->name('updateLibrary');
    });

});
    // Prefix untuk officer
    Route::prefix('officer')->group(function () {
        // Dashboard
        Route::get('/', function () {
            return view('officer.dashboard');
        })->name('officerDashboard');

        // Officer management routes
        Route::prefix('library')->group(function () {
            Route::get('/add', function () {
                return view('admin.libraryOfficer.add');
            })->name('addOfficer');

            Route::get('/', function () {
                return view('admin.libraryOfficer.list');
            })->name('listOfficer');

            Route::get('/update', function () {
                return view('admin.libraryOfficer.update');
            })->name('updateOfficer');
        });

        
        // Routes untuk buku
        Route::prefix('book')->group(function () {
            Route::get('/add', function () {
                return view('officer.book.add');
            })->name('addBook');
            
            Route::get('/', function () {
                return view('officer.book.list');
            })->name('listBook');
            
            Route::get('/update', function () {
                return view('officer.book.update');
            })->name('updateBook');
        });
        
        // Routes untuk peminjaman
        Route::prefix('loan')->group(function () {
            Route::get('/add', function () {
                return view('officer.loan.add');
            })->name('addLoan');
            
            Route::get('/', function () {
                return view('officer.loan.list');
            })->name('listLoan');
        });
        
        // Routes untuk kategori
        Route::prefix('category')->group(function () {
            Route::get('/list', function () {
                return view('officer.category.list');
            })->name('officerCategory');
        });
        
        // Routes untuk rak buku
        Route::prefix('bookshelf')->group(function () {
            Route::get('/add', function () {
                return view('officer.bookshelf.add');
            })->name('addBookshelf');
            
            Route::get('/', function () {
                return view('officer.bookshelf.list');
            })->name('listBookshelf');
            
            Route::get('/update', function () {
                return view('officer.bookshelf.update');
            })->name('updateBookshelf');
        });
    });
