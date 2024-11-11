@extends('officer.layouts.appOffice')
@section('title')
    list loan
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-semibold py-3 mb-4"><span class="text-muted fw-light">PEMINJAMAN BUKU</span> </h4>

        <!-- Bootstrap Toasts with Placement -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row gx-3 gy-2 align-items-center">
                    <div class="col-md-3">
                        <label class="form-label" for="selectTypeOpt">PENCARIAN DATA</label>
                        <select id="selectTypeOpt" class="form-select color-dropdown">
                            <option value="bg-primary" selected>Semua Status</option>
                            <option value="bg-secondary">Terlambat!</option>
                            <option value="bg-success">Dalam Peminjaman</option>
                            <option value="bg-danger">Sudah Dikembalikan</option>
                            <option value="bg-warning">Dibatalkan</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="showToastPlacement">&nbsp;</label>
                        <button id="showToastPlacement" class="btn btn-primary d-block">Cari Data</button>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Bootstrap Toasts with Placement -->

        <!-- Bootstrap Toasts Styles -->
        <div class="card mb-4">
            <div class="row g-0">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Peminjaman</h5>
                    <a href="{{ route('addLoan') }}">
                        <button class="btn btn-primary">Buat Peminjaman</button>
                    </a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA PEMINJAM</th>
                            <th>TANGGAL PEMINJAM</th>
                            <th>JUMLAH</th>
                            <th>STATUS</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td>
                                <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>1</strong>
                            </td>
                            <td>TESTING</td>
                            <td>12-12-2024</td>
                            <td>1</td>
                            <td>2024</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('updateCategory') }}"><i
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
        <!--/ Bootstrap Toasts Styles -->
    </div>

@endsection
