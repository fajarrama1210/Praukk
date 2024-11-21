@extends('officer.layouts.appOffice')
@section('title')
    Tambah Peminjaman
@endsection

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
                            <label class="form-label" for="user_id">Nama Peminjam</label>
                            <select class="form-control" id="user_id" name="user_id">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="book_id">Nama Buku</label>
                            <select class="form-control" id="book_id" name="book_id" style="width: 100%">
                                @foreach ($books as $book)
                                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="loan_date">Tanggal Peminjaman</label>
                            <input type="date" class="form-control" id="loan_date" name="loan_date" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="return_date">Tanggal Pengembalian</label>
                            <input type="date" class="form-control" id="return_date" name="return_date" />
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Menginisialisasi Select2 pada elemen dengan id 'book_id'
        $('#book_id').select2({
            placeholder: "Cari nama buku...",
            allowClear: true
        });
    });
</script>
@endsection
