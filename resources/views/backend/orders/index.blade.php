@extends('layouts.dashboard')

@section('isi')
    <header class="bg-header">
        <div class="container py-5">
            <div class="card">
                <div class="card-body">
                    <h1 class="mb-4">Transaksi Pesanan</h1>

                    @if (session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Transaksi Pesanan</h5>
                        <a href="{{ route('admin.orders.create') }}" class="btn btn-sm btn-success">Tambah Pesanan</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Produk</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->user->name ?? '-' }}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                @if ($order->product && $order->product->image_url)
                                                    <img src="{{ $order->product->image_url }}"
                                                        alt="{{ $order->product->nama }}"
                                                        style="width:64px;height:48px;object-fit:cover;border-radius:4px;" />
                                                @endif
                                                <div>
                                                    <div>{{ $order->product->nama ?? '-' }}</div>
                                                    <div class="small text-muted">Rp.
                                                        {{ number_format($order->price, 0, ',', '.') }} x
                                                        {{ $order->quantity }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>Rp. {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                        <td>{{ ucfirst($order->status) }}</td>
                                        <td>
                                            <div class="d-flex flex-column gap-2">
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('admin.orders.show', $order) }}"
                                                        class="btn btn-sm btn-info">Lihat</a>
                                                    <a href="{{ route('admin.orders.edit', $order) }}"
                                                        class="btn btn-sm btn-outline-primary">Edit</a>
                                                    <form action="{{ route('admin.orders.destroy', $order) }}"
                                                        method="POST" onsubmit="return confirm('Hapus pesanan ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                                <form action="{{ route('admin.orders.updateStatus', $order) }}"
                                                    method="POST" class="d-flex gap-2">
                                                    @csrf
                                                    <select name="status" class="form-select form-select-sm">
                                                        @foreach (['pending', 'confirmed', 'packing', 'shipped', 'completed', 'cancelled'] as $status)
                                                            <option value="{{ $status }}"
                                                                {{ $order->status === $status ? 'selected' : '' }}>
                                                                {{ ucfirst($status) }}</option>
                                                        @endforeach
                                                    </select>
                                                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                                </form>

                                                @if ($order->cancellation_status === 'requested')
                                                    <div class="mt-2 p-2 border rounded bg-light">
                                                        <div class="small text-muted">Permintaan Pembatalan:</div>
                                                        <div class="mb-2">{{ $order->cancellation_reason }}</div>
                                                        <div class="d-flex gap-2">
                                                            <form
                                                                action="{{ route('admin.orders.cancel.approve', $order) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-success">Setujui</button>
                                                            </form>
                                                            <form
                                                                action="{{ route('admin.orders.cancel.reject', $order) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-outline-secondary">Tolak</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
