@extends('admin.layouts.appAdmin')
@section('title')
    Update Category
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-md-8">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Data</h5>
                    <a href="{{ route('admin.category.list') }}">
                        <button class="btn btn-info">Kembali</button>
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.category.update', $bookCategory->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Masukkan Nama Kategori" value="{{ old('name', $bookCategory->name) }}" />
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
