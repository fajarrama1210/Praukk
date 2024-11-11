<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/testing', function (){
    return view('index');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin
//dashboard
Route::get('/admin', function (){
    return view('admin.dashboard');
})->name('adminDashboard');

//category
Route::get('/addCategory', function (){
    return view('admin.category.add');
})->name('addCategory');

Route::get('/listCategory', function (){
    return view('admin.category.list');
})->name('listCategory');
Route::get('/updateCategory', function (){
    return view('admin.category.update');
})->name('updateCategory');

//add officer
Route::get('/addOfficer', function (){
    return view('admin.libraryOfficer.add');
})->name('addOfficer');
Route::get('/listOfficer', function (){
    return view('admin.libraryOfficer.list');
})->name('listOfficer');
Route::get('/updateOfficer', function (){
    return view('admin.libraryOfficer.update');
})->name('updateOfficer');
//end admin

//officer
//dashboard
Route::get('/office', function (){
    return view('officer.dashboard');
})->name('officerDashboard');
//Book
Route::get('/addBook', function (){
    return view('officer.book.add');
})->name('addBook');

Route::get('/listBook', function (){
    return view('officer.book.list');
})->name('listBook');

Route::get('/updateBook', function (){
    return view('officer.book.update');
})->name('updateBook');

//loan
Route::get('/addLoan', function (){
    return view('officer.loan.add');
})->name('addLoan');

Route::get('/listLoan', function (){
    return view('officer.loan.list');
})->name('listLoan');




