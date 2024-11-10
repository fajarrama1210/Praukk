@extends('admin.layouts.appAdmin')
@section('title')
    Add Book
@endsection

@section('content')
    @extends('admin.layouts.appAdmin')
@section('title')
    Update Category
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Basic Layout -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-8">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Data</h5>
                        <a href="{{ route('listBook') }}">
                            <button class="btn btn-info">Kembali</button>
                        </a>
                    </div>

                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Judul Buku</label>
                                <input type="text" class="form-control" id="titleBook" name="titleBook"
                                    placeholder="Masukkan Nama Buku" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Penulis</label>
                                <input type="text" class="form-control" id="writer" name="writer"
                                    placeholder="Masukkan Nama Penulis" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Penerbit</label>
                                <input type="text" class="form-control" id="publisher" name="publisher"
                                    placeholder="Masukkan Nama Penerbit" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Tahun Terbit</label>
                                <input type="date" class="form-control" id="publicationYear" name="publicationYear"
                                    placeholder="Masukkan Nama Tahun Terbit" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Kode Buku</label>
                                <input type="number" class="form-control" id="bookCode" name="bookCode"
                                    placeholder="Masukkan Kode Buku" />
                            </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@endsection
