<?php
namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\berita;
use App\Models\kontak;
use App\Models\Product;

class dashboard extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $articleCount = artikel::count();
        $beritaCount  = berita::count();
        $kontakCount  = kontak::count();

        $productAvailable   = Product::where('status', 'Tersedia')->count();
        $productUnavailable = Product::where('status', 'Tidak tersedia')->count();
        $inventoryValue     = Product::sum('harga');
        $availableValue     = Product::where('status', 'Tersedia')->sum('harga');

        $monthlyProducts = Product::selectRaw('MONTH(created_at) as month, count(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        $monthLabels = [];
        $monthValues = [];
        for ($month = 1; $month <= 12; $month++) {
            $monthLabels[] = date('M', mktime(0, 0, 0, $month, 1));
            $monthValues[] = $monthlyProducts[$month] ?? 0;
        }

        return view('backend.dashboard.index', [
            'title'              => 'Dashboard',
            'productCount'       => $productCount,
            'articleCount'       => $articleCount,
            'beritaCount'        => $beritaCount,
            'kontakCount'        => $kontakCount,
            'productAvailable'   => $productAvailable,
            'productUnavailable' => $productUnavailable,
            'inventoryValue'     => $inventoryValue,
            'availableValue'     => $availableValue,
            'monthLabels'        => $monthLabels,
            'monthValues'        => $monthValues,
        ]);
    }
}
