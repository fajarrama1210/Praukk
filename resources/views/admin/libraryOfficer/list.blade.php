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
                <a href="{{ route('addOfficer') }}">
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
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>
                            <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>1</strong>
                        </td>
                        <td><i class="fab fa-bootstrap fa-lg text-primary me-3"></i>Testing User</td>
                        <td><i class="fab fa-bootstrap fa-lg text-primary me-3"></i>Tesbting@gmail.com</td>
                        <td><i class="fab fa-bootstrap fa-lg text-primary me-3"></i><button type="button"
                                class="btn btn-secondary">Detail</button></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('updateOfficer') }}"><i
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
    <!--/ Basic Bootstrap Table -->
    </div>
@endsection
