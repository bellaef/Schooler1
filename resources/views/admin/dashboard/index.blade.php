@extends('component.main')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-12">
            @if(Auth::check())
                <h2 class="text-center" class="col-12" style="color: rgb(81, 143, 201)">
                Welcome to Schooler, {{ Auth::user()->username }}!
            </h2>
            @else
                <h2>Selamat datang, tamu!</h2>
            @endif
        </div>
        <h4>Here's Schooler recap</h4>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header" style="background-color: rgba(81, 143, 201, 0.151)">Total Admin</div>
                <div class="card-body">{{ $jumlahAdmin }}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header" style="background-color: rgba(81, 143, 201, 0.151)">Total Pelanggan</div>
                <div class="card-body">{{ $jumlahPelanggan }}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header" style="background-color: rgba(81, 143, 201, 0.151)">Total Produk</div>
                <div class="card-body">{{ $jumlahTotalProduk }}</div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header" style="background-color: rgba(81, 143, 201, 0.151)">Produk yg Harus Di-restock</div>
                <div class="card-body">
                    <p>{{ $produkDenganStokTersedikit->nama_produk }}</p>
                    <p>Jumlah Stok: {{ $produkDenganStokTersedikit->stok_produk }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header" style="background-color: rgba(81, 143, 201, 0.151)">Total Pemasukan</div>
                <div class="card-body">{{ $totalPemasukan }}</div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
