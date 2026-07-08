@extends('layouts.main')

@section('konten')
    <div class="banner-image3 w-100">
        <div class="container-xl header-image">
            <div class="row">
                <div class="col-sm-12 col-md-9 col-lg-6">
                    <h1>Pesan Produk</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content-overlay py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">Pesanan untuk {{ $product->nama }}</h4>
                        <form action="{{ route('orders.store', $product) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Jumlah</label>
                                <input type="number" name="quantity" class="form-control"
                                    value="{{ old('quantity', request()->query('quantity', 1)) }}" min="1" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Penerima</label>
                                <input type="text" name="nama_penerima" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nomor HP</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea name="address" class="form-control" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Catatan</label>
                                <textarea name="notes" class="form-control" rows="2"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Buat Pesanan</button>
                            <a href="{{ route('showproduct', $product->slug) }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
