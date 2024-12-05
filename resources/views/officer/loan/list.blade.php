@extends('officer.layouts.appOffice')

@section('title')
    List Loan
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-semibold py-3 mb-4"><span class="text-muted fw-light">PEMINJAMAN BUKU</span> </h4>

        <!-- Filter Data -->
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('officer.loan.list') }}" method="GET">
                    <div class="row gx-3 gy-2 align-items-center">
                        <div class="col-md-3">
                            <label class="form-label" for="selectStatus">PENCARIAN DATA</label>
                            <select id="selectStatus" name="status" class="form-select">
                                <option value="" {{ $status === '' ? 'selected' : '' }}>Semua Status</option>
                                <option value="borrowed" {{ $status === 'borrowed' ? 'selected' : '' }}>Dalam Peminjaman
                                </option>
                                <option value="returned" {{ $status === 'returned' ? 'selected' : '' }}>Sudah Dikembalikan
                                </option>
                                <option value="lated" {{ $status === 'lated' ? 'selected' : '' }}>Terlambat</option>
                                <option value="canceled" {{ $status === 'canceled' ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="searchButton">&nbsp;</label>
                            <button id="searchButton" class="btn btn-primary d-block">Cari Data</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <!-- /Filter Data -->

        <!-- Daftar Peminjaman -->
        <div class="card mb-4">
            <div class="row g-0">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Daftar Peminjaman</h5>
                    <div>
                        <a href="{{ route('officer.loans.export') }}" class="m-4">
                            <button class="btn btn-primary ">export excel</button>
                        </a>
                        <a href="{{ route('officer.loan.add') }}">
                            <button class="btn btn-primary">Buat Peminjaman</button>
                        </a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA PEMINJAM</th>
                            <th>BUKU</th>
                            <th>TANGGAL PINJAM</th>
                            <th>TANGGAL KEMBALI</th>
                            <th>STATUS</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($loans as $loan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $loan->user->name }}</td>
                                <td>{{ $loan->book->title }}</td>
                                <td>{{ $loan->loan_date }}</td>
                                <td>{{ $loan->return_date ? $loan->return_date : '-' }}</td>
                                <td>
                                    @if ($loan->status === 'borrowed')
                                        <span class="badge bg-success">Dalam Peminjaman</span>
                                    @elseif ($loan->status === 'returned')
                                        <span class="badge bg-primary">Sudah Dikembalikan</span>
                                    @elseif ($loan->status === 'lated' && $loan->late_days > 0)
                                        <span class="badge bg-danger">Terlambat {{ $loan->late_days }} Hari</span>
                                    @elseif ($loan->status === 'canceled')
                                        <span class="badge bg-danger">Dibatalkan</span>
                                    @endif

                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            @if ($loan->status === 'borrowed')
                                                <form action="{{ route('officer.loan.return', $loan->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="dropdown-item" type="submit">
                                                        <i class="bx bx-arrow-back me-2"></i>Kembalikan
                                                    </button>
                                                </form>
                                            @endif

                                            <!-- Delete Form -->
                                            <form action="{{ route('officer.loan.delete', $loan->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"><i
                                                        class="bx bx-trash me-2"></i>Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Belum ada data peminjaman</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /Daftar Peminjaman -->
    </div>
@endsection
