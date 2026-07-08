@extends('layouts.main')

@section('konten')
    <div class="banner-image3 w-100">
        <div class="container-xl header-image">
            <div class="row">
                <div class="col-sm-12 col-md-9 col-lg-6">
                    <h1>Edit Pesanan</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content-overlay py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">Edit pesanan {{ $product->nama }}</h4>
                        <form action="{{ route('orders.update', $order) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Jumlah</label>
                                <input type="number" name="quantity" class="form-control" value="{{ $order->quantity }}"
                                    min="1" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Penerima</label>
                                <input type="text" name="nama_penerima" class="form-control"
                                    value="{{ $order->nama_penerima }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nomor HP</label>
                                <input type="text" name="phone" class="form-control" value="{{ $order->phone }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea name="address" class="form-control" rows="3" required>{{ $order->address }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Catatan</label>
                                <textarea name="notes" class="form-control" rows="2">{{ $order->notes }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                            <a href="{{ route('orders.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
