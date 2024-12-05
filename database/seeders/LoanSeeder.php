<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loans')->insert([
            [
                'user_id' => 3, // Sesuaikan dengan id pengguna yang ada
                'book_id' => 1, // Sesuaikan dengan id buku yang ada
                'loan_date' => Carbon::now()->subDays(10), // Tanggal pinjam 10 hari yang lalu
                'return_date' => Carbon::now()->subDays(3), // Tanggal kembali 3 hari yang lalu
                'status' => 'returned', // Status sudah dikembalikan
                'late_days' => 3, // Telat 3 hari
            ],
            [
                'user_id' => 4, // Sesuaikan dengan id pengguna yang ada
                'book_id' => 2, // Sesuaikan dengan id buku yang ada
                'loan_date' => Carbon::now()->subDays(5), // Tanggal pinjam 5 hari yang lalu
                'return_date' => Carbon::now()->addDays(2), // Tanggal kembali 2 hari mendatang
                'status' => 'on loan', // Status pinjaman yang masih berlangsung
                'late_days' => 0, // Belum terlambat
            ],
            [
                'user_id' => 5, // Sesuaikan dengan id pengguna yang ada
                'book_id' => 3, // Sesuaikan dengan id buku yang ada
                'loan_date' => Carbon::now()->subDays(15), // Tanggal pinjam 15 hari yang lalu
                'return_date' => Carbon::now()->subDays(10), // Tanggal kembali 10 hari yang lalu
                'status' => 'returned', // Status sudah dikembalikan
                'late_days' => 10, // Telat 10 hari
            ],
            [
                'user_id' => 6, // Sesuaikan dengan id pengguna yang ada
                'book_id' => 4, // Sesuaikan dengan id buku yang ada
                'loan_date' => Carbon::now()->subDays(7), // Tanggal pinjam 7 hari yang lalu
                'return_date' => Carbon::now()->addDays(3), // Tanggal kembali 3 hari mendatang
                'status' => 'on loan', // Status pinjaman yang masih berlangsung
                'late_days' => 0, // Belum terlambat
            ],
            [
                'user_id' => 7, // Sesuaikan dengan id pengguna yang ada
                'book_id' => 5, // Sesuaikan dengan id buku yang ada
                'loan_date' => Carbon::now()->subDays(12), // Tanggal pinjam 12 hari yang lalu
                'return_date' => Carbon::now()->subDays(6), // Tanggal kembali 6 hari yang lalu
                'status' => 'returned', // Status sudah dikembalikan
                'late_days' => 6, // Telat 6 hari
            ],
        ]);
    }
}
