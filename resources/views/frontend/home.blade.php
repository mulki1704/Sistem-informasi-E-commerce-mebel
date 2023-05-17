@extends('layouts.main')

@section('konten')

    <!-- background atas -->
    <div class="banner-image ">
        <div class="header-image">
            <div class="row">
                <div class="col-md-12 col-lg-5 text-white ">
                    <h1>Mebel.id</h1>
                    <h3>menginformasinkan Seputar kayu Dan kain serta Menerima Pemesanan :</h3>
                    <h4>sofa kursi <br> sofa tempat tidur <br>Kayu <br> Jendela <br> Meja belajar</h4>
                </div>
            </div>
        </div>
    </div>
    <div class=" content-overlay" id="1">
        <div class="row  pt-3">
            <div class="col-md-12 col-lg-6 ">
                <div class="py-5">
                    <h5>
                        <p class="text-green" data-aos-duration="1100" data-aos="fade-up"
                            data-aos-anchor-placement="top-bottom">Tentang Kami</p>
                    </h5>
                    <h1 data-aos-duration="1100" data-aos="fade-up" data-aos-delay="50"
                        data-aos-anchor-placement="top-bottom">{{ $dataartikel->title }}</h1>
                    <p data-aos-duration="1100" data-aos="fade-up" data-aos-delay="100"
                        data-aos-anchor-placement="top-bottom"><b>{{ $dataartikel->subtitle }}</b></p>
                    <p data-aos-duration="1100" data-aos="fade-up" data-aos-delay="150"
                        data-aos-anchor-placement="top-bottom">{!! $dataartikel->excerpt !!}</p>
                    <a href="/Showartikel/{{ $dataartikel['slug'] }}" style="--clr:#755207" class="button-outline btn"
                        data-aos-duration="1100" data-aos-anchor-placement="top-bottom" data-aos="fade-up"
                        data-aos-delay="200">
                        Lihat Selengkapnya<i class="bi bi-arrow-right"></i></a>
                </div>
            </div>


            <div class="col-md-12 col-lg-6 ">
                <div class="py-5">
                    <div class="row show">
                        <div class="col-sm-6 col-md-6 col-lg-6 ">
                            <div class="show-img " data-aos-duration="1100" data-aos-anchor-placement="top-bottom"
                                data-aos="fade-up">
                                <a href="ASET/kayu/jati5.jfif" data-lightbox="roadtrip">
                                    <img src="ASET/kayu/jati5.jfif" alt="" class="w-100 image">
                                </a>
                            </div>

                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6 pt-small-2">
                            <div class="show-img " data-aos-duration="1100" data-aos-anchor-placement="top-bottom"
                                data-aos="fade-up" data-aos-delay="100">
                                <a href="ASET/kain/oscar1.jfif" data-lightbox="roadtrip">
                                    <img src="ASET/kain/oscar1.jfif" alt="" class="w-100 image">
                                </a>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12  col-lg-12 pt-4 ">
                            <div class="show-img" data-aos-duration="1100" data-aos-anchor-placement="top-bottom"
                                data-aos="fade-up" data-aos-delay="100">
                                <a href="ASET/barang/project1.jfif" data-lightbox="roadtrip">
                                    <img src="ASET/barang/project1.jfif" alt="" class="w-100 image">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="container-xl content-overlay pb-5">
        <div class="row" data-aos-duration="1100" data-aos-anchor-placement="top-bottom" data-aos="fade-up">
            <div class="col-md-12 col-lg-6">
                <h5><b class="text-green">artiker</b></h5>
                <h1>Baca artikel Terbaru dari kayu dan kain </h1>
            </div>
            <div class="col-md-12 col-lg-6">
                <form action="/#search" class="pt-5">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg" placeholder="Search..."
                            name="search" value="{{ request('search') }}" id="search">
                        <button class="btn btn-success" type="submit"><i class="bi bi-search h5"></i></button>
                    </div>
                </form>
            </div>
        </div>


        <div class="row ">

            @if ($databerita->count())
                @foreach ($databerita as $data)
                    <div class="col-sm-6 col-md-6 col-lg-4 py-4 ">
                        <div class="col-up">
                            <a href="/Showberita/{{ $data['slug'] }}" class="text-decoration-none">
                                <div class="card card-show w-100" style="height: 21rem;" data-aos-duration="1100"
                                    data-aos-anchor-placement="top-bottom" data-aos="zoom-in">
                                    <div class="card-img-top w-100 ">
                                        <img src="{{ asset('storage/' . $data->image) }}" alt=""
                                            class="img-fluid berita-image">
                                    </div>
                                    <div class="card-body ">
                                        <b>
                                            <h5>{{ $data->excerpttitle }}</h5>
                                        </b>
                                        <p class="card-text ">{!! $data->excerpt !!}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center fs-4" data-aos-duration="1000" data-aos="zoom-in">Berita Tidak Ada.</p>
            @endif

        </div>
        <div class="d-flex justify-content-center" data-aos-duration="1100" data-aos-anchor-placement="top-bottom"
            data-aos="zoom-in">
            {{ $databerita->links() }}
        </div>
    </div>


    <div class="container-xl content-overlay  pb-5">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8" data-aos-duration="1100" data-aos-anchor-placement="top-bottom"
                data-aos="fade-up">
                <h5><b class="text-green"></b></h5>
                <h1>Lihat Lebih Banyak Produk kami</h1>
            </div>
        </div>
    </div>

    {{-- <div class="slick_img" data-aos-duration="1000" data-aos-anchor-placement="top-bottom" data-aos="fade-up">
        @foreach ($datagaleri as $data)
            <div class="">
                <a href="{{ asset('storage/' . $data->image) }}" data-lightbox="models">
                    <img src="{{ asset('storage/' . $data->image) }}" alt="" class="img-fluid w-100"
                        style="height: 230px;">
                </a>
            </div>
        @endforeach
    </div> --}}



@endsection
