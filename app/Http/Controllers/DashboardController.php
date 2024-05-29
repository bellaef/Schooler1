<?php

namespace App\Http\Controllers;

use App\Models\pembelian_produk;
use App\Models\Pembelian;
use App\Models\User;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function showAdmin(): View{
        return view('admin.dashboard.index');
    }

    public function index()
    {
        $jumlahAdmin = User::where('role', 'admin')->count();
        $jumlahPelanggan = User::where('role', 'pelanggan')->count();
        $jumlahTotalProduk = Product::count();
        $jumlahProdukTerjual = pembelian_produk::sum('jumlah');
        $produkDenganStokTersedikit = Product::orderBy('stok_produk')->first();
        $totalPemasukan = pembelian::sum('total_pembelian');
        $produkTerlaris = pembelian_produk::select('product_id')
            ->groupBy('product_id')
            ->orderByRaw('SUM(jumlah) DESC')
            ->limit(1)
            ->pluck('product_id')
            ->first();

        $produkTerlarisInfo = Product::find($produkTerlaris);

        return view('admin.dashboard.index', compact(
            'jumlahAdmin',
            'jumlahPelanggan',
            'jumlahTotalProduk',
            'jumlahProdukTerjual',
            'produkDenganStokTersedikit',
            'produkTerlarisInfo',
            'totalPemasukan'
        ));
    }
}
