@extends('layouts.dashboard')

@section('isi')

    <header class="bg-header">
        <div class="container">

            <div class="card-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-6  pt-5">
                        <h1 class="text-light"><b>Data Berita</b></h1>
                    </div>
                    <div class=" col-6  pt-5">
                        <button type="button" class="btn btn-light " style="float: right;"><a
                                href="{{ route('berita.create') }}" class="text-dark">
                                Tambah Data <i class="bi bi-plus"></i>
                            </a>
                        </button>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-12">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="">
                        <div class="card-body " id="search">
                            <form action="/dashboard/berita/#search">
                                <div class="input-group mb-3">
                                    <div class="col-sm-12 col-md-8 col-lg-8"></div>
                                            <input type="text" class="form-control" placeholder="Search..."
                                                name="search" value="{{ request('search') }}" id="search">
                                            <button class="btn btn-success" type="submit"><i
                                                    class="bi bi-search h5"></i></button>
                                        </div>
                            </form>
                            <div class="row d-flex justify-content-center">
                                @if ($data->count())
                                    @foreach ($data as $data1)
                                        <div class="col-md-6 col-lg-6 col-xl-4 pt-3 ">
                                            <div class="card text-center shadow bg-body rounded-4 w-100 overflow-hidden"
                                                style=" height:24rem;">
                                                <div class="card-img-top">
                                                    <img src="{{ asset('storage/' . $data1->image) }}" alt=""
                                                        class="w-100" height="200px" class="img-fluid">
                                                </div>
                                                <div class="card-body ">
                                                    <b>{{ $data1->excerpttitle }}</b>
                                                    <p class="card-text ">{!! $data1->excerpt !!}</p>
                                                    <form action="{{ route('berita.destroy', $data1->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="{{ route('berita.edit', $data1->id) }}"
                                                            class="btn btn-sm btn-outline-success"><i class="fa fa-edit mr-1"></i>
                                                            Edit
                                                        </a> |
                                                        <a href="{{ route('berita.show', $data1->id) }}"
                                                            class="btn btn-sm btn-outline-warning"><i class="fa fa-info mr-1"></i>
                                                            Show
                                                        </a> |
                                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                                            onclick="return confirm('Apakah Anda Yakin?')"><i class="fa fa-trash-o mr-1"></i>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="pt-5">
                                        <h4>berita Tidak Ada.</h4>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </header>
@endsection
