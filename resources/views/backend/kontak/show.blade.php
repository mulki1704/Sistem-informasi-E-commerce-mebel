@extends('layouts.dashboard')

@section('isi')
<header class="bg-header">
    <div class="container">
        <div class="card-body">
            <div class="pt-5 pb-5">
                <h1 class="text-light"><b>Show Kontak</b></h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control " value="{{ $data->nama }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control " value="{{ $data->email }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Subject</label>
                            <input type="text" class="form-control " value="{{ $data->subject }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="alamat" readonly
                                style="height: 300px;">{{ $data->deskripsi }}</textarea>

                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                               <a href="/dashboard/kontaks" class="button-solid btn btn-lg btn-block" style="--clr:#755207"
                            type="submit">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
    @endsection