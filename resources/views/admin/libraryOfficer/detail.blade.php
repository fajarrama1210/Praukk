@extends('admin.layouts.appAdmin')

@section('title')
    Detail Akun Petugas
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-md-10">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Detail Data Petugas</h5>
                        <a href="{{ route('admin.libraryOfficer.list') }}" class="btn btn-info">Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong>Nama:</strong>
                                <p>{{ $user->name }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Email:</strong>
                                <p>{{ $user->email }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Role:</strong>
                                <p>{{ $user->getRoleNames()->first() }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <strong>Foto Profil:</strong><br>
                                @if($user->photo)
                                    <img src="{{ asset('storage/' . $user->photo) }}" alt="Foto Profil" class="img-fluid rounded" width="200">
                                @else
                                    <p>Tidak ada foto profil.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
