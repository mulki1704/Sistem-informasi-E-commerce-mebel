@extends('layouts.dashboard')

@section('isi')

    <header class="bg-header">
        <div class="container">

            <div class="card-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-6  pt-5">
                        <h1 class="text-light"><b>Data Product</b></h1>
                    </div>
                    <div class=" col-6  pt-5">
                        <button type="button" class="btn btn-light " style="float: right;"><a
                                href="{{ route('product.create') }}" class="text-dark">
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
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-8 col-lg-8"></div>
                                <div class="col-sm-12 col-md-8 col-lg-4">
                                    <form action="/dashboard/product/#search">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Search..."
                                                name="search" value="{{ request('search') }}" id="search">
                                            <button class="btn btn-success" type="submit"><i
                                                    class="bi bi-search h5"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive" id="no-more-tables">
                                <table class="table align-middle" id="dataTable">
                                    @if ($products->count())
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Product</th>
                                                <th>Harga</th>
                                                <th>Status</th>
                                                <th>Deskripsi</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @foreach ($products as $data)
                                                <tr>
                                                    <td data-title="No">{{ $no++ }}</td>
                                                    <td data-title="Nama Product">{{ $data->nama }}</td>
                                                    <td data-title="Harga">Rp. {{ number_format($data->harga,0,',','.') }}</td>
                                                    @if($data->status == 'Tersedia')
                                                    <td data-title="Status" class="text-success fw-bold">{{ $data->status }}</td>
                                                    @else
                                                    <td data-title="Status" class="text-danger fw-bold">{{ $data->status }}</td>
                                                    @endif
                                                    <td data-title="Deskripsi">{{ $data->deskripsi }}</td>
                                                    <td data-title="Image"><img src="{{ asset('storage/' . $data->image) }}"
                                                            alt="" class="w-130" height="130px" class="img-fluid">
                                                    </td>
                                                    <td data-title="Action" class="text-nowrap">
                                                        <form action="{{ route('product.destroy', $data->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <a href="{{ route('product.edit', $data->id) }}"
                                                                class="btn btn-sm btn-outline-success"><i class="fa fa-edit mr-1"></i>
                                                                Edit
                                                            </a> |
                                                            <a href="{{ route('product.show', $data->id) }}"
                                                                class="btn btn-sm btn-outline-warning"><i class="fa fa-info mr-1"></i>
                                                                Show
                                                            </a> |
                                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                                onclick="return confirm('Apakah Anda Yakin?')"><i class="fa fa-trash-o mr-1"></i>
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    @else
                                        <h4 class="text-center">Product Tidak Ada.</h4>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
