@extends('layouts.dashboard')

@section('isi')
    <header class="bg-header">
        <div class="container py-5">
            <div class="card">
                <div class="card-body">
                    <h1 class="mb-4">Detail Pesanan</h1>

                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Pelanggan</th>
                                    <td>{{ $order->user->name ?? '-' }}<br><small>{{ $order->user->email ?? '-' }}</small>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Produk</th>
                                    <td>{{ $order->product->nama ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Jumlah</th>
                                    <td>{{ $order->quantity }}</td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td>Rp. {{ number_format($order->price, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td>Rp. {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ ucfirst($order->status) }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Penerima</th>
                                    <td>{{ $order->nama_penerima }}</td>
                                </tr>
                                <tr>
                                    <th>Telepon</th>
                                    <td>{{ $order->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $order->address }}</td>
                                </tr>
                                <tr>
                                    <th>Catatan</th>
                                    <td>{{ $order->notes ?? '-' }}</td>
                                </tr>
                                @if ($order->cancellation_status !== 'none')
                                    <tr>
                                        <th>Status Pembatalan</th>
                                        <td>{{ ucfirst($order->cancellation_status) }}</td>
                                    </tr>
                                    @if ($order->cancellation_reason)
                                        <tr>
                                            <th>Alasan Pembatalan</th>
                                            <td>{{ $order->cancellation_reason }}</td>
                                        </tr>
                                    @endif
                                @endif
                            </table>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Gambar Produk</h5>
                                    @if ($order->product && $order->product->image_url)
                                        <img src="{{ $order->product->image_url }}" alt="{{ $order->product->nama }}"
                                            class="img-fluid rounded" />
                                    @else
                                        <div class="alert alert-secondary">Tidak ada gambar produk.</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('admin.orders.edit', $order) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
