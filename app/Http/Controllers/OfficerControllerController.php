<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\StudentClass;
use App\Models\StudentMajor;
use App\Models\OfficerController;
use Illuminate\Foundation\Auth\User;
use App\Http\Requests\StoreOfficerControllerRequest;
use App\Http\Requests\UpdateOfficerControllerRequest;

class OfficerControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentClass = StudentClass::count();
        $studentMajor = StudentMajor::count();
        $book = Books::count();
        return view('officer.dashboard', compact('studentClass', 'studentMajor', 'book'));

    }
}
