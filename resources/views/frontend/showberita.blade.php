@extends('layouts.main')

@section('konten')
    <div class="banner-image3 w-100">
        <div class="container-xl header-image">
            <div class="row">
                <div class="col-sm-12 col-md-9 col-lg-6">
                    <h1>Show Berita</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content-overlay py-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-inline"><img src="{{ asset('storage/' . $berita->image) }}" alt=""
                                    class="img-fluid d-inline" style="Height:auto;">
                                <h1><b> {{ $berita->title }} </b></h1>
                            </div>
                        </div>
                        <br>
                        {!! $berita->body !!}
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class="mb-3">Komentar</h4>

                        @if (session()->has('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @auth
                            <form action="{{ url('/berita/' . $berita->id . '/comments') }}" method="POST" class="mb-4">
                                @csrf
                                <textarea name="body" class="form-control" rows="3" placeholder="Tulis komentar..." required></textarea>
                                <button type="submit" class="btn btn-primary mt-2">Kirim Komentar</button>
                            </form>
                        @else
                            <div class="alert alert-secondary">Silakan <a href="{{ url('/login') }}">login</a> terlebih dahulu
                                untuk memberi komentar.</div>
                        @endauth

                        @foreach ($berita->comments as $comment)
                            <div class="border rounded p-3 mb-3">
                                <div class="d-flex justify-content-between">
                                    <strong>{{ $comment->user?->name ?? 'Pengguna terhapus' }}</strong>
                                    <small>{{ $comment->created_at->format('d M Y H:i') }}</small>
                                </div>
                                <p class="mt-2 mb-2">{{ $comment->body }}</p>

                                @auth
                                    @if (Auth::id() === $comment->user_id || Auth::user()->role === 'admin')
                                        <form action="{{ url('/comments/' . $comment->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Hapus komentar ini?')">Hapus</button>
                                        </form>
                                        <button class="btn btn-sm btn-outline-secondary" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#edit-comment-{{ $comment->id }}">Edit</button>
                                    @endif
                                    <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#reply-comment-{{ $comment->id }}">Balas</button>
                                @endauth

                                <div class="collapse mt-3" id="edit-comment-{{ $comment->id }}">
                                    <form action="{{ url('/comments/' . $comment->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <textarea name="body" class="form-control" rows="2" required>{{ $comment->body }}</textarea>
                                        <button type="submit" class="btn btn-sm btn-primary mt-2">Simpan</button>
                                    </form>
                                </div>

                                <div class="collapse mt-3" id="reply-comment-{{ $comment->id }}">
                                    <form action="{{ url('/comments/' . $comment->id . '/reply') }}" method="POST">
                                        @csrf
                                        <textarea name="body" class="form-control" rows="2" placeholder="Balas komentar..." required></textarea>
                                        <button type="submit" class="btn btn-sm btn-primary mt-2">Kirim Balasan</button>
                                    </form>
                                </div>

                                @if ($comment->replies->count())
                                    <div class="mt-3 ps-3 border-start">
                                        @foreach ($comment->replies as $reply)
                                            <div class="mb-2">
                                                <strong>{{ $reply->user?->name ?? 'Pengguna terhapus' }}</strong>
                                                <small
                                                    class="text-muted">{{ $reply->created_at->format('d M Y H:i') }}</small>
                                                <div>{{ $reply->body }}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
