@extends('officer.layouts.appOffice')
@section('title')
    List Category
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Kategori Buku </h5>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
