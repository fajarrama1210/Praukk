<?php

namespace App\Exports;

use App\Models\Loans;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LoansExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Muat data relasi dan format output
        return Loans::with(['user', 'book'])->get()->map(function ($loan) {
            return [
                'ID' => $loan->id,
                'Nama Peminjam' => $loan->user->name,
                'Judul Buku' => $loan->book->title,
                'Tanggal Pinjam' => $loan->loan_date,
                'Tanggal Kembali' => $loan->return_date ?? '-',
                'Status' => $this->formatStatus($loan->status),
                'Hari Terlambat' => $loan->late_days ?? 0,
            ];
        });
    }

    /**
     * Headings untuk file Excel.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Nama Peminjam',
            'Judul Buku',
            'Tanggal Pinjam',
            'Tanggal Kembali',
            'Status',
            'Hari Terlambat',
        ];
    }

    /**
     * Format status untuk output.
     *
     * @param string $status
     * @return string
     */
    private function formatStatus(string $status): string
    {
        switch ($status) {
            case 'borrowed':
                return 'Dalam Peminjaman';
            case 'returned':
                return 'Sudah Dikembalikan';
            case 'lated':
                return 'Terlambat';
            case 'canceled':
                return 'Dibatalkan';
            default:
                return 'Tidak Diketahui';
        }
    }
}
