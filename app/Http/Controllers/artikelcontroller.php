<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class artikelcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $dataartikel = artikel::latest();
        if (request('search')) {
            $dataartikel->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%')
                ->orWhere('subtitle', 'like', '%' . request('search') . '%');
        }
        return view('backend.artikel.index', [
            'title' => 'Artikel',
            'data' => $dataartikel->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.artikel.create', [
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
        //
        $data = $request->validate([
            'title' => 'required|unique:artikels',
            'subtitle' => 'required',
            'body' => 'required',

        ]);

        $artikels = new artikel();
        $artikels->title = $request->title;
        $artikels->subtitle = $request->subtitle;
        $artikels->body = $request->body;
        $artikels->excerpt = Str::limit(strip_tags($request->body), 300, '...');

        $artikels->save();

        return redirect('/dashboard/artikel')->with('success', 'data created successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = artikel::findOrFail($id);
        return view('backend.artikel.show', compact('data'), [
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
        //
        $data = artikel::findOrFail($id);
        return view('backend.artikel.edit', compact('data'), [
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
        //
        $data = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'body' => 'required',

        ]);

        $artikels = artikel::findOrFail($id);
        $artikels->title = $request->title;
        $artikels->slug = Str::slug($data['title']);
        $artikels->subtitle = $request->subtitle;
        $artikels->body = $request->body;
        $artikels->excerpt = Str::limit(strip_tags($request->body), 200, '...');

        $artikels->save();

        return redirect('/dashboard/artikel')->with('success', 'data editing successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $artikels = artikel::findOrFail($id);
        $artikels->delete();
        return redirect('/dashboard/artikel')
            ->with('success', 'Data berhasil dihapus!');
    }
}

