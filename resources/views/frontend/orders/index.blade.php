@extends('layouts.main')

@section('konten')
    <div class="banner-image3 w-100">
        <div class="container-xl header-image">
            <div class="row">
                <div class="col-sm-12 col-md-9 col-lg-6">
                    <h1>Riwayat Pesanan</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content-overlay py-5">
        <div class="container">
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($orders->count())
                @foreach ($orders as $order)
                    <div class="card mb-3 shadow-sm">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ $order->product->image_url ?? asset('images/no-image.png') }}"
                                    class="img-fluid rounded-start h-100" alt="{{ $order->product->nama ?? 'Produk' }}"
                                    style="object-fit: cover; width: 100%; max-height: 250px;" />
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div
                                        class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
                                        <div>
                                            <h5 class="card-title">{{ $order->product->nama ?? '-' }}</h5>
                                            <p class="mb-1 text-muted">{{ $order->product->kategori ?? '' }}</p>
                                        </div>
                                        <span class="badge bg-info text-dark">{{ ucfirst($order->status) }}</span>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-sm-6">
                                            <p class="mb-1"><strong>Jumlah:</strong> {{ $order->quantity }}</p>
                                            <p class="mb-1"><strong>Harga satuan:</strong> Rp.
                                                {{ number_format($order->price, 0, ',', '.') }}</p>
                                            <p class="mb-1"><strong>Total:</strong> Rp.
                                                {{ number_format($order->total_price, 0, ',', '.') }}</p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="mb-1"><strong>Penerima:</strong> {{ $order->nama_penerima }}</p>
                                            <p class="mb-1"><strong>Telepon:</strong> {{ $order->phone }}</p>
                                            <p class="mb-1"><strong>Alamat:</strong> {{ $order->address }}</p>
                                        </div>
                                    </div>

                                    @if ($order->notes)
                                        <div class="mt-3">
                                            <p class="mb-1"><strong>Catatan:</strong></p>
                                            <p class="mb-0">{{ $order->notes }}</p>
                                        </div>
                                    @endif

                                    <div class="mt-3 d-flex flex-wrap gap-2">
                                        <a href="{{ route('orders.create', $order->product) }}"
                                            class="btn btn-sm btn-outline-success">Order Lagi</a>
                                        @if ($order->status !== 'cancelled' && $order->status !== 'completed')
                                            <a href="{{ route('orders.edit', $order) }}"
                                                class="btn btn-sm btn-outline-primary">Edit</a>
                                            <button class="btn btn-sm btn-outline-danger" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#cancel-form-{{ $order->id }}">Batalkan</button>

                                            <div class="collapse mt-2" id="cancel-form-{{ $order->id }}">
                                                <form action="{{ route('orders.cancel', $order) }}" method="POST">
                                                    @csrf
                                                    <div class="mb-2">
                                                        <label for="reason-{{ $order->id }}" class="form-label">Alasan
                                                            pembatalan <span class="text-danger">*</span></label>
                                                        <textarea id="reason-{{ $order->id }}" name="reason" class="form-control" rows="3" required
                                                            placeholder="Jelaskan alasan pembatalan pesanan..."></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-sm btn-danger">Kirim Permintaan
                                                        Pembatalan</button>
                                                    <button type="button" class="btn btn-sm btn-outline-secondary"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#cancel-form-{{ $order->id }}">Batal</button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    {{ $orders->links() }}
                </div>
            @else
                <div class="alert alert-secondary">Belum ada pesanan.</div>
            @endif
        </div>
    </div>
@endsection
