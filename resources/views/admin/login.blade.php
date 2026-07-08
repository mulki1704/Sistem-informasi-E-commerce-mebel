@extends('layouts.main')

@section('konten')
    <section class=""
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

                    @if (session()->has('LoginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('LoginError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card shadow" style="border-radius: 1rem;">
                        <div class="card-body p-4 p-lg-5 text-black">
                            <form action="{{ route('admin.login.submit') }}" method="post">
                                @csrf
                                <div class="d-flex justify-content-center align-items-center">
                                    <span class="h1 mb-4">Login Admin</span>
                                </div>

                                <h5 class="fw-normal mb-0 pb-3" style="letter-spacing: 1px;">Masuk sebagai admin</h5>

                                <div class="form-outline mb-4 form-floating">
                                    <input type="email" id="email" placeholder="Email" name="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror" required
                                        value="{{ old('email') }}" autofocus />
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
                                        Login Admin <i class="bi bi-box-arrow-in-right"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
