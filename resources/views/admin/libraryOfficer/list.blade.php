@extends('admin.layouts.appAdmin')
@section('title')
    List Acount Officer
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Penajaga Perpus</h5>
                <a href="{{ route('admin.libraryOfficer.add') }}">
                    <button class="btn btn-primary">Tambah Data</button>
                </a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>EAMAIL</th>
                        <th>DETAIL</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($officers as $key => $officer)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $officer->name }}</td>
                            <td>{{ $officer->email }}</td>
                            <td><a href="{{ route('admin.libraryOfficer.edit', $officer->id) }}"
                                    class="btn btn-secondary">Detail</a></td>
                            <td>
                                <!-- Delete Form -->
                                <form action="{{ route('admin.libraryOfficer.delete', $officer->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus petugas ini?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
