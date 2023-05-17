@extends('layouts.dashboard')

@section('isi')
    <form action="{{ route('product.update', $data->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <header class="bg-header">
            <div class="card-body">
                <div class="container pt-5 pb-5">
                    <h1 class="text-light"><b>Edit Product</b></h1>
                </div>
            </div>
            <div class="row d-flex justify-content-center align-items-center ">
                <div class=" col-lg-10 ">
                    <div class="card  shadow" style="border-radius: 1rem;">
                        <div class="card-body p-4 p-lg-5 text-black">
                            <div class="form-outline mb-4 form-floating">
                                <label class="form-label">Upload Image</label>
                                <input type="hidden" name="oldimage" value="{{ $data->image }}">
                                <input class="form-control form-control-lg @error('image') is-invalid @enderror"
                                    value="{{ asset('storage/' . $data->image) }}" id="formFileLg" type="file"
                                    name="image">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-outline mb-4 form-floating">
                                <label class="form-label" for="floatingInput">Nama Product</label>
                                <input type="text" id="nama" name="nama"
                                    class="form-control form-control-lg @error('nama') is-invalid @enderror" required
                                    value="{{ $data->nama }}" autofocus />
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-outline mb-4 form-floating">
                                <label class="form-label" for="floatingInput">Harga</label>
                                <input type="number" id="harga" name="harga"
                                    class="form-control form-control-lg @error('harga') is-invalid @enderror" required
                                    value="{{ $data->harga }}" autofocus />
                                @error('harga')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-outline mb-3">
                                <label class="form-label">Status</label>
                                <div class="form-check">
                                    <input class="form-check-input @error('status') is-invalid @enderror" type="radio"
                                        name="status" value="Tersedia" @if($data->status == 'Tersedia') checked @endif>
                                    <label class="form-check-label">
                                        Tersedia
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error('status') is-invalid @enderror" type="radio"
                                        name="status" value="Tidak Tersedia" @if($data->status == 'Tidak Tersedia') checked @endif>
                                    <label class="form-check-label">
                                        Tidak Tersedia
                                    </label>
                                </div>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label">Deskripsi</label>
                                <input id="deskripsi" type="hidden" name="deskripsi"
                                    class="form-control  @error('deskripsi') is-invalid @enderror"
                                    value="{!! $data->deskripsi !!}" />
                                <trix-editor input="deskripsi"></trix-editor>
                                @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="pt-1 mb-4">
                                <button class="button-solid btn btn-lg btn-block" style="--clr:#755207"
                                    type="submit">Simpan</button>
                            </div>
                        </div>
                    </div>
        </header>
    </form>

    <script>
        document.addEvenListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>
@endsection
