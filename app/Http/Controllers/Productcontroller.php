<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Productcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::All();
        return view('backend.product.index', [
            'title'    => 'Product',
            'products' => $products,
        ]);
    }

    public function product()
    {
        $products = Product::latest();
        if (request('search')) {
            $products->where('nama', 'like', '%' . request('search') . '%')
                ->orWhere('deskripsi', 'like', '%' . request('search') . '%');
        }

        return view('frontend.product', [
            'title'    => 'Product',
            'products' => $products->paginate(6)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.create', [
            'title' => 'Create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'nama'      => 'required',
            'deskripsi' => 'required',
            'status'    => 'required',
            'harga'     => 'required',
            'image'     => 'required|image|file|max:1024',

        ]);

        $product       = new Product();
        $product->nama = $request->nama;
        // simpan file di disk 'public' sehingga dapat diakses via asset('storage/...')
        $product->image     = $request->file('image')->store('product-images', 'public');
        $product->deskripsi = $request->deskripsi;
        $product->harga     = $request->harga;
        $product->status    = $request->status;
        $product->save();

        return redirect()->route('product.index')->with('success', 'data created successfully!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.product.show', compact('product'), [
            'title' => 'Show',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::findOrFail($id);
        return view('backend.product.edit', compact('data'), [
            'title' => 'Edit',
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama'      => 'required',
            'status'    => 'required',
            'deskripsi' => 'required',
            'harga'     => 'required',
            'image'     => 'image|file|max:1024',

        ]);

        $product       = Product::findOrFail($id);
        $product->nama = $request->nama;
        if ($request->file('image')) {
            if ($request->oldimage) {
                // hapus dari disk 'public'
                Storage::disk('public')->delete($request->oldimage);
            }
            $product->image = $request->file('image')->store('product-images', 'public');
        }
        $product->status    = $request->status;
        $product->deskripsi = $request->deskripsi;
        $product->harga     = $request->harga;
        $product->save();

        return redirect('/dashboard/product')->with('success', 'data edited successfully!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {
            // hapus dari disk 'public'
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return back();
    }
}
