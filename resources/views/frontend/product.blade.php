@extends('layouts.main')

@section('konten')
    <!-- background atas -->
    <div class="banner-image3 w-100" id="#">
        <div class="header-image">
            <div class="row">
                <div class="col-sm-12 col-md-9 col-lg-6">
                    <h1>Product</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content-overlay pb-5 mt-5 mb-4">
        <div class="row" data-aos-duration="1100" data-aos-anchor-placement="top-bottom" data-aos="fade-up">
            <div class="col-md-12 col-lg-6">
                <h1>product Lainnya</h1>
            </div>
            <div class="col-md-12 col-lg-6">
                <form action="/product/#search">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control " placeholder="Search..." name="search"
                            value="{{ request('search') }}" id="search">
                        <button class="btn" type="submit"
                            style="background-color:#755207;border-color:#755207;color:#fff">Search</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row ">
            @if ($products->count())
                @foreach ($products as $data)
                    <div class="col-sm-6 col-md-6 col-lg-4 py-3" data-aos-duration="1100"
                        data-aos-anchor-placement="top-bottom" data-aos="zoom-in">
                        <div class="col-up">
                            <a href="/Showproduct/{{ $data['slug'] }}" class="text-decoration-none">
                                <div class="card card-show w-100" style="height: 21rem;">
                                    <div class="card-img-top w-100 ">
                                        <img src="{{ asset(ltrim($data->image_url, '/')) }}" alt="{{ $data->nama }}"
                                            class="img-fluid berita-image">
                                    </div>
                                    <div class="card-body ">
                                        <b>
                                            <h5>{{ $data->nama }}</h5>
                                            <p>Harga : Rp. {{ number_format($data->harga) }}</p>
                                        </b>
                                        <p class="card-text ">{!! $data->deskripsi !!}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center fs-4" data-aos="zoom-in">artikel Tidak Ada.</p>
            @endif

        </div>

        <div class="d-flex justify-content-center" data-aos-duration="1100" data-aos-anchor-placement="top-bottom"
            data-aos="zoom-in">

        </div>

    </div>
@endsection
