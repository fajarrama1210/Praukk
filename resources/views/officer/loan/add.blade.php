@extends('officer.layouts.appOffice')

@section('title', 'Tambah Peminjaman')

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
    <style>
        /* Memastikan ukuran font lebih besar di dropdown select2 */
        .select2-container .select2-selection--single {
            height: 50px !important;
            font-size: 16px !important;
            padding: 10px !important;
        }

        .select2-container .select2-selection__arrow {
            top: 12px !important;
            right: 15px !important;

            /* Untuk menyesuaikan posisi panah */
        }

        /* Mengatur dropdown ketika dipilih */
        .select2-dropdown {
            font-size: 16px !important;
        }

        /* Agar ukuran text lebih besar pada elemen select */
        .select2-selection__rendered {
            line-height: 32px !important;
        }
    </style>
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-8">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Tambah Peminjaman</h5>
                        <a href="{{ route('officer.loan.list') }}">
                            <button class="btn btn-info">Kembali</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('officer.loan.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="user_id" class="form-label">Nama Peminjam</label>
                                <select id="user_id" name="user_id" class="form-control form-control-lg" required>
                                    <option value="" disabled selected>Cari nama peminjam...</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="book_id" class="form-label">Nama Buku</label>
                                <select id="book_id" name="book_id" class="form-control form-control-lg" required>
                                    <option value="" disabled selected>Cari nama buku...</option>
                                    @foreach ($books as $book)
                                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="loan_date" class="form-label">Tanggal Peminjaman</label>
                                <input type="date" id="loan_date" name="loan_date" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="return_date" class="form-label">Tanggal Pengembalian</label>
                                <input type="date" id="return_date" name="return_date" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#user_id').select2({
                placeholder: "Cari nama peminjam...",
                allowClear: true,
                width: '100%',
                dropdownParent: $(".content-wrapper")
            });

            $('#book_id').select2({
                placeholder: "Cari nama buku...",
                allowClear: true,
                width: '100%',
                dropdownParent: $(".content-wrapper")
            });
        });
    </script>
@endpush
