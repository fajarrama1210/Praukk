@extends('admin.layouts.appAdmin')
@section('title')
    Add Accont Officer
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-8">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Tambah Petugas Perpus</h5>
                        <a href="{{ route('admin.libraryOfficer.list') }}">
                            <button class="btn btn-info">Kembali</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.libraryOfficer.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="mb-3">
                                <label class="form-label" for="name">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Masukkan Nama Petugas"
                                    value="{{ old('name') }}" />
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" placeholder="Masukkan Email"
                                    value="{{ old('email') }}" />
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb3">
                                <div class="form-password-toggle">
                                    <label class="form-label" for="basic-default-password12">Password</label>
                                    <div class="input-group">
                                        <input type="password"
                                            class="form-control @error('password')
                                        @enderror "
                                            id="basic-default-password12" name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="basic-default-password2" />
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <span id="basic-default-password2" class="input-group-text cursor-pointer"><i
                                                class="bx bx-hide"></i></span>
                                    </div>
                                </div>

                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="photo">Profile Photo</label>
                                <input type="file" class="form-control" id="photo" name="photo" />
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
