@extends('component.main')

@section('content')
<div class="container-fluid">
    <body class="bg-light">
        <h2 class="text-center" style="font-weight: bold; color:rgb(81, 143, 201)">Edit Produk</h2>
        <main class="container">
            <!-- START FORM -->
            <form action='{{ route('products.update', $product->id) }}' method='post' enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="my-3 p-4 bg-body rounded shadow-sm">
                    <div class="mb-3 row">
                        <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama_produk' id="nama_produk" value="{{ $product->nama_produk }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='deskripsi' id="deskripsi" value="{{ $product->deskripsi }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Harga" class="col-sm-2 col-form-label">Harga (Rupiah)</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='harga_produk' id="harga_produk" value="{{ $product->harga_produk }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Stok" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='stok_produk' id="stok_produk" value="{{ $product->stok_produk }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Berat" class="col-sm-2 col-form-label">Berat (gram)</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='berat_produk' id="berat_produk" value="{{ $product->berat_produk }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Gambar" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name='gambar' id="gambar">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Kategori" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='kategori' id="kategori" value="{{ $product->kategori }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="submit" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- AKHIR FORM -->
        </main>
    </body>
</div>
@endsection
