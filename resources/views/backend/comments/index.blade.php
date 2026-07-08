@extends('layouts.dashboard')

@section('isi')
    <header class="bg-header">
        <div class="container py-5">
            <div class="card">
                <div class="card-body">
                    <h1 class="mb-4">Komentar Berita</h1>

                    @if (session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @foreach ($comments as $comment)
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <div class="row gy-3">
                                    <div class="col-md-8">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <div>
                                                <h5 class="mb-1">
                                                    {{ $comment->user?->name ?? 'Pengguna terhapus' }}
                                                    @if ($comment->user && $comment->user->role === 'admin')
                                                        <span class="badge bg-warning text-dark ms-2">Admin</span>
                                                    @endif
                                                </h5>
                                                <small
                                                    class="text-muted">{{ $comment->created_at->format('d M Y H:i') }}</small>
                                            </div>
                                            <span class="badge bg-info text-dark">Komentar</span>
                                        </div>
                                        <p class="mb-3">{{ $comment->body }}</p>
                                    </div>

                                    <div class="col-md-4">
                                        @if ($comment->berita)
                                            <div
                                                class="border rounded p-2 h-100 d-flex flex-column justify-content-between">
                                                @if ($comment->berita->image)
                                                    <img src="{{ asset('storage/' . $comment->berita->image) }}"
                                                        alt="{{ $comment->berita->title }}" class="img-fluid rounded mb-2"
                                                        style="max-height: 150px; object-fit: cover; width: 100%;" />
                                                @else
                                                    <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded mb-2"
                                                        style="min-height: 150px;">No Image</div>
                                                @endif

                                                <div>
                                                    <div class="small text-muted">Komentar pada artikel:</div>
                                                    <a href="{{ url('/Showberita/' . $comment->berita->slug) }}"
                                                        class="text-decoration-none fw-semibold">{{ $comment->berita->title }}</a>
                                                </div>
                                            </div>
                                        @else
                                            <div class="border rounded p-3 bg-light text-muted">
                                                Artikel tidak tersedia.
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <div class="d-flex gap-2 flex-wrap">
                                        <a href="{{ route('admin.comments.show', $comment) }}"
                                            class="btn btn-sm btn-outline-info">Detail</a>
                                        <a href="{{ route('admin.comments.show', $comment) }}#reply-form"
                                            class="btn btn-sm btn-outline-primary">Balas</a>
                                        <a href="{{ route('admin.comments.delete', $comment) }}"
                                            class="btn btn-sm btn-outline-danger">Hapus</a>
                                    </div>
                                </div>

                                @if ($comment->replies->count())
                                    <div class="mt-4 border-top pt-3">
                                        <h6 class="mb-3">Balasan ({{ $comment->replies->count() }})</h6>
                                        @foreach ($comment->replies as $reply)
                                            <div class="mb-3 p-3 bg-light rounded">
                                                <div
                                                    class="d-flex justify-content-between align-items-start mb-2 gap-2 flex-wrap">
                                                    <div>
                                                        <strong>{{ $reply->user?->name ?? 'Pengguna terhapus' }}</strong>
                                                        @if ($reply->user && $reply->user->role === 'admin')
                                                            <span class="badge bg-warning text-dark ms-2">Admin</span>
                                                        @endif
                                                        <small
                                                            class="text-muted d-block">{{ $reply->created_at->format('d M Y H:i') }}</small>
                                                    </div>
                                                    <div class="d-flex gap-2">
                                                        <a href="{{ route('admin.comments.delete', $reply) }}"
                                                            class="btn btn-sm btn-outline-danger">Hapus Balasan</a>
                                                    </div>
                                                </div>
                                                <div>{{ $reply->body }}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach

                    <div class="d-flex justify-content-center">
                        {{ $comments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
