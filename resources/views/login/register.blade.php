@extends('layouts.main')

@section('konten')

<section class="vh-100" style="background-size: cover; background-image: url('ASET/x1/bg.png') ;">

    <div class="container mb-5 py-5">
        <div class="row d-flex justify-content-center align-items-center pb-5 py-5">
            <div class=" col-lg-6 pt-5 mt-5">

                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="card  shadow" style="border-radius: 1rem;">

                    <div class="card-body p-4 p-lg-5 text-black">

                        <form action="/register" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex justify-content-center align-items-center">
                                <span class="h1 mb-4">mebelid</span>
                            </div>

                            <h5 class="fw-normal mb-0 pb-3" style="letter-spacing: 1px;">Register Your Account
                            </h5>

                            <div class="form-outline mb-4 form-floating">
                                <input type="name" id="name" placeholder="name" name="name"
                                    class="form-control form-control-lg @error('name') is-invalid @enderror" required
                                    value="{{ old('name') }}" autofocus />
                                <label class="form-label" for="floatingInput">name</label>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-outline mb-4 form-floating">
                                <input type="name" id="username" placeholder="username" name="username"
                                    class="form-control form-control-lg @error('username') is-invalid @enderror"
                                    required value="{{ old('username') }}" autofocus />
                                <label class="form-label" for="floatingInput">username</label>
                                @error('username')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-outline mb-4 form-floating">
                                <input type="name" id="role" placeholder="role" name="role"
                                    class="form-control form-control-lg @error('role') is-invalid @enderror"
                                    required value="{{ old('role') }}" autofocus />
                                <label class="form-label" for="floatingInput">role</label>
                                @error('role')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-outline mb-4 form-floating">
                                <input type="email" id="email" placeholder="Email" name="email"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror" required
                                    value="{{ old('email') }}" autofocus />
                                <label class="form-label" for="floatingInput">Email</label>
                                @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-outline mb-4 form-floating">
                                <input type="password" id="password"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    required placeholder="Password" name="password" />
                                <label class="form-label" for="floatingInput">Password</label>
                                @error('password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class=" mb-4 ">
                                <label class="form-label">Upload Image</label>
                                <input class="form-control form-control-lg @error('image') is-invalid @enderror"
                                    id="formFileLg" type="file" name="image">
                                @error('image')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="pt-1 mb-4">
                                <button class="btn btn-lg btn-block" style="background-color: #755207; color:white;"
                                    type="submit">Login<i class="bi bi-box-arrow-in-right"></i></button>
                            </div>

                            <center>
                                <a href="#!" class="small text-muted">Terms of use.</a>
                                <a href="#!" class="small text-muted">Privacy policy</a>
                            </center>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    @endsection