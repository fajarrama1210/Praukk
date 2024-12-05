<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Sneat Library</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Page CSS -->
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body style="height: auto;">
    <section class="bg-white">
        <div class="container">
            <nav class="container navbar navbar-expand-lg bg-white" id="home">
                <a href="index.html" class="app-brand-link ms-5">
                    <span class="app-brand-text demo menu-text fw-bolder ms-2">Sneat</span>
                </a>
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item ms-3 bg-primary rounded-3" style="width: 300px;">
                                <a class="nav-link text-center" href="{{ route('home.index') }}"
                                    style="color: aliceblue">Kembali ke menu utama</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body d-flex align-items-center flex-column" style="height:100%">
                            <section class="" style="width: 85vw; padding: 10px;">
                                <div class="row container mb-4">
                                    <div class="col-md-6">
                                        <h3 class="text-start">Buku</h3>
                                        @foreach ($books as $b)
                                            <div class="col-md-12 mb-1">
                                                <!-- Card Buku -->
                                                    <a href="#"
                                                    class="card card-default mb-4 text-start book-card"
                                                    data-id="{{ $b->id }}"
                                                    data-title="{{ $b->title }}">
                                                    <div class="card-body d-flex justify-content-between">
                                                        <div>
                                                            <h5 class="mb-0"><b>{{ $b->title }}</b></h5>
                                                            <p class="text-primary mb-1"><b>{{ $b->category->name }}</b></p>
                                                            <p class="text-gray-md">{{ $b->publish_year }}</p>
                                                        </div>
                                                        <div class="d-flex flex-col">
                                                                <form action="" method="POST" style="margin: 0;" @guest onsubmit="return showLoginAlert();" @endguest>
                                                                    @csrf
                                                                    <input type="hidden" name="book_id" value="{{ $b->id }}">
                                                                    <div style="display: flex; flex-direction: column; align-items: center;">
                                                                        <button type="submit" class="bg-transparent" style="border: none">
                                                                            <img src="{{ asset('like-2.png') }}" alt="like"
                                                                                    style="width: 30px; height: 30px; background: transparent;">
                                                                        </button>
                                                                        <span>3</span>
                                                                    </div>
                                                                </form>                                                                                                     
                                                                <form action="" method="POST" style="margin: 0;" @guest onsubmit="return showLoginAlert();" @endguest>
                                                                    @csrf
                                                                    <input type="hidden" name="book_id" value="{{ $b->id }}">
                                                                    <div style="display: flex; flex-direction: column; align-items: center;">
                                                                        <button type="submit" class="bg-transparent" style="border: none">
                                                                            <img src="{{ asset('like-2.png') }}" alt="like"
                                                                            style="width: 30px; height: 30px; background: transparent; transform: rotate(180deg);">
                                                                        </button>
                                                                        <span>3</span>
                                                                    </div>
                                                                </form>                                                                                                     
                                                                
                                                            </div>
                                                    </div>
                                                    <div class="card-footer d-flex justify-content-between"
                                                        style="height: 70px">
                                                        <p class="text-gray-md">Stok: {{ $b->stock }}</p>
                                                        @if ($b->stock > 0)
                                                            <span class="badge bg-success">Tersedia</span>
                                                        @else
                                                            <span class="badge bg-warning">Tidak Tersedia</span>
                                                        @endif
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-6">
                                        <section class="col-md-12">
                                            <div class="">
                                                <!-- Section Ulasan -->
                                                <div class="container card-body d-flex align-items-start flex-column"
                                                    id="bookReviewSection">
                                                    <div class="d-flex flex-row">
                                                        <h3 style="margin-left: 50px;">Ulasan Buku :<span id="reviewTitle" class="fw-bold mb-4"></span></h3>
                                                    </div>
                                                    <div class="form-group mt-4">
                                                        @auth
                                                        <form action="{{ route('reviews.store') }}" method="POST" style="d-flex">
                                                            @csrf
                                                            <!-- Hidden input untuk book_id -->
                                                            <input type="hidden" name="book_id" id="bookIdInput" value="">
                                                            <input type="text" class="form-control" style="width: 400px;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" id="newComment" rows="3" placeholder="Tulis ulasan..." name="comment">
                                                            <button class="input-group-text btn btn-primary" id="submitComment">Kirim</button>
                                                        </form>
                                                        
                                                        @else
                                                            <p class="text-danger">Anda harus login untuk menulis ulasan.</p>
                                                        @endauth
                                                    </div>
                                                    {{-- @foreach ($review as $komen)
                                                    
                                                    @endforeach --}}
                                                    <div style="margin-top: 50px">
                                                        <span>User:</span>
                                                        <span>Komen</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <script>
document.addEventListener("DOMContentLoaded", () => {
    let selectedBookId = null;

    // Handle click event for book cards
    document.querySelectorAll('.book-card').forEach(card => {
        card.addEventListener('click', function () {
            selectedBookId = this.dataset.id;
            const title = this.dataset.title;

            document.getElementById('reviewTitle').innerText = title;
            document.getElementById('bookIdInput').value = selectedBookId;

            // Fetch reviews for selected book
            fetchReviews(selectedBookId);
        });
    });

    // Fetch reviews from the server
    function fetchReviews(bookId) {
        fetch(`/reviews/${bookId}`)
            .then(response => response.json())
            .then(reviews => {
                const reviewsContainer = document.getElementById('commentsContainer');
                reviewsContainer.innerHTML = '';

                if (reviews.length === 0) {
                    reviewsContainer.innerHTML = '<p class="text-gray-md">Belum ada komentar.</p>';
                } else {
                    reviews.forEach(review => {
                        const reviewElement = document.createElement('div');
                        reviewElement.className = 'mb-3';
                        reviewElement.innerHTML = `
                            <p><b>${review.user.name}</b></p>
                            <p>${review.review}</p>
                            <hr>
                        `;
                        reviewsContainer.appendChild(reviewElement);
                    });
                }
            });
    }

    // Submit review
    document.getElementById('submitComment')?.addEventListener('click', function () {
        const newCommentText = document.getElementById('newComment').value;

        if (newCommentText.trim() === '') {
            alert('Komentar tidak boleh kosong!');
            return;
        }

        // Submit review to the server
        fetch('/reviews', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                book_id: selectedBookId,
                review: newCommentText
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                fetchReviews(selectedBookId); // Refresh reviews
                document.getElementById('newComment').value = ''; // Clear the input field
            } else {
                alert('Terjadi kesalahan, coba lagi.');
            }
        });
    });
});



    </script>
</body>

</html>
