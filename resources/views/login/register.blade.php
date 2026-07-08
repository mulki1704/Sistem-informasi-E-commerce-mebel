@extends('layouts.main')

@section('konten')
    <section
        style="min-height: calc(100vh - 180px); width: 100%; margin: 0; padding: 0 0 180px 0; background-image: url('ASET/kayu/backgroun.webp'); background-position: center center; background-size: cover; background-repeat: no-repeat;">
        <div class="container mb-5 py-5">
            <div class="row d-flex justify-content-center align-items-center pb-5 py-5">
                <div class="col-lg-6 pt-5 mt-5">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card shadow" style="border-radius: 1rem;">
                        <div class="card-body p-4 p-lg-5 text-black">
                            <form action="/register" method="post">
                                @csrf
                                <div class="d-flex justify-content-center align-items-center">
                                    <span class="h1 mb-4">Daftar Akun</span>
                                </div>

                                <h5 class="fw-normal mb-0 pb-3" style="letter-spacing: 1px;">Buat akun pelanggan baru</h5>

                                <div class="form-outline mb-4 form-floating">
                                    <input type="text" id="username" placeholder="Username" name="username"
                                        class="form-control form-control-lg @error('username') is-invalid @enderror"
                                        required value="{{ old('username') }}" autofocus />
                                    <label class="form-label" for="username">Username</label>
                                    @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4 form-floating">
                                    <input type="email" id="email" placeholder="Email" name="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror" required
                                        value="{{ old('email') }}" />
                                    <label class="form-label" for="email">Email</label>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4 form-floating">
                                    <input type="password" id="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        required placeholder="Password" name="password" />
                                    <label class="form-label" for="password">Password</label>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="pt-1 mb-4">
                                    <button class="btn btn-lg btn-block" style="background-color: #755207; color:white;"
                                        type="submit">
                                        Daftar <i class="bi bi-box-arrow-in-right"></i>
                                    </button>
                                </div>

                                <div class="text-center">
                                    <p class="mb-2">Sudah punya akun?</p>
                                    <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-sm">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
