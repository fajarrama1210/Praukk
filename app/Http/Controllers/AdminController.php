<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Books;
use App\Models\StudentClass;
use App\Models\StudentMajor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $studentClass = StudentClass::count();
        $studentMajor = StudentMajor::count();
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

        return view('admin.dashboard', compact('studentClass', 'studentMajor', 'book', 'user', 'chartData'));
    }

    // Fungsi untuk mendapatkan tanggal awal minggu dari YEARWEEK
    private function getStartDateOfWeek($yearWeek)
    {
        $year = substr($yearWeek, 0, 4); // Mengambil tahun
        $week = substr($yearWeek, 4);    // Mengambil minggu
        return date('Y-m-d', strtotime("{$year}-W{$week}-1"));
    }
}
