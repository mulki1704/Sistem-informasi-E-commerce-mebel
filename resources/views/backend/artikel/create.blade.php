@extends('layouts.dashboard')

@section('isi')
<form action="{{ route('artikel.store') }}" method="post">
    @csrf

    <header class="bg-header">
        <div class="card-body">
            <div class="container pt-5 pb-5">
            <h1 class="text-light"><b>Create Artikel</b></h1>
            </div>
        </div>

        <div class="row d-flex justify-content-center align-items-center ">
            <div class=" col-lg-10 ">
                <div class="card  shadow" style="border-radius: 1rem;">

                    <div class="card-body p-4 p-lg-5 text-black">

                        <div class="form-outline mb-4 form-floating">
                            <label class="form-label" for="floatingInput">Title</label>
                            <input type="text" id="title" name="title"
                                class="form-control form-control-lg @error('title') is-invalid @enderror" required
                                value="{{ old('title') }}" autofocus />
                            @error('title')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>





                        <div class="form-outline mb-4 form-floating">
                            <label class="form-label" for="floatingInput">Subtitle</label>
                            <input type="text" id="subtitle" name="subtitle"
                                class="form-control form-control-lg @error('subtitle') is-invalid @enderror" required
                                value="{{ old('subtitle') }}" />
                            @error('subtitle')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>


                        <div class="form-outline mb-4">
                            <label class="form-label">Content</label>
                            <input id="body" type="hidden" name="body"
                                class="form-control  @error('body') is-invalid @enderror" value="{{ old('body') }}" />
                            <trix-editor input="body"></trix-editor>
                            @error('body')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>




                        <div class="d-grip gap-2 mb-2">
                            <button class="button-solid btn btn-lg btn-block" style="--clr:#755207"
                                type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
    </header>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
document.addEvenListener('trix-file-accept', function(e) {
    e.preventDefault();
});
</script>

@endsection