@extends('admin.layouts.appAdmin')
@section('title')
    List Kelas
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Kelas</h5>
                <a href="{{ route('admin.studentClass.add') }}">
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
                <tbody>
                    @foreach ($studentClasses as $index => $studentClass)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $studentClass->name }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('admin.studentClass.update', $studentClass->id) }}"><i
                                                class="bx bx-edit-alt me-2"></i> Edit</a>
                                        <form action="{{ route('admin.studentClass.delete', $studentClass->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item"><i class="bx bx-trash me-2"></i>
                                                Delete</button>
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
