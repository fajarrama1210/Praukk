@extends('auth.layouts.authCore')

@section('title', 'Halaman Register')

@section('content')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed"
    data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100">
        <div class="position-relative z-index-5">
            <div class="row">
                <div class="col-xl-4 d-none d-xl-flex align-items-center justify-content-center"
                    style="height: calc(100vh - 80px);">
                    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/login-security.svg"
                        alt="Illustration" class="img-fluid" width="500" style="margin-left: 80px">
                </div>
                <div class="col-xl-8">
                    <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                        <div class="col-sm-8 col-md-7 col-xl-9">
                            <h1>Selamat Datang Di Perpus Digital</h1>
                            <h4 class="mb-0">Registrasi</h4>
                            <form id="form-register" enctype="multipart/form-data" action="{{ route('register') }}"
                                method="post">
                                @csrf
                                <section>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="name">Nama</label>
                                            <input type="text" name="name" class="form-control" id="name" required />
                                            @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="nisn">NISN</label>
                                            <input type="text" name="nisn" class="form-control" id="nisn" required />
                                            @error('nisn')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="class_id">Kelas</label>
                                            <select name="class_id" class="form-select" id="class_id" required>
                                                <option value="" disabled selected>Pilih Kelas</option>
                                                @foreach ($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('class_id')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="major_id">Jurusan</label>
                                            <select name="major_id" class="form-select" id="major_id" required>
                                                <option value="" disabled selected>Pilih Jurusan</option>
                                                @foreach ($majors as $major)
                                                <option value="{{ $major->id }}">{{ $major->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('major_id')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control" id="email" required />
                                            @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                required />
                                            @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" id="showPasswordCheckbox">
                                        <label class="form-check-label text-dark" for="showPasswordCheckbox">
                                            Tampilkan Password
                                        </label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="logo" class="form-label">Foto (Max: 5MB, JPG/JPEG/PNG)</label>
                                        <input type="file" name="photo" class="form-control" id="logo" accept=".jpg,.jpeg,.png" required>
                                        @error('photo')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-2">Register</button>
                                </section>
                            </form>
                            <a href="{{ route('login') }}">Sudah punya akun?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('showPasswordCheckbox').addEventListener('change', function () {
        const passwordInput = document.getElementById('password');
        passwordInput.type = this.checked ? 'text' : 'password';
    });
</script>
@endsection
