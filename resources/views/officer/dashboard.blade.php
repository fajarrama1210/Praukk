@extends('officer.layouts.appOffice')
@section('title')
    Dhasboard
@endsection
@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card shadow border-bottom border-primary">
                <div class="card-body">
                    <div class="text-center">
                        <h2>Kelas</h2>
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                                <path fill="#5D87FF"
                                    d="M23 2H1a1 1 0 0 0-1 1v18a1 1 0 0 0 1 1h22a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1m-1 18h-2v-1h-5v1H2V4h20zM10.29 9.71A1.71 1.71 0 0 1 12 8c.95 0 1.71.77 1.71 1.71c0 .95-.76 1.72-1.71 1.72s-1.71-.77-1.71-1.72m-4.58 1.58c0-.71.58-1.29 1.29-1.29a1.29 1.29 0 0 1 1.29 1.29c0 .71-.58 1.28-1.29 1.28S5.71 12 5.71 11.29m10 0A1.29 1.29 0 0 1 17 10a1.29 1.29 0 0 1 1.29 1.29c0 .71-.58 1.28-1.29 1.28s-1.29-.57-1.29-1.28M20 15.14V16H4v-.86c0-.94 1.55-1.71 3-1.71c.55 0 1.11.11 1.6.3c.75-.69 2.1-1.16 3.4-1.16s2.65.47 3.4 1.16c.49-.19 1.05-.3 1.6-.3c1.45 0 3 .77 3 1.71" />
                            </svg>
                        </div>
                        <h3 class="mt-4">{{ $studentClass }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card shadow border-bottom border-primary">
                <div class="card-body">
                    <div class="text-center">
                        <h2>Total Buku</h2>
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                                <path fill="#5D87FF"
                                    d="M6 15h7l2-2H6zm0-4h6V9H6zM4 7v10h7l-2 2H2V5h20v3h-2V7zm18.9 5.3q.125.125.125.275t-.125.275l-.9.9L20.25 12l.9-.9q.125-.125.275-.125t.275.125zM13 21v-1.75l6.65-6.65l1.75 1.75L14.75 21zM4 7v10z" />
                            </svg>
                        </div>
                        <h3 class="mt-4">{{ $book }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card shadow border-bottom border-primary">
                <div class="card-body">
                    <div class="text-center">
                        <h2>Jurusan</h2>
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                                <path fill="#5D87FF"
                                    d="M7 2h10v3h3v4h2v2h-1v9h1v2H2v-2h1v-9H2V9h2V5h3zm2 3h6V4H9zm-4 6v9h3v-6h8v6h3v-9zm13-2V7H6v2zm-4 11v-4h-4v4z" />
                            </svg>
                        </div>
                        <h3 class="mt-4">{{ $studentMajor }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
