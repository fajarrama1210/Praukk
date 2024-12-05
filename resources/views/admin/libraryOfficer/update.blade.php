@extends('admin.layouts.appAdmin')
@section('title')
    Update Accont Officer
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-8">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Data Petugas</h5>
                        <a href="{{ route('admin.libraryOfficer.list') }}">
                            <button class="btn btn-info">Kembali</button>
                        </a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.libraryOfficer.put', $user->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label" for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $user->name) }}" placeholder="Masukkan Nama Petugas" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', $user->email) }}" placeholder="Masukkan Email" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="password">Password (Kosongkan jika tidak diubah)</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Masukkan Password" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="photo">Profile Photo</label>
                                <input type="file" class="form-control" id="photo" name="photo" />

                                @if ($user->photo)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $user->photo) }}" alt="Profile Photo"
                                            class="img-thumbnail" width="150">
                                    </div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
