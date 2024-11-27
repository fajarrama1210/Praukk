@extends('admin.layouts.appAdmin')
@section('title')
    Add Major
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-md-8">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Data</h5>
                    <a href="{{ route('admin.studentMajor.list') }}" class="btn btn-info">Kembali</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.major.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Jurusan" required />
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
