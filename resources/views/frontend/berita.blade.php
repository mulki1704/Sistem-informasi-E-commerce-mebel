@extends('layouts.main')

@section('konten')

<!-- background atas -->
<div class="banner-image3 w-100">
    <div class="header-image">
        <div class="row">
            <div class="col-sm-12 col-md-9 col-lg-6">
                <h1>Berita</h1>
            </div>
        </div>
    </div>
</div>

<!-- Content artikel -->
<div class="content-overlay py-5" id="1">
    <div class="row  pt-3 d-flex justify-content-between">
        <div class="col-md-12 col-lg-6 ">
            <div class="row justify-content-between">
                <div class="col-md-6 col-lg-6">
                    <div class="show-img" data-aos-duration="1100" data-aos-anchor-placement="top-bottom"
                        data-aos="fade-up">
                        <a href="{{asset('ASET/kayu/jati4.jfif')}}" data-lightbox="roadtrip">
                            <img src="{{asset('ASET/kayu/jati4.jfif')}}" alt="" class="w-100" height="465px">
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 pt-small-2">
                    <div class="show-img" data-aos-duration="1100" data-aos-anchor-placement="top-bottom"
                        data-aos="fade-up" data-aos-delay="200">
                        <a href="{{asset('ASET/kayu/jati5.jfif')}}" data-lightbox="roadtrip">
                            <img src="{{asset('ASET/kayu/jati5.jfif')}}" alt="" class="w-100 " height="220px">
                        </a>
                    </div>
               

                    <br>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 pt-5">
            <h1 data-aos-duration="1100" data-aos-anchor-placement="top-bottom" data-aos="fade-up">
                {{$dataartikel->title}}</h1>
            <p data-aos-duration="1100" data-aos-anchor-placement="top-bottom" data-aos="fade-up" data-aos-delay="200">
                <b>{{$dataartikel->subtitle}}</b>
            </p>
            <p data-aos-duration="1100" data-aos-anchor-placement="top-bottom" data-aos="fade-up" data-aos-delay="400">
                {!!$dataartikel->excerpt!!}</p>
            <a href="/Showartikel/{{$dataartikel['slug']}}" style="--clr:#755207" class="button-outline btn "
                data-aos-duration="1100" data-aos-anchor-placement="top-bottom" data-aos="fade-up" data-aos-delay="600">
                Lihat Selengkapnya<i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
</div>

<!-- Content Berita -->
<div class="content-overlay pb-5">
    <div class="row" data-aos-duration="1100" data-aos-anchor-placement="top-bottom" data-aos="fade-up">
        <div class="col-md-12 col-lg-6">
            <h1>berita Lainnya</h1>
        </div>
        <div class="col-md-12 col-lg-6">
            <form action="/artikel/#search">
                <div class="input-group mb-3">
                    <input type="text" class="form-control " placeholder="Search..." name="search"
                        value="{{ request('search') }}" id="search">
                    <button class="btn btn-success" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row ">

        @if($databerita->count())

        @foreach($databerita as $data)
        <div class="col-sm-6 col-md-6 col-lg-4 py-3" data-aos-duration="1100" data-aos-anchor-placement="top-bottom"
            data-aos="zoom-in">
            <div class="col-up">
                <a href="/Showberita/{{$data['slug']}}" class="text-decoration-none">
                    <div class="card card-show w-100" style="height: 21rem;">
                        <div class="card-img-top    w-100 ">
                            <img src="{{ asset('storage/' . $data->image) }}" alt="" class="img-fluid berita-image">
                        </div>
                        <div class="card-body ">
                            <b>
                                <h5>{{$data->excerpttitle}}</h5>
                            </b>
                            <p class="card-text ">{!!$data->excerpt!!}</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach

        @else
        <p class="text-center fs-4" data-aos="zoom-in">berita Tidak Ada.</p>
        @endif

    </div>

    <div class="d-flex justify-content-center" data-aos-duration="1100" data-aos-anchor-placement="top-bottom"
        data-aos="zoom-in">
        {{ $databerita->links() }}
    </div>

</div>

@endsection