@extends('officer.layouts.appOffice')
@section('title')
    List Book
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Buku</h5>
                <a href="{{ route('officer.book.add') }}">
                    <button class="btn btn-primary">Tambah Data</button>
                </a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>JUDUL</th>
                        <th>PENULIS</th>
                        <th>PENERBIT</th>
                        <th>TAHUN TERBIT</th>
                        <th>KATEGORI</th>
                        <th>KODE BUKU</th>
                        <th>RAK</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($books as $book)
                    <tr>
                        <td>
                            <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>{{ $loop->iteration}}</strong>
                        </td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->writer }}</td>
                        <td>{{ $book->publisher }}</td>
                        <td>{{ $book->publish_year }}</td>
                        <td>{{ $book->category->name }}</td>
                        <td>{{ $book->code }}</td>
                        <td>{{ $book->shelves->name }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('officer.book.edit', ['books' => $book->id]) }}">
                                        <i class="bx bx-edit-alt me-2"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('officer.book.delete', ['books' => $book->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item">
                                            <i class="bx bx-trash me-2"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
