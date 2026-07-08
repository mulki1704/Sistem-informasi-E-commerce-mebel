<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create(Product $product)
    {
        return view('frontend.orders.create', [
            'title'   => 'Pesan Produk',
            'product' => $product,
        ]);
    }

    public function store(Request $request, Product $product)
    {
        $data = $request->validate([
            'quantity'      => 'required|integer|min:1',
            'nama_penerima' => 'required|string|max:100',
            'phone'         => 'required|string|max:20',
            'address'       => 'required|string|max:500',
            'notes'         => 'nullable|string|max:500',
        ]);

        $quantity = (int) $data['quantity'];
        $price    = (float) $product->harga;

        Order::create([
            'user_id'       => Auth::id(),
            'product_id'    => $product->id,
            'quantity'      => $quantity,
            'price'         => $price,
            'total_price'   => $price * $quantity,
            'nama_penerima' => $data['nama_penerima'],
            'phone'         => $data['phone'],
            'address'       => $data['address'],
            'notes'         => $data['notes'] ?? null,
            'status'        => 'pending',
        ]);

        return redirect('/orders')->with('success', 'Pesanan berhasil dibuat.');
    }

    public function index()
    {
        $orders = Order::with('product')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('frontend.orders.index', [
            'title'  => 'Riwayat Pesanan',
            'orders' => $orders,
        ]);
    }

    public function edit(Order $order)
    {
        if (Auth::id() !== $order->user_id) {
            abort(403);
        }

        return view('frontend.orders.edit', [
            'title'   => 'Edit Pesanan',
            'order'   => $order,
            'product' => $order->product,
        ]);
    }

    public function update(Request $request, Order $order)
    {
        if (Auth::id() !== $order->user_id || $order->status === 'cancelled') {
            abort(403);
        }

        $data = $request->validate([
            'quantity'      => 'required|integer|min:1',
            'nama_penerima' => 'required|string|max:100',
            'phone'         => 'required|string|max:20',
            'address'       => 'required|string|max:500',
            'notes'         => 'nullable|string|max:500',
        ]);

        $quantity = (int) $data['quantity'];
        $price    = (float) $order->product->harga;

        $order->update([
            'quantity'      => $quantity,
            'price'         => $price,
            'total_price'   => $price * $quantity,
            'nama_penerima' => $data['nama_penerima'],
            'phone'         => $data['phone'],
            'address'       => $data['address'],
            'notes'         => $data['notes'] ?? null,
        ]);

        return redirect('/orders')->with('success', 'Pesanan berhasil diperbarui.');
    }

    public function cancel(Order $order)
    {
        if (Auth::id() !== $order->user_id) {
            abort(403);
        }

        request()->validate([
            'reason' => 'required|string|max:500',
        ]);

        $order->update([
            'cancellation_reason' => request('reason'),
            'cancellation_status' => 'requested',
        ]);

        return redirect('/orders')->with('success', 'Permintaan pembatalan dikirim. Menunggu konfirmasi admin.');
    }

    public function adminIndex()
    {
        $orders = Order::with(['user', 'product'])
            ->latest()
            ->paginate(20);

        return view('backend.orders.index', [
            'title'  => 'Data Pesanan',
            'orders' => $orders,
        ]);
    }

    public function adminCreate()
    {
        return view('backend.orders.create', [
            'title'    => 'Tambah Pesanan',
            'users'    => User::orderBy('name')->get(),
            'products' => Product::orderBy('nama')->get(),
        ]);
    }

    public function adminStore(Request $request)
    {
        $data = $request->validate([
            'user_id'       => 'required|exists:users,id',
            'product_id'    => 'required|exists:products,id',
            'quantity'      => 'required|integer|min:1',
            'nama_penerima' => 'required|string|max:100',
            'phone'         => 'required|string|max:20',
            'address'       => 'required|string|max:500',
            'notes'         => 'nullable|string|max:500',
        ]);

        $product  = Product::findOrFail($data['product_id']);
        $quantity = (int) $data['quantity'];
        $price    = (float) $product->harga;

        Order::create([
            'user_id'       => $data['user_id'],
            'product_id'    => $product->id,
            'quantity'      => $quantity,
            'price'         => $price,
            'total_price'   => $price * $quantity,
            'nama_penerima' => $data['nama_penerima'],
            'phone'         => $data['phone'],
            'address'       => $data['address'],
            'notes'         => $data['notes'] ?? null,
            'status'        => 'pending',
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Pesanan admin berhasil ditambahkan.');
    }

    public function adminShow(Order $order)
    {
        return view('backend.orders.show', [
            'title' => 'Detail Pesanan',
            'order' => $order->load(['user', 'product']),
        ]);
    }

    public function adminEdit(Order $order)
    {
        return view('backend.orders.edit', [
            'title'    => 'Edit Pesanan',
            'order'    => $order->load(['user', 'product']),
            'users'    => User::orderBy('name')->get(),
            'products' => Product::orderBy('nama')->get(),
        ]);
    }

    public function adminUpdate(Request $request, Order $order)
    {
        $data = $request->validate([
            'user_id'       => 'required|exists:users,id',
            'product_id'    => 'required|exists:products,id',
            'quantity'      => 'required|integer|min:1',
            'nama_penerima' => 'required|string|max:100',
            'phone'         => 'required|string|max:20',
            'address'       => 'required|string|max:500',
            'notes'         => 'nullable|string|max:500',
            'status'        => 'required|in:pending,confirmed,packing,shipped,completed,cancelled',
        ]);

        $product  = Product::findOrFail($data['product_id']);
        $quantity = (int) $data['quantity'];
        $price    = (float) $product->harga;

        $order->update([
            'user_id'       => $data['user_id'],
            'product_id'    => $product->id,
            'quantity'      => $quantity,
            'price'         => $price,
            'total_price'   => $price * $quantity,
            'nama_penerima' => $data['nama_penerima'],
            'phone'         => $data['phone'],
            'address'       => $data['address'],
            'notes'         => $data['notes'] ?? null,
            'status'        => $data['status'],
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Pesanan admin berhasil diperbarui.');
    }

    public function adminDestroy(Order $order)
    {
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Pesanan berhasil dihapus.');
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,packing,shipped,completed,cancelled',
        ]);

        $order->update(['status' => $request->status]);

        return back()->with('success', 'Status pesanan diperbarui.');
    }

    // Admin approves a cancellation request
    public function approveCancellation(Order $order)
    {
        // only admin can call (route protected)
        if ($order->cancellation_status !== 'requested') {
            return back()->with('error', 'Tidak ada permintaan pembatalan untuk pesanan ini.');
        }

        $order->update([
            'status'              => 'cancelled',
            'cancellation_status' => 'approved',
        ]);

        return back()->with('success', 'Permintaan pembatalan disetujui. Pesanan dibatalkan.');
    }

    // Admin rejects a cancellation request
    public function rejectCancellation(Order $order)
    {
        if ($order->cancellation_status !== 'requested') {
            return back()->with('error', 'Tidak ada permintaan pembatalan untuk pesanan ini.');
        }

        $order->update([
            'cancellation_status' => 'rejected',
        ]);

        return back()->with('success', 'Permintaan pembatalan ditolak.');
    }
}
