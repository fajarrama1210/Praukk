<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\StudentClass;
use App\Models\StudentMajor;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $studentClass = StudentClass::count();
        $studentMajor = StudentMajor::count();
        $book = Books::count();
        $user = User::role('user')->count();
        return view('admin.dashboard', compact('studentClass', 'studentMajor', 'book', 'user'));
    }
}
