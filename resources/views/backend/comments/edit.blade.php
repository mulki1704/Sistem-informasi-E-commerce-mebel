@extends('layouts.dashboard')

@section('isi')
    <header class="bg-header">
        <div class="container py-5">
            <div class="card">
                <div class="card-body">
                    <h1 class="mb-4">Edit Balasan</h1>

                    <div class="mb-3">
                        <a href="{{ route('admin.comments.index') }}" class="btn btn-sm btn-secondary">Kembali ke daftar</a>
                    </div>

                    @if (session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="card shadow-sm">
                        <div class="card-body">
                            <form action="{{ url('/comments/' . $comment->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label class="form-label">Komentar oleh</label>
                                    <input type="text" class="form-control"
                                        value="{{ $comment->user?->name ?? 'Pengguna terhapus' }}" disabled>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Isi Komentar</label>
                                    <textarea name="body" class="form-control" rows="5" required>{{ old('body', $comment->body) }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
