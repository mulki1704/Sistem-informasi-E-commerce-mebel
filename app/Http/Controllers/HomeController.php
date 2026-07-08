<?php
namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\berita;
use App\Models\Product;
use App\Models\visimisi;
use Illuminate\Http\Request;

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
    private function getFirstArtikel()
    {
        return artikel::latest()->first() ?: new artikel();
    }

    public function home()
    {

        $databerita = berita::latest();
        if (request('search')) {
            $databerita->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }

        return view('frontend.home', [
            'title'       => 'Home',
            'databerita'  => $databerita->paginate(6)->withQueryString(),
            'dataartikel' => $this->getFirstArtikel(),
            'products' => Product::latest()->take(6)->get(), 

        ]);
    }

    public function berita()
    {
        $databerita = berita::latest();
        if (request('search')) {
            $databerita->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }

        return view('frontend.berita', [
            'title'       => 'Berita',
            'databerita'  => $databerita->paginate(6)->withQueryString(),
            'dataartikel' => $this->getFirstArtikel(),
        ]);
    }
    public function tentangkami()
    {

        return view('frontend.tentangkami', [
            'title'        => 'Tentang Kami',
            'datavisimisi' => visimisi::all(),
            'dataartikel'  => $this->getFirstArtikel(),
        ]);
    }

    public function showberita(berita $berita)
    {
        return view('frontend.showberita', [
            'title'  => 'Show Berita',
            'berita' => $berita,
        ]);
    }
    public function showartikel(?artikel $artikel = null)
    {
        $artikel = $artikel ?: $this->getFirstArtikel();

        return view('frontend.showartikel', [
            'title'   => 'Show Artikel',
            'artikel' => $artikel,
        ]);
    }
    public function showproduct(product $product)
    {
        return view('frontend.showproduct', [
            'title'   => 'Show Product',
            'product' => $product,
        ]);
    }
}
