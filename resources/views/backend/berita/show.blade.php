@extends('layouts.dashboard')

@section('isi')
<header class="bg-header">
    <div class="container">
        <div class="card-body">
            <div class="pt-5 pb-5">
                <h1 class="text-light"><b>Show Berita</b></h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-lg-3"><img src="{{ asset('storage/' . $data->image) }}" alt="">
                            </div>
                            <div class="col-sm-12 col-lg-9">
                                <h2><b> {{$data->title}} </b></h2>
                            </div>
                        </div>
                        <br>
                        {!! $data->body !!}
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-grid gap-2">
                        <a href="/dashboard/berita" class="button-solid btn btn-lg btn-block" style="--clr:#755207"
                            type="submit">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection