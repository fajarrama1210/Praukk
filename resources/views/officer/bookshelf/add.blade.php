@extends('officer.layouts.appOffice')
@section('title')
    Add Bookshelf
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-md-8">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Data</h5>
                    <a href="{{ route('officer.bookshelf.list') }}">
                        <button class="btn btn-info">Kembali</button>
                    </a>
                </div>

                <div class="card-body">
                    <form action="{{ route('officer.bookshelf.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="name">Nama Rak</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Masukkan Nama Rak"  value="{{ old('name') }}"/>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
