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
    <div class="content-overlay home-hero" id="1">
        <div class="row g-4 align-items-center pt-3">
            <div class="col-12 col-lg-6">
                <div class="py-5">
                    <p class="text-green mb-2" data-aos-duration="1100" data-aos="fade-up"
                        data-aos-anchor-placement="top-bottom">Tentang Kami</p>
                    <h1 data-aos-duration="1100" data-aos="fade-up" data-aos-delay="50"
                        data-aos-anchor-placement="top-bottom">{{ $dataartikel->title }}</h1>
                    <p data-aos-duration="1100" data-aos="fade-up" data-aos-delay="100"
                        data-aos-anchor-placement="top-bottom"><b>{{ $dataartikel->subtitle }}</b></p>
                    <p data-aos-duration="1100" data-aos="fade-up" data-aos-delay="150"
                        data-aos-anchor-placement="top-bottom">{!! $dataartikel->excerpt !!}</p>
                    <a href="/Showartikel/{{ $dataartikel['slug'] }}" class="button-outline btn" style="--clr:#755207"
                        data-aos-duration="1100" data-aos-anchor-placement="top-bottom" data-aos="fade-up"
                        data-aos-delay="200">
                        Lihat Selengkapnya<i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="py-5">
                    <div class="row g-3 show">
                        <div class="col-6">
                            <div class="show-img rounded-lg" data-aos-duration="1100" data-aos-anchor-placement="top-bottom"
                                data-aos="fade-up">
                                <a href="ASET/kayu/jati5.jfif" data-lightbox="roadtrip">
                                    <img src="ASET/kayu/jati5.jfif" alt="" class="w-100 image rounded-3">
                                </a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="show-img rounded-lg" data-aos-duration="1100" data-aos-anchor-placement="top-bottom"
                                data-aos="fade-up" data-aos-delay="100">
                                <a href="ASET/kain/oscar1.jfif" data-lightbox="roadtrip">
                                    <img src="ASET/kain/oscar1.jfif" alt="" class="w-100 image rounded-3">
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="show-img rounded-lg" data-aos-duration="1100" data-aos-anchor-placement="top-bottom"
                                data-aos="fade-up" data-aos-delay="100">
                                <a href="ASET/barang/project1.jfif" data-lightbox="roadtrip">
                                    <img src="ASET/barang/project1.jfif" alt="" class="w-100 image rounded-3">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-xl content-overlay pb-5">
        <div class="row align-items-center g-4" data-aos-duration="1100" data-aos-anchor-placement="top-bottom"
            data-aos="fade-up">
            <div class="col-12 col-lg-6">
                <h5 class="mb-2"><b class="text-green">artiker</b></h5>
                <h1>Baca artikel Terbaru dari kayu dan kain</h1>
            </div>
            <div class="col-12 col-lg-6">
                <form action="/#search" class="pt-3 pt-lg-0">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg rounded-start" placeholder="Search..."
                            name="search" value="{{ request('search') }}" id="search">
                        <button class="btn rounded-end" type="submit"
                            style="background-color:#755207;border-color:#755207;color:#fff;width:60px"><i
                                class="bi bi-search h5"></i></button>
                    </div>
                </form>
            </div>
        </div>


        <div class="row g-4">

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


    <div class="container-xl content-overlay pb-5">
        <div class="row">
            <div class="col-12 col-lg-8" data-aos-duration="1100" data-aos-anchor-placement="top-bottom"
                data-aos="fade-up">
                <h5 class="mb-2"><b class="text-green">Produk</b></h5>
                <h1>Lihat Lebih Banyak Produk Kami</h1>
            </div>
        </div>

        <div class="row mt-4 g-4">

            @forelse($products as $product)
                <div class="col-md-4 col-lg-4 mb-4" data-aos="zoom-in">
                    <div class="card h-100 shadow-sm product-card">

                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top"
                            alt="{{ $product->nama }}" style="height:250px; object-fit:cover;">

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->nama }}</h5>

                            <p class="fw-bold text-brown mb-3" style="color:#755207;">
                                Rp {{ number_format($product->harga, 0, ',', '.') }}
                            </p>

                            <p class="card-text mb-4">
                                {{ \Illuminate\Support\Str::limit(strip_tags($product->deskripsi), 80) }}
                            </p>

                            <a href="/Showproduct/{{ $product->slug }}" class="btn w-100 mt-auto"
                                style="background-color:#755207;border-color:#755207;color:#fff;">
                                Detail Produk
                            </a>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12">
                    <h5 class="text-center">Belum ada produk.</h5>
                </div>
            @endforelse

        </div>

        <div class="text-center mt-4 mb-5">
            <a href="/product" class="btn btn-lg"
                style="color:#755207;border-color:#755207;background-color:transparent; padding: 0.85rem 1.8rem;">
                Lihat Semua Produk
            </a>
        </div>

    @endsection
