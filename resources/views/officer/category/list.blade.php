@extends('officer.layouts.appOffice')
@section('title')
    List Category
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Kategori Buku</h5>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    {{-- LOOPING DATA KATEGORI BUKU --}}
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td> <!-- Displaying index of the loop -->
                            <td>{{ $category->name }}</td> <!-- Display category name -->
                            {{-- <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('admin.category.edit', ['bookCategory' => $category->id]) }}">
                                            <i class="bx bx-edit-alt me-2"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.category.delete', ['bookCategory' => $category->id]) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item">
                                                <i class="bx bx-trash me-2"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
