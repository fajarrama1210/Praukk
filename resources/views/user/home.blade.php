@extends('user.layout') <!-- Menggunakan layout utama -->

@section('title', 'Home') <!-- Mengatur judul halaman -->

@section('content')
    <div class="">
        <div class="bcontainer g-transparent">
            <section class="bg-white">
                <div class="container">
                    <div class="row">
                        <!-- Kolom pertama dengan teks -->
                        <div class="col-md-6 pt-md-5">
                            <div class="pt-md-5 text-md-start text-center big-title">
                                <p class="text-gray-md mb-1" style="font-size: 65px">Selamat Datang di</p>
                                <h2 class="fw-bolder text-gray mb-0 font-130px"><b
                                        style="color: #696cff;">SneatLib</b></h2>
                            </div>
                        </div>

                        <!-- Kolom kedua dengan logo SVG -->
                        <div class="col-md-6 text-center pt-md-5">
                            <span class="app-brand-logo demo">
                                <img src="{{ asset('dashboardreal.png') }}" alt="Dashboard"
                                    style="width: 600px; height: 500px; padding-left: 100px;">
                            </span>

                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="col-md-6 pt-3">
                        <a href="#katalog" class="text-decoration-none">
                            <div class="card card-menu">
                                <div class="card-body d-flex align-items-center flex-column">
                                    <div class="box-icon mb-4">
                                        <svg width="35" viewBox="0 0 22 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M21 10V9C21 5.229 21 3.343 19.828 2.172C18.656 1.001 16.771 1 13 1H9C5.229 1 3.343 1 2.172 2.172C1.001 3.344 1 5.229 1 9C1 12.771 1 14.657 2.172 15.828C3.344 16.999 5.229 17 9 17H12"
                                                stroke="#635BFF" stroke-width="1.5" stroke-linecap="round" />
                                            <path opacity="0.4" d="M9 13H5M1 7H21" stroke="#635BFF" stroke-width="1.5"
                                                stroke-linecap="round" />
                                            <path
                                                d="M17 17C18.6569 17 20 15.6569 20 14C20 12.3431 18.6569 11 17 11C15.3431 11 14 12.3431 14 14C14 15.6569 15.3431 17 17 17Z"
                                                stroke="#635BFF" stroke-width="1.5" />
                                            <path d="M19.5 16.5L20.5 17.5" stroke="#635BFF" stroke-width="1.5"
                                                stroke-linecap="round" />
                                        </svg>
                                    </div>
                                    <h4 class="mb-1"><b>Mulai Cek Buku dan Keterlambatan</b></h4>
                                    <p class="mb-0 text-gray-md">Sentuh untuk scroll</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>

            <div class="batas mb-5  ">
                <div class="d-flex justify-content-center bg-transparent jarak">
                </div>
            </div>
        </div>

        <div class="container my-4">
            <div class="d-flex justify-content-center">
                <button class="btn m-3 mb-0" id="prevButton"> Katalog</button>
                <button class="btn m-3 mb-0" id="nextButton">Koleksi </button>
            </div>
            <!-- Wrapper untuk kedua section -->
            <div style="width: 300%;">
                <div class="d-flex overflow-hidden" id="sliderWrapper" style="width: 90%; height: 100%; transition: transform 0.5s ease-in-out;">
                    <!-- Section Kiri: Katalog Buku -->
                    <div class="flex-shrink-0" style="width: 85vw; padding: 10px;">
                        <div class="container pt-5 pb-2">
                                <a href="#home" class="btn btn-sm btn-outline-secondary rounded-3 mb-3">← Kembali</a>
                                <div class="p-3 p-md-0 pb-md-4">
                                    <h1>Katalog Buku</h1>
                                </div>
                            </div>
                       <div class="container mb-4">
                            <div class="card-body">
                                <div class="row gx-3 gy-2 align-items-center">
                                    <div class="col-md-3">
                                        <label class="form-label" for="selectTypeOpt">PENCARIAN DATA</label>
                                        <form action="{{ url('book') }}" method="GET" class="row gy-2 gx-3 align-items-center" onsubmit="return checkForLogin()">
                                            <input type="hidden" name="filter_on" value="true">
                                            <div class="col- mb-2">
                                                <label class="visually-hidden" for="filter_name">Kata kunci Nama</label>
                                                <input type="text" class="form-control" id="filter_name" name="filter_name"
                                                    value="{{ $filter['filter_name'] ?? '' }}" placeholder="Kata kunci Nama">
                                            </div>
                                            <div class="col-md-auto mb-2">
                                                <label class="visually-hidden" for="filter_category_id">Kategori</label>
                                                <select class="form-select" id="filter_category_id" name="filter_category_id">
                                                    <option value="">Semua Kategori</option>
                                                    @foreach ($bookCategories as $b)
                                                        <option value="{{ $b->id }}" @selected($b->id == ($filter['filter_category_id'] ?? ''))>
                                                            {{ $b->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-0">
                                                <button type="submit" class="btn btn-primary"><b class="bg-transparent">Pencarian</b></button>
                                                @if (!empty($filter['filter_on']))
                                                    <a href="{{ url('book') }}" class="btn btn-outline-secondary ms-1">Reset Filter</a>
                                                @endif
                                            </div>
                                        </form>
                                        
                                        <script>
                                            function checkForLogin() {
                                                var searchQuery = document.getElementById('filter_name').value.trim().toLowerCase();
                                                if (searchQuery === "login") {
                                                    window.location.href = '/login';
                                                    return false;  // Menghentikan pengiriman form
                                                }
                                                return true;  // Melanjutkan pengiriman form
                                            }
                                        </script>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
            
                        <hr class="mb-5 container">
            
                        <div class="container">
                            <div class="row">
                                @foreach ($books as $b)
                                <div class="col-md-6 mb-1">
                                    <div class="card card-button card-default mb-4">
                                        <div class="card-body">
                                            <h5 class="mb-0 fs-md"><b>{{ $b->title }}</b></h5>
                                            <div class="fs-sm">
                                                <p class="mb-1 text-primary"><b>{{ $b->category->name }}</b></p>
                                                <p class="mb-0 text-gray-md">
                                                    {{ $b->publish_year }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="card-footer" style="border-top: none">
                                            <div class="row">
                                                <div class="col-md-6 d-flex align-items-center">
                                                    <p class="mb-0 text-gray-md fs-sm"><b>Stock: {{ $b->stock }}</b></p>
                                                </div>
                                                <div class="col-md-6 text-md-end">
                                                    <div class="mb-2 text-gray-md fs-md">
                                                        @if ($b->stock > 0)
                                                            <span class="badge bg-success">Tersedia!</span>
                                                        @else
                                                            <span class="badge bg-warning">Tidak Tersedia</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
            
                                @if (!count($books))
                                    <div class="text-center text-gray-md">
                                        <img src="{{ url('admin-ui') }}/assets/images/empty-book.png" class="img-fluid mt-2 mt-md-0"
                                            alt="" width="200">
                                        <h5 class="mt-4 mb-1">Buku tidak ditemukan 🙁</h5>
                                        <p>Coba sesuaikan filter atau hubungi admin perpustakaan</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                 
                    </div>     
             
                    <!-- Section Kanan: Koleksi -->
                    <div class="flex-shrink-0" style=" padding: 20px; margin-left: 10%;">
                        <div class="row">
                            {{-- @forelse ($collections as $collection) --}}
                            <div class="col-md-12 mb-4">
                                <div class="card h-100">
                                    <div class="card-body d-flex align-items-center flex-column" style="width: 90vw; height:100vh">
                                        <h3 class="mb-5 text-center">Koleksi Anda</h3>
                                        <div class="container my-4">
                                            <table style="width: 70vw; margin: 0 auto; border-collapse: separate; border-spacing: 0 10px;">
                                                <!-- Baris Data -->
                                                <tr style="height: 80px; background-color: #ffffff; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); border-radius: 0.375rem;">
                                                    <td style="border: 1px solid #ccc; border-radius: 0.375rem 0 0 0.375rem; text-align: center; width: 10%;">1</td>
                                                    <td style="border: 1px solid #ccc; text-align: left; width: 50%;">Belajar Laravel</td>
                                                    <td style="border: 1px solid #ccc; text-align: center; width: 20%;">
                                                        <!-- Rating -->
                                                        8.0
                                                    </td>
                                                    <td style="border: 1px solid #ccc; border-radius: 0 0.375rem 0.375rem 0; text-align: center; width: 20%;">
                                                        <!-- Tombol Trash -->
                                                        <button class="btn btn-danger btn-sm">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr style="height: 80px; background-color: #ffffff; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); border-radius: 0.375rem;">
                                                    <td style="border: 1px solid #ccc; border-radius: 0.375rem 0 0 0.375rem; text-align: center;">2</td>
                                                    <td style="border: 1px solid #ccc;">Mastering PHP</td>
                                                    <td style="border: 1px solid #ccc; text-align: center;">
                                                        <span>7.9</span>
                                                    </td>
                                                    <td style="border: 1px solid #ccc; border-radius: 0 0.375rem 0.375rem 0; text-align: center;">
                                                        <button class="btn btn-danger btn-sm">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr style="height: 80px; background-color: #ffffff; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); border-radius: 0.375rem;">
                                                    <td style="border: 1px solid #ccc; border-radius: 0.375rem 0 0 0.375rem; text-align: center;">3</td>
                                                    <td style="border: 1px solid #ccc;">Design Patterns</td>
                                                    <td style="border: 1px solid #ccc; text-align: center;">
                                                        <span>5.7</span>
                                                    </td>
                                                    <td style="border: 1px solid #ccc; border-radius: 0 0.375rem 0.375rem 0; text-align: center;">
                                                        <button class="btn btn-danger btn-sm">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            {{-- @empty --}}
                            {{-- <p class="text-center">Anda belum memiliki koleksi.</p> --}}
                            {{-- @endforelse --}}
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Tombol Navigasi -->
        </div>
        
        <script>
            let currentSlide = 0;
        
            const sliderWrapper = document.getElementById('sliderWrapper');
            const prevButton = document.getElementById('prevButton');
            const nextButton = document.getElementById('nextButton');
        
            // Navigasi ke slide sebelumnya
            prevButton.addEventListener('click', () => {
                currentSlide = Math.max(currentSlide - 1, 0); // Jangan geser lebih dari batas awal
                sliderWrapper.style.transform = `translateX(-${currentSlide * 100}%)`;
            });
        
            // Navigasi ke slide berikutnya
            nextButton.addEventListener('click', () => {
                currentSlide = Math.min(currentSlide + 1, 1); // Jangan geser lebih dari batas akhir
                sliderWrapper.style.transform = `translateX(-${currentSlide * 50}%)`;
            });
        </script>
        
        <section class="col-md-12 bg-white rounded-5" id="telat">
            <div class="container">
                <div class="row">
                    <div class="d-flex justify-content-center">
                        <h4 class="fw-bolder fs-md mb-5 mt-5">Keterlambatan Pinjam Siswa</h4>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mb-1">
                        <div class="card card-button card-default mb-4">
                            <div class="card-body">
                                <h5 class="mb-0 fs-md"><b>Jean Samuel Putra</b></h5>
                                <div class="fs-sm">
                                    <p class="mb-1 text-primary"><b>Buku: <span>Hujan</span></b></p>
                                </div>
                            </div>
                            <div class="card-footer" style="border-top: 10px; background-color:rgb(255, 60, 0)">
                                <div class="row">
                                    <div class="col-md-6 d-flex align-items-center" ">
                                                <p class="mb-0-md fs-sm" style=""><b style="color:rgb(227, 227, 227);">Terlambat: 30 Hari</b></p>
                                            </div>
                                            <div class="col-md-6 text-md-end" style="background-color:rgb(255, 60, 0)">
                                                <div class="mb-2 text-gray-md fs-md">
                                                    <span class="badge bg-warning">Terlambat</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>
        </section>

        <section style="height: 300px; width:100vw;" class="bg-white">
            <div class="d-flex flex-column align-items-center justify-content-center">
                <h3 class="text-center" style="margin-top: 100px">Read some knowledge never wrong</h3>
            </div>
        </section>
    </div>
@endsection
