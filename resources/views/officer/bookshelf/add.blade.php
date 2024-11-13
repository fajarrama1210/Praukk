@extends('officer.layouts.appOffice')
@section('title')
    Add Bookshelf
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-md-8">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Data</h5>
                    <a href="{{ route('listBookshelf') }}">
                        <button class="btn btn-info">Kembali</button>
                    </a>
                </div>

                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Nama Rak</label>
                            <input type="text" class="form-control" id="bookShelf" name="bookShelf"
                                placeholder="Masukkan Nama Rak" />
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
