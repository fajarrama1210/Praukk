<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\BookCategoriesController;
use App\Http\Controllers\BookShelfController;
use App\Http\Controllers\LoansController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//ini
Route::get('/', [BooksController::class, 'dashuser'])->name('book.index');

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
        Route::get('/', [BookCategoriesController::class, 'index'])->name('admin.category.list');
        Route::get('/add', [BookCategoriesController::class, 'create'])->name('admin.category.add');
        Route::post('/store', [BookCategoriesController::class, 'store'])->name('admin.category.store');
        Route::get('/{bookCategory}/edit', [BookCategoriesController::class, 'edit'])->name('admin.category.edit');
        Route::put('/{bookCategory}/update', [BookCategoriesController::class, 'update'])->name('admin.category.update');
        Route::delete('/{bookCategory}/delete', [BookCategoriesController::class, 'destroy'])->name('admin.category.delete');
    });

    Route::prefix('libraryOfficer')->group(function () {
        Route::get('/add', function () {
            return view('admin.libraryOfficer.add');
        })->name('addOfficer');

        Route::get('/', function () {
            return view('admin.libraryOfficer.list');
        })->name('listLibrary');

        Route::get('/update', function () {
            return view('admin.libraryOfficer.update');
        })->name('updateLibrary');
    });

    Route::prefix('adminOfficer')->group(function () {
        Route::get('/add', function () {
            return view('admin.libraryOfficer.add');
        })->name('admin.libraryOfficer.add');

        Route::get('/', function () {
            return view('admin.libraryOfficer.list');
        })->name('admin.libraryOfficer.list');

        Route::get('/update', function () {
            return view('admin.libraryOfficer.update');
        })->name('admin.libraryOfficer.update');
    });

});



// Prefix untuk officer
Route::prefix('officer')->group(function () {
    // Dashboard
    Route::get('/', function () {
        return view('officer.dashboard');
    })->name('officerDashboard');

    // Officer management routes
    // Route::prefix('library')->group(function () {
    //     Route::get('/add', function () {
    //         return view('admin.libraryOfficer.add');
    //     })->name('addOfficer');

    //     Route::get('/', function () {
    //         return view('admin.libraryOfficer.list');
    //     })->name('listOfficer');

    //     Route::get('/update', function () {
    //         return view('admin.libraryOfficer.update');
    //     })->name('updateOfficer');
    // });

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
    Route::prefix('book')->group(function () {
        Route::get('/', [BooksController::class, 'index'])->name('officer.book.list');
        Route::get('/add', [BooksController::class, 'create'])->name('officer.book.add');
        Route::post('/store', [BooksController::class, 'store'])->name('officer.book.store');
        Route::get('/{books}/edit', [BooksController::class, 'edit'])->name('officer.book.edit');
        Route::put('/{books}/update', [BooksController::class, 'update'])->name('officer.book.update');
        Route::delete('/{books}/delete', [BooksController::class, 'destroy'])->name('officer.book.delete');
    });

    // Routes untuk peminjaman
    Route::prefix('loan')->group(function () {
        Route::get('/', [LoansController::class, 'index'])->name('officer.loan.list');
        Route::get('/add', [LoansController::class, 'create'])->name('officer.loan.add');
        Route::post('/store', [LoansController::class, 'store'])->name('officer.loan.store');
        Route::put('{id}/return', [LoansController::class, 'returnBook'])->name('officer.loan.return');
        Route::delete('/{id}/delete', [LoansController::class, 'destroy'])->name('officer.loan.delete');
    });

    // Routes untuk kategori
    Route::prefix('category')->group(function () {
        Route::get('/', function () {
            return view('officer.category.list');
        })->name('officerCategory');
    });

    Route::prefix('bookshelf')->group(function () {
        Route::get('/', [BookShelfController::class, 'index'])->name('officer.bookshelf.list');
        Route::get('/add', [BookShelfController::class, 'create'])->name('officer.bookshelf.add');
        Route::post('/store', [BookShelfController::class, 'store'])->name('officer.bookshelf.store');
        Route::get('/{bookShelf}/edit', [BookShelfController::class, 'edit'])->name('officer.bookshelf.edit');
        Route::put('/{bookShelf}/update', [BookShelfController::class, 'update'])->name('officer.bookshelf.update');
        Route::delete('/{bookShelf}/delete', [BookShelfController::class, 'destroy'])->name('officer.bookshelf.delete');
    });
});
