@extends('layouts.dashboard')

@section('isi')

<header class="bg-header">
    <div class="container">

        <div class="card-body">
            <div class="row">
                <div class="col-6  pt-5">
                    <h1 class="text-light"><b>Data Kontak</b></h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="card">

                    <div class="card-body ">
                        <div class="row">
                            <div class="col-sm-12 col-md-8 col-lg-8"></div>
                            <div class="col-sm-12 col-md-8 col-lg-4">
                                <form action="/dashboard/kontaks/#search">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control " placeholder="Search..." name="search"
                                            value="{{ request('search') }}" id="search">
                                        <button class="btn btn-success" type="submit"><i
                                                class="bi bi-search h5"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive" id="no-more-tables">
                            <table class="table align-middle" id="dataTable">
                                @if($data->count())
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Deskripsi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($data as $data)
                                    <tr>
                                        <td data-title="No">{{ $no++ }}</td>
                                        <td data-title="Nama">{{$data->nama}}</td>
                                        <td data-title="Email">{{$data->email}}</td>
                                        <td data-title="Subject">{{$data->subject}}</td>
                                        <td data-title="Deskripsi">{!! $data->excerpt !!}</td>
                                        <td data-title="Action">
                                            <form action="{{ route('kontaks.destroy', $data->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('kontaks.show', $data->id) }}"
                                                    class="btn btn-sm btn-outline-warning">
                                                    Show
                                                </a> |
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Apakah Anda Yakin?')">Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                @else
                                <h4 class="text-center">kontak Tidak Ada.</h4>
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