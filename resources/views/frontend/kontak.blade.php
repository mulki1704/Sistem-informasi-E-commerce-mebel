@extends('layouts.main')

@section('konten')

<!-- background atas -->
<div class="banner-image3 w-100" id="#">
    <div class="header-image">
        <div class="row">
            <div class="col-sm-12 col-md-9 col-lg-6">
                <h1>Kontak Kami</h1>
            </div>
        </div>
    </div>
</div>

<!-- map -->
<div class="content-overlay py-5" data-aos-duration="1100" data-aos-anchor-placement="top-bottom" data-aos="fade-up">



    <!-- Form Kontak Kami -->
    <div class="row pt-5">
        <div class="col-12">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="kontak">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form action="{{ route('kontak.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12 col-lg-8 ">
                        <div class="form-floating" data-aos-duration="1100" data-aos-anchor-placement="top-bottom" data-aos="fade-up">
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                                placeholder="Deskripsi" id="deskripsi" style="height: 300px;" name="deskripsi"
                                value="{{ old('deskripsi') }}"></textarea>
                            <label for="deskripsi">Deskripsi</label>
                            @error('deskripsi')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4 ">

                        <div class="pt-small-1">
                            <div class="form-outline form-floating" data-aos-duration="1100" data-aos-anchor-placement="top-bottom" data-aos="fade-up"
                                data-aos-delay="100">
                                <input type="text" id="floatingInput" name="subject"
                                    class="form-control form-control-lg @error('subject') is-invalid @enderror" required
                                    value="{{ old('subject') }}" />
                                <label for="floatingInput">Subject</label>
                                @error('subject')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="pt-4">
                            <div class="form-outline form-floating" data-aos-duration="1100" data-aos-anchor-placement="top-bottom" data-aos="fade-up"
                                data-aos-delay="200">
                                <input type="text" id="nama" name="nama"
                                    class="form-control form-control-lg @error('nama') is-invalid @enderror" required
                                    value="{{ old('nama') }}" />
                                <label class="form-label" for="floatingInput">Nama</label>
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="pt-4">
                            <div class="form-outline form-floating" data-aos-duration="1100" data-aos-anchor-placement="top-bottom" data-aos="fade-up"
                                data-aos-delay="300">
                                <input type="text" id="email" name="email"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror" required
                                    value="{{ old('email') }}" />
                                <label class="form-label" for="floatingInput">email</label>
                                @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="pt-4" data-aos-duration="1100" data-aos-anchor-placement="top-bottom" data-aos="fade-up" data-aos-delay="400">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-lg button-solid">Kirim</button>
                            </div>
                        </div>

                    </div>
                </div>
        </div>

        </form>
    </div>

    <!-- kontak -->
    <div class="row pt-5">
        <div class="col-sm-4 col-sm-4 col-md-4 col-lg-4" data-aos-duration="1100" data-aos-anchor-placement="top-bottom" data-aos="fade-up">
            <a href="https://mail.google.com/" class="text-decoration-none text-white">
                <div class="btn btn-outline-light text-dark text-center d-flex justify-item-center w-100">
                    <div class="card-body py-3 pb-3">
                        <button class="btn rounded-circle"
                            style="background-color: #755207; color:white; width:60px; height:60px;"><i
                                class="bi bi-envelope h4"></i></button>
                        <div class="card-title">
                            <p><b>Email</b>
                            </p>
                        </div>
                        <div class="card-item ">
                            <p>mebelid@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4" data-aos-duration="1100" data-aos-anchor-placement="top-bottom" data-aos="fade-up" data-aos-delay="200">
            <a href="https://web.whatsapp.com/" class="text-decoration-none text-white">
                <div class="btn btn-outline-light text-dark text-center d-flex justify-item-center w-100">
                    <div class="card-body py-3 pb-3">
                        <button class="btn rounded-circle"
                            style="background-color: #755207; color:white; width:60px; height:60px;"><i
                                class="bi bi-telephone h4"></i></button>
                        <div class="card-title">
                            <p><b>Phone</b>
                            </p>
                        </div>
                        <div class="card-item ">
                            <p>+62 812 3456 7890</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4" data-aos-duration="1100" data-aos-anchor-placement="top-bottom" data-aos="fade-up" data-aos-delay="400">
            <a href="https://www.google.co.id/maps/place/mebel/@-6.9719333,107.6035169,19.63z/data=!4m15!1m8!3m7!1s0x2e68e91e77d0c873:0x7703261a85b3491b!2sCiguriang+Hilir,+Cangkuang+Wetan,+Kec.+Dayeuhkolot,+Kabupaten+Bandung,+Jawa+Barat+40238!3b1!8m2!3d-6.9726438!4d107.6035846!16s%2Fg%2F11b6b5rr6f!3m5!1s0x2e68e960a300fc53:0x9f6c7608277b4c2f!8m2!3d-6.9716853!4d107.6038099!16s%2Fg%2F11k9s27fxs"
                class="text-decoration-none text-white">
                <div class="btn btn-outline-light text-dark text-center d-flex justify-item-center w-100">
                    <div class="card-body py-3 pb-3">
                        <button class="btn rounded-circle"
                            style="background-color: #755207; color:white; width:60px; height:60px;"><i
                                class="bi bi-geo-alt h4"></i></button>
                        <div class="card-title">
                            <p><b>Location</b>
                            </p>
                        </div>
                        <div class="card-item ">
                            <p>Kota Bandung, Jawabarat, Indonesia</p>
                        </div>
                    </div>
                </div>
        </div>
        </a>
    </div>
</div>

@endsection