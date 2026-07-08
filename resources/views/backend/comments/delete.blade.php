@extends('layouts.dashboard')

@section('isi')
    <header class="bg-header">
        <div class="container py-5">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-3 mb-4">
                        <div>
                            <h1 class="mb-2">Hapus Komentar</h1>
                            <p class="text-muted mb-0">Tinjau komentar ini sebelum Anda menghapusnya dari sistem.</p>
                        </div>
                        <a href="{{ route('admin.comments.index') }}" class="btn btn-outline-secondary">Kembali ke daftar</a>
                    </div>

                    <div class="alert alert-warning rounded-3">
                        <strong>Peringatan:</strong> Tindakan ini tidak dapat dibatalkan. Pastikan komentar yang dipilih
                        benar.
                    </div>

                    <div class="row g-4 mt-4">
                        <div class="col-12 col-lg-6">
                            <div class="card border-danger h-100">
                                <div class="card-header bg-danger text-white">
                                    Detail Komentar
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="small text-muted">Penulis</div>
                                        <div>{{ $comment->user?->name ?? 'Pengguna terhapus' }}</div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="small text-muted">Waktu komentar</div>
                                        <div>{{ $comment->created_at->format('d M Y H:i') }}</div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="small text-muted">Isi komentar</div>
                                        <div class="border rounded p-3 bg-light">{{ $comment->body }}</div>
                                    </div>
                                    @if ($comment->parent)
                                        <div class="mb-3">
                                            <div class="small text-muted">Tipe</div>
                                            <div>Balasan</div>
                                        </div>
                                    @else
                                        <div class="mb-3">
                                            <div class="small text-muted">Tipe</div>
                                            <div>Komentar utama</div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="card h-100">
                                <div class="card-header bg-secondary text-white">
                                    Data Artikel
                                </div>
                                <div class="card-body d-flex flex-column justify-content-between">
                                    @if ($comment->berita)
                                        <div>
                                            <h5 class="mb-2">{{ $comment->berita->title }}</h5>
                                            <p class="text-muted mb-3">Komentar terkait artikel ini.</p>
                                            <a href="{{ url('/Showberita/' . $comment->berita->slug) }}"
                                                class="text-decoration-none">Lihat artikel</a>
                                        </div>
                                    @else
                                        <div class="text-muted">Artikel terkait tidak tersedia lagi.</div>
                                    @endif

                                    <form action="{{ url('/comments/' . $comment->id) }}" method="POST" class="mt-4">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger w-100">Ya, hapus komentar</button>
                                        <a href="{{ route('admin.comments.index') }}"
                                            class="btn btn-outline-secondary w-100 mt-2">Batal</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
