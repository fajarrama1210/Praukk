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
                        <h2>Kategori Buku</h2>
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                                <path fill="#5D87FF"
                                    d="M23 2H1a1 1 0 0 0-1 1v18a1 1 0 0 0 1 1h22a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1m-1 18h-2v-1h-5v1H2V4h20zM10.29 9.71A1.71 1.71 0 0 1 12 8c.95 0 1.71.77 1.71 1.71c0 .95-.76 1.72-1.71 1.72s-1.71-.77-1.71-1.72m-4.58 1.58c0-.71.58-1.29 1.29-1.29a1.29 1.29 0 0 1 1.29 1.29c0 .71-.58 1.28-1.29 1.28S5.71 12 5.71 11.29m10 0A1.29 1.29 0 0 1 17 10a1.29 1.29 0 0 1 1.29 1.29c0 .71-.58 1.28-1.29 1.28s-1.29-.57-1.29-1.28M20 15.14V16H4v-.86c0-.94 1.55-1.71 3-1.71c.55 0 1.11.11 1.6.3c.75-.69 2.1-1.16 3.4-1.16s2.65.47 3.4 1.16c.49-.19 1.05-.3 1.6-.3c1.45 0 3 .77 3 1.71" />
                            </svg>
                        </div>
                        <h3 class="mt-4">{{ $category }}</h3>
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
                        <h2>Rak Buku</h2>
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="#5D87FF" d="M12 21.116q-1.684-1.374-3.721-2.168T4 18V8.654q2.294.135 4.36 1.095q2.065.96 3.64 2.378q1.575-1.418 3.64-2.378T20 8.654V18q-2.248.154-4.282.948T12 21.116m0-1.254q1.575-1.156 3.35-1.864T19 17.06V9.778q-1.96.325-3.741 1.264T12 13.458q-1.477-1.477-3.259-2.417T5 9.777v7.285q1.875.227 3.65.936T12 19.862m0-11.285q-1.333 0-2.282-.949q-.949-.95-.949-2.282t.95-2.281T12 2.115t2.282.95t.949 2.281t-.95 2.282T12 8.577m0-1q.921 0 1.576-.655t.655-1.576t-.656-1.576T12 3.116t-1.575.655t-.655 1.576t.656 1.575T12 7.577m0 5.88"/></svg>
                        </div>
                        <h3 class="mt-4">{{ $bookShelve }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card shadow border-bottom border-primary">
                <div class="card-body">
                    <div class="text-center">
                        <h2>Pengguna</h2>
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="#5D87FF" d="M12 11q.825 0 1.413-.588Q14 9.825 14 9t-.587-1.413Q12.825 7 12 7q-.825 0-1.412.587Q10 8.175 10 9q0 .825.588 1.412Q11.175 11 12 11Zm0 2q-1.65 0-2.825-1.175Q8 10.65 8 9q0-1.65 1.175-2.825Q10.35 5 12 5q1.65 0 2.825 1.175Q16 7.35 16 9q0 1.65-1.175 2.825Q13.65 13 12 13Zm0 11q-2.475 0-4.662-.938q-2.188-.937-3.825-2.574Q1.875 18.85.938 16.663Q0 14.475 0 12t.938-4.663q.937-2.187 2.575-3.825Q5.15 1.875 7.338.938Q9.525 0 12 0t4.663.938q2.187.937 3.825 2.574q1.637 1.638 2.574 3.825Q24 9.525 24 12t-.938 4.663q-.937 2.187-2.574 3.825q-1.638 1.637-3.825 2.574Q14.475 24 12 24Zm0-2q1.8 0 3.375-.575T18.25 19.8q-.825-.925-2.425-1.612q-1.6-.688-3.825-.688t-3.825.688q-1.6.687-2.425 1.612q1.3 1.05 2.875 1.625T12 22Zm-7.7-3.6q1.2-1.3 3.225-2.1q2.025-.8 4.475-.8q2.45 0 4.463.8q2.012.8 3.212 2.1q1.1-1.325 1.713-2.95Q22 13.825 22 12q0-2.075-.788-3.887q-.787-1.813-2.15-3.175q-1.362-1.363-3.175-2.151Q14.075 2 12 2q-2.05 0-3.875.787q-1.825.788-3.187 2.151Q3.575 6.3 2.788 8.113Q2 9.925 2 12q0 1.825.6 3.463q.6 1.637 1.7 2.937Z"/></svg>
                        </div>
                        <h3 class="mt-4">{{ $user}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
     <!-- Chart -->
     <div class="row mt-4">
        <div class="col-12">
            <div id="chart"></div>
        </div>
    </div>

    <script>
        var options = {
            series: [{
                name: 'Peminjaman',
                data: @json($chartData)
            }],
            chart: {
                type: 'area',
                height: 350
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yyyy'
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>

@endsection
