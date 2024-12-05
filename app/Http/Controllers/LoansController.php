<?php

namespace App\Http\Controllers;

use App\Exports\LoansExport;
use App\Models\Books;
use App\Models\Loans;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LoansController extends Controller
{
    public function checkLateLoans()
    {
        $loans = Loans::all();

        foreach ($loans as $loan) {
            $returnDate = Carbon::parse($loan->return_date);

            // Periksa jika tanggal kembali sudah lewat hari ini
            if ($returnDate->lt(Carbon::today())) {
                // Menghitung keterlambatan dengan nilai positif
                $lateDays = Carbon::today()->diffInDays($returnDate); // Akan menghasilkan angka positif jika terlambat
                $loan->update([
                    'status' => 'lated',
                    'late_days' => abs($lateDays), // Set late_days sesuai perhitungan
                ]);
            }
            // Periksa jika tanggal kembali adalah hari ini
            elseif ($returnDate->eq(Carbon::today())) {
                $loan->update([
                    'status' => 'borrowed',
                    'late_days' => 0, // Tidak dihitung keterlambatan
                ]);
            }
        }
    }


    public function index(Request $request)
    {
        $this->checkLateLoans(); // Panggil fungsi untuk cek peminjaman terlambat
        $status = $request->input('status', '');

        // Query untuk mengambil data sesuai filter status
        $loans = Loans::when($status, function ($query, $status) {
            return $query->where('status', $status);
        })->paginate(10);

        // Kirim data loans ke view, termasuk lateDays
        return view('officer.loan.list', [
            'loans' => $loans,
            'status' => $status,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $books = Books::where('stock', '>', 0)->get(); // Hanya buku dengan stok tersedia
        return view('officer.loan.add', compact('users', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'loan_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:loan_date',
        ]);

        $book = Books::findOrFail($request->book_id);

        if ($book->stock < 1) {
            return redirect()->back()->withErrors(['error' => 'Stok buku habis!']);
        }

        // Kurangi stok buku
        $book->decrement('stock');

        Loans::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'loan_date' => $request->loan_date,
            'return_date' => $request->return_date,
            'status' => 'borrowed',
        ]);

        return redirect()->route('officer.loan.list')->with('success', 'Peminjaman berhasil dilakukan!');
    }

    public function returnBook($id)
    {
        $loan = Loans::findOrFail($id);

        // Periksa jika status bukan 'borrowed' atau 'lated'
        if ($loan->status !== 'borrowed') {
            return redirect()->back()->with('error', 'Buku sudah dikembalikan atau status tidak valid!');
        }

        // Update status menjadi 'returned'
        $loan->update(['status' => 'returned']);

        // Tambah stok buku
        $book = Books::findOrFail($loan->book_id);
        $book->increment('stock');

        return redirect()->route('officer.loan.list')->with('success', 'Buku berhasil dikembalikan!');
    }




    public function destroy($id)
    {
        $loan = Loans::with('book')->find($id);
        if (!$loan) {
            return redirect()->route('officer.loan.list')->with('error', 'Data peminjaman tidak ditemukan.');
        }

        if ($loan->book && $loan->status !== 'returned') {
            $loan->book->increment('stock');
        }

        $loan->delete();

        return redirect()->route('officer.loan.list')->with('success', 'Berhasil hapus data peminjaman.');
    }

    public function exportExcel()
    {
        return Excel::download(new LoansExport, 'loans.xlsx');
    }
}
