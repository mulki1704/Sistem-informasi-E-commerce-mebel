<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\artikel;
use App\Models\berita;
use App\Models\Product;
use App\Models\visimisi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {

        $databerita = berita::latest();
        if(request('search')){
            $databerita->where('title','like','%'.request('search'). '%')
                       ->orWhere('body','like','%'.request('search').'%');
        }

        return view('frontend.home',[
            'title' => 'Home',
            'databerita' => $databerita->paginate(6)->withQueryString(),
            'dataartikel' => artikel::find(1)
             
        ]);
    }

    public function berita()
    {
        $databerita = berita::latest();
        if(request('search')){
            $databerita->where('title','like','%'.request('search'). '%')
                       ->orWhere('body','like','%'.request('search').'%');
        }

        return view('frontend.berita',[
            'title' => 'Berita',
            'databerita' => $databerita->paginate(6)->withQueryString(),
            'dataartikel' => artikel::find(2)
        ]);
    }
    public function tentangkami()
    {

        return view('frontend.tentangkami',[
            'title' => 'Tentang Kami',
            'datavisimisi' => visimisi::all(),
            'dataartikel' => artikel::find(1)
        ]);
    }

    public function showberita(berita $berita){
        return view('frontend.showberita',[
            'title' => 'Show Berita',
            'berita' => $berita
        ]); 
    }
    public function showartikel(artikel $artikel){
      
        return view('frontend.showartikel',[
            'title' => 'Show Artikel',
            'artikel' => $artikel
        ]);
    }
    public function showproduct(product $product){
        return view('frontend.showproduct',[
            'title' => 'Show Product',
            'product' => $product
        ]);
    }
}