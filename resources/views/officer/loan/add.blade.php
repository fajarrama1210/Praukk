@extends('officer.layouts.appOffice')
@section('title')
    add loan
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-md-8">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Data</h5>
                    <a href="{{ route('listLoan') }}">
                        <button class="btn btn-info">Kembali</button>
                    </a>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Masukkan Nama Peminjam" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Nama Buku</label>
                            <input type="text" class="form-control" id="book" name="book"
                                placeholder="Masukkan Nama buku" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Tanggal Peminjaman</label>
                            <input type="date" class="form-control" id="loanDate" name="loanDate" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Tanggal Pengembalian</label>
                            <input type="date" class="form-control" id="returnDate" name="returnDate"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

