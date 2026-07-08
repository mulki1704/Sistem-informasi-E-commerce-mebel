@extends('layouts.main')

@section('konten')
    <div class="banner-image3 w-100">
        <div class="container-xl header-image">
            <div class="row">
                <div class="col-sm-12 col-md-9 col-lg-6">
                    <h1>Artikel Single</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content-overlay py-5">
        <div class="card">
            <div class="card-body">
                <h1>{{ $artikel->title ?? 'Artikel belum tersedia' }}</h1>
                <p><b>{{ $artikel->subtitle ?? '' }}</b></p>
                <p class="fs-1">{!! $artikel->body ?? '' !!}</p>
            </div>
        </div>
    </div>
@endsection
