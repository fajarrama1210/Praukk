<?php

use App\Exports\LoansExport;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\LoansController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\BookShelfController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\StudentMajorController;
use App\Http\Controllers\BookCategoriesController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LibraryOfficerController;
use App\Http\Controllers\UserRoleController;

Auth::routes();
// Halaman depan untuk semua pengguna (User)
Route::get('/', [HomepageController::class, 'dashuser'])->name('home.index');
Route::post('/add/collection', [HomepageController::class, 'addCollection'])->name('add.collection');
Route::get('/review', [HomepageController::class, 'review'])->name('user.review');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::delete('/collections/{id}', [HomepageController::class, 'destroy'])->name('collections.destroy');


// Route::view('/access-denied', 'access-denied')->name('access-denied');

Route::prefix('admin')->middleware(['role:admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('adminDashboard');

    Route::prefix('category')->group(function () {
        Route::get('/', [BookCategoriesController::class, 'index'])->name('admin.category.list');
        Route::get('/add', [BookCategoriesController::class, 'create'])->name('admin.category.add');
        Route::post('/store', [BookCategoriesController::class, 'store'])->name('admin.category.store');
        Route::get('/{bookCategory}/edit', [BookCategoriesController::class, 'edit'])->name('admin.category.edit');
        Route::put('/{bookCategory}/update', [BookCategoriesController::class, 'update'])->name('admin.category.update');
        Route::delete('/{bookCategory}/delete', [BookCategoriesController::class, 'destroy'])->name('admin.category.delete');
    });

    Route::prefix('student-class')->group(function () {
        Route::get('/', [StudentClassController::class, 'index'])->name('admin.studentClass.list');
        Route::get('/add', [StudentClassController::class, 'create'])->name('admin.studentClass.add');
        Route::post('/store', [StudentClassController::class, 'store'])->name('admin.studentClass.store');
        Route::get('/update/{studentClass}', [StudentClassController::class, 'edit'])->name('admin.studentClass.update');
        Route::put('/update/{studentClass}', [StudentClassController::class, 'update'])->name('admin.studentClass.update.submit');
        Route::delete('/delete/{studentClass}', [StudentClassController::class, 'destroy'])->name('admin.studentClass.delete');
    });

    Route::prefix('student-major')->group(function () {
        Route::get('/', [StudentMajorController::class, 'index'])->name('admin.studentMajor.list');
        Route::get('/add', [StudentMajorController::class, 'create'])->name('admin.studentMajor.add');
        Route::post('/store', [StudentMajorController::class, 'store'])->name('admin.major.store');
        Route::get('/update/{studentMajor}', [StudentMajorController::class, 'edit'])->name('admin.studentMajor.update');
        Route::put('/update/{studentMajor}', [StudentMajorController::class, 'update'])->name('admin.major.put');
        Route::delete('/delete/{studentMajor}', [StudentMajorController::class, 'destroy'])->name('admin.major.delete');
    });

    Route::prefix('libraryOfficer')->group(function () {
        Route::get('/', [LibraryOfficerController::class, 'index'])->name('admin.libraryOfficer.list');
        Route::get('/add', [LibraryOfficerController::class, 'create'])->name('admin.libraryOfficer.add');
        Route::post('/store', [LibraryOfficerController::class, 'store'])->name('admin.libraryOfficer.store');
        Route::get('/{user}/edit', [LibraryOfficerController::class, 'edit'])->name('admin.libraryOfficer.edit');
        Route::put('/{user}', [LibraryOfficerController::class, 'update'])->name('admin.libraryOfficer.put');
        Route::delete('/{user}', [LibraryOfficerController::class, 'destroy'])->name('admin.libraryOfficer.delete');
        Route::get('/libraryOfficer/{user}/detail', [LibraryOfficerController::class, 'show'])->name('admin.libraryOfficer.detail');

    });

    Route::prefix('roleUser')->group(function () {
        Route::get('/', [UserRoleController::class, 'index'])->name('admin.roleUser.list');
    });


});

// Rute untuk Officer dengan middleware role:officer
Route::prefix('officer')->middleware(['role:officer'])->group(function () {
    // Dashboard Officer
    Route::get('/', function () {
        return view('officer.dashboard');
    })->name('officerDashboard');

    // Rute untuk rak buku
    Route::prefix('bookshelf')->group(function () {
        Route::get('/', [BookShelfController::class, 'index'])->name('officer.bookshelf.list');
        Route::get('/add', [BookShelfController::class, 'create'])->name('officer.bookshelf.add');
        Route::post('/store', [BookShelfController::class, 'store'])->name('officer.bookshelf.store');
        Route::get('/{bookShelf}/edit', [BookShelfController::class, 'edit'])->name('officer.bookshelf.edit');
        Route::put('/{bookShelf}/update', [BookShelfController::class, 'update'])->name('officer.bookshelf.update');
        Route::delete('/{bookShelf}/delete', [BookShelfController::class, 'destroy'])->name('officer.bookshelf.delete');
    });

    // Rute untuk buku
    Route::prefix('book')->group(function () {
        Route::get('/', [BooksController::class, 'index'])->name('officer.book.list');
        Route::get('/add', [BooksController::class, 'create'])->name('officer.book.add');
        Route::post('/store', [BooksController::class, 'store'])->name('officer.book.store');
        Route::get('/{books}/edit', [BooksController::class, 'edit'])->name('officer.book.edit');
        Route::put('/{books}/update', [BooksController::class, 'update'])->name('officer.book.update');
        Route::delete('/{books}/delete', [BooksController::class, 'destroy'])->name('officer.book.delete');
    });

    // Rute untuk peminjaman
    Route::prefix('loan')->group(function () {
        Route::get('/', [LoansController::class, 'index'])->name('officer.loan.list');
        Route::get('/add', [LoansController::class, 'create'])->name('officer.loan.add');
        Route::post('/store', [LoansController::class, 'store'])->name('officer.loan.store');
        Route::put('{id}/return', [LoansController::class, 'returnBook'])->name('officer.loan.return');
        Route::delete('/{id}/delete', [LoansController::class, 'destroy'])->name('officer.loan.delete');
        Route::get('/siswa/export_excel', [LoansController::class, 'exportExcel'])->name('officer.loans.export');
    });

    Route::prefix('category')->group(function () {
        Route::get('/', [BookCategoriesController::class, 'indexOfficer'])->name('officer.category.list');
    });

});

// Rute untuk User (role:user)
Route::prefix('user')->middleware(['role:user'])->group(function () {
    // Rute lainnya untuk pengguna biasa bisa ditambahkan di sini
});

