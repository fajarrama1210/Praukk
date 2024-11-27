@extends('admin.layouts.appAdmin')
@section('title')
    Update Kelas
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-md-8">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Kelas</h5>
                    <a href="{{ route('admin.studentClass.list') }}">
                        <button class="btn btn-info">Kembali</button>
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.studentClass.update.submit', $studentClass->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label" for="name">Nama Kelas</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $studentClass->name) }}" placeholder="Masukkan Nama Kelas" required />
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

