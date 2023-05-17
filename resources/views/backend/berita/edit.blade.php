@extends('layouts.dashboard')

@section('isi')
<form action="{{ route('berita.update', $data->id)  }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <header class="bg-header">
        <div class="card-body">
            <div class="container pt-5 pb-5">
            <h1 class="text-light"><b>Edit Berita</b></h1>
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
                                value="{{ asset('storage/' . $data->image) }}" id="formFileLg" type="file" name="image">
                            @error('image')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>



                        <div class="form-outline mb-4 form-floating">
                            <label class="form-label" for="floatingInput">Title</label>
                            <input type="text" id="title" name="title"
                                class="form-control form-control-lg @error('title') is-invalid @enderror" required
                                value="{{ $data->title }}" autofocus />
                            @error('title')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label">Content</label>
                            <input id="body" type="hidden" name="body"
                                class="form-control  @error('body') is-invalid @enderror" value="{{ $data->body }}" />
                            <trix-editor input="body"></trix-editor>
                            @error('body')
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