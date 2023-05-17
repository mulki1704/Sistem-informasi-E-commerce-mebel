@extends('layouts.main')

@section('konten')

<!-- background atas -->
<div class="banner-image3 w-100">
    <div class=" header-image">
        <div class="row">
            <div class="col-sm-12 col-md-9 col-lg-6">
                <h1>Tentang Kami</h1>
            </div>
        </div>
    </div>
</div>

<!-- Content artikel -->
<div class=" content-overlay ">
    <div class="row  pt-3">
        <div class="col-md-12 col-lg-6  pt-5">
            <div class="  pt-5">
                <h1 data-aos-duration="1100" data-aos-anchor-placement="top-bottom" data-aos="fade-up">
                    {{$dataartikel->title}}</h1>
                <p data-aos-duration="1100" data-aos-anchor-placement="top-bottom" data-aos="fade-up"
                    data-aos-delay="200"><b>{{$dataartikel->subtitle}}</b>
                </p>
                <p data-aos-duration="1100" data-aos-anchor-placement="top-bottom" data-aos="fade-up"
                    data-aos-delay="400">{!!$dataartikel->excerpt!!}</p>
                <a href="/Showartikel/{{$dataartikel['slug']}}" class="button-outline btn" data-aos-duration="1100"
                    data-aos-anchor-placement="top-bottom" data-aos="fade-up" data-aos-delay="600">
                    Lihat Selengkapnya<i class="bi bi-arrow-right"></i></a>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 ">
            <div class="py-5">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <div class="show-img" data-aos-duration="1100" data-aos-anchor-placement="top-bottom"
                            data-aos="fade-up">
                            <a href="{{ asset('ASET/kayu/jati1.jpg') }}" data-lightbox="roadtrip">
                                <img src="{{ asset('ASET/kayu/jati1.jpg') }}" alt="" class="w-100">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 pt-small-2">
                        <div class="show-img" data-aos-duration="1100" data-aos-anchor-placement="top-bottom"
                            data-aos="fade-up" data-aos-delay="200">
                            <a href="{{ asset('ASET/kain/oscar1.jfif') }}" data-lightbox="roadtrip">
                                <img src="{{ asset('ASET/kain/oscar1.jfif') }}" alt="" class="w-100">
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12  col-lg-12 pt-4 ">
                        <div class="show-img" data-aos-duration="1100" data-aos-anchor-placement="top-bottom"
                            data-aos="fade-up" data-aos-delay="400">
                            <a href="{{ asset('ASET/barang/barang1.jfif') }}" data-lightbox="roadtrip">
                                <img src="{{ asset('ASET/barang/barang1.jfif') }}" alt="" class="w-100">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class=" content-overlay mb-5">
    <div class="row">
        <div class="col-12">
            @foreach($datavisimisi as $data)
            <div data-aos-duration="1100" data-aos-anchor-placement="top-bottom" data-aos="fade-up">
                <h1>{{$data->visi}}</h1>
                <p>{!!$data->bodyvisi!!}</p>
            </div>
            <div data-aos-duration="1100" data-aos-anchor-placement="top-bottom" data-aos="fade-up"
                data-aos-delay="200">
                <h1>{{$data->misi}}</h1>
                <p>{!!$data->bodymisi!!}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection