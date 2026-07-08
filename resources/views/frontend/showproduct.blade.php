@extends('layouts.main')

@section('konten')
    <div class="banner-image3 w-100">
        <div class="container-xl header-image">
            <div class="row">
                <div class="col-sm-12 col-md-9 col-lg-6">
                    <h1>Show Product</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content-overlay py-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <img src="{{ asset(ltrim($product->image_url, '/')) }}" alt="{{ $product->nama }}"
                                    class="img-fluid d-inline" style="height:400px;width;270px">
                            </div>
                            <div class="col-md-6">
                                <h1><b> {{ $product->nama }} </b></h1>
                                <p>Harga : Rp. {{ number_format($product->harga, 0, ',', '.') }}</p>
                                @if ($product->status == 'Tersedia')
                                    <p class="text-success fw-bold">Status : {{ $product->status }}</p>
                                @else
                                    <p class="text-danger fw-bold">Status : {{ $product->status }}</p>
                                @endif
                                {!! $product->deskripsi !!}
                                <br>
                                @if ($product->status == 'Tersedia')
                                    <button class="btn btn-success"><a href="https://wa.me/+6282121397948"
                                            style="text-decoration: none;color:white"><i class="bi bi-whatsapp"></i></i>
                                            Order Via Whatsapp</a></button>
                                @else
                                    {{-- <button disabled class="btn btn-success"><a href="https://wa.me/+6282121397948"
                                        style="text-decoration: none;color:white"><i class="bi bi-whatsapp"></i></i> Order Via Whatsapp</a></button> --}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
