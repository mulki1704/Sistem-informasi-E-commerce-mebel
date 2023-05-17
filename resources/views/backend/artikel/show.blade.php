@extends('layouts.dashboard')

@section('isi')
<header class="bg-header">
    <div class="card-body">
        <div class="container pt-5 pb-5">
            <h1 class="text-light"><b>Show Artikel</b></h1>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2> {{$data->title}}</h2>

                        <b>{{$data->subtitle}}</b>
                        <br>
                        {!! $data->body !!}
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-grid gap-2">
                        <a href="/dashboard/artikel" class="button-solid btn btn-lg btn-block" style="--clr:#755207"
                            type="submit">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection