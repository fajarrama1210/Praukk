<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\StudentClass;
use App\Models\StudentMajor;
use App\Models\OfficerController;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use App\Http\Requests\StoreOfficerControllerRequest;
use App\Http\Requests\UpdateOfficerControllerRequest;
use App\Models\BookCategory;
use App\Models\BookShelf;

class OfficerControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = BookCategory::count();
        $studentClass = StudentClass::count();
        $studentMajor = StudentMajor::count();
        $bookShelve = BookShelf::count();
        $book = Books::count();
        $user = User::count();

                // Mengambil data peminjaman per minggu
                $loansPerWeek = DB::table('loans')
                ->selectRaw('YEARWEEK(loan_date, 1) as week, COUNT(*) as count')
                ->groupBy('week')
                ->orderBy('week')
                ->get();

            // Memformat data untuk ApexCharts (x: tanggal, y: jumlah pinjaman)
            $chartData = $loansPerWeek->map(function ($item) {
                return [
                    'x' => $this->getStartDateOfWeek($item->week), // Mengambil tanggal awal minggu
                    'y' => $item->count,
                ];
            });

        return view('officer.dashboard', compact('studentClass', 'category','studentMajor', 'book', 'chartData', 'bookShelve', 'user'));

    }
        // Fungsi untuk mendapatkan tanggal awal minggu dari YEARWEEK
        private function getStartDateOfWeek($yearWeek)
        {
            $year = substr($yearWeek, 0, 4); // Mengambil tahun
            $week = substr($yearWeek, 4);    // Mengambil minggu
            return date('Y-m-d', strtotime("{$year}-W{$week}-1"));
        }

}
