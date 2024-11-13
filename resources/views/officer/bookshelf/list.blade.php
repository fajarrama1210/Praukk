@extends('officer.layouts.appOffice')
@section('title')
    List Bookshelf
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Buku</h5>
                <a href="{{ route('addBookshelf') }}">
                    <button class="btn btn-primary">Tambah Data</button>
                </a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>
                            <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>1</strong>
                        </td>
                        <td>JURUSAN IT</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('updateBookshelf') }}"><i
                                            class="bx bx-edit-alt me-2"></i>
                                        Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-2"></i>
                                        Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
