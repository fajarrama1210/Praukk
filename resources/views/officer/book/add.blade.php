@extends('officer.layouts.appOffice')
@section('title')
    Add Book
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-md-8">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Data</h5>
                    <a href="{{ route('officer.book.list') }}">
                        <button class="btn btn-info">Kembali</button>
                    </a>
                </div>

                <div class="card-body">
                    <form action="{{ route('officer.book.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="title">Judul Buku</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Masukkan Nama Buku" value="{{ old('title') }}"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="writer">Penulis</label>
                            <input type="text" class="form-control" id="writer" name="writer"
                                placeholder="Masukkan Nama Penulis" value="{{ old('witer') }}"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="publisher">Penerbit</label>
                            <input type="text" class="form-control" id="publisher" name="publisher"
                                placeholder="Masukkan Nama Penerbit" value="{{ old('publisher') }}"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="publish_year">Tahun Terbit</label>
                            <input type="number" class="form-control" id="publicationYear" name="publish_year"
                                placeholder="Masukkan Tahun Terbit" value="{{ old('publish_year') }}"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="code">Kode Buku</label>
                            <input type="text" class="form-control" id="bookCode" name="code"
                                placeholder="Masukkan Kode Buku" value="{{ old('code') }}"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="stock">Stok Buku</label>
                            <input type="number" class="form-control" id="stock" name="stock"
                                placeholder="Masukkan Kode Buku" value="{{ old('stock') }}"/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="category_id">Kategori Buku</label>
                            <select class="form-control" id="category_id" name="category_id">
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="shelf_id">Rak Buku</label>
                            <select class="form-control" id="shelf_id" name="shelf_id">
                                <option value="">Pilih Rak</option>
                                @foreach($shelves as $shelve)
                                    <option value="{{ $shelve->id }}" {{ old('shelf_id') == $shelve->id ? 'selected' : '' }}>
                                        {{ $shelve->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
