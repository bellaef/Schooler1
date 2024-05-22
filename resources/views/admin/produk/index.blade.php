@extends('component.main')

@section('content')
<div class="container-fluid">
    <main class="container">
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- FORM PENCARIAN -->
            <div class="pb-3">
                <form class="d-flex" action="" method="get">
                    <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Cari barang" aria-label="Search">
                    <button class="btn btn-secondary" type="submit">Cari</button>
                </form>
            </div>

            <!-- TOMBOL TAMBAH DATA -->
            <div class="pb-3">
                <a href='{{ route('products.create') }}' class="btn btn-primary"> + Tambah Data Produk </a>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th class="col-md-1">ID</th>
                        <th class="col-md-2">Nama</th>
                        <th class="col-md-2">Deskripsi</th>
                        <th class="col-md-1">Harga</th>
                        <th class="col-md-1">Berat/gr</th>
                        <th class="col-md-1">Stok</th>
                        <th class="col-md-2">Kategori</th>
                        <th class="col-md-2">Gambar</th>
                        <th class="col-md-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->nama_produk }}</td>
                        <td>{{ $product->deskripsi }}</td>
                        <td>{{ $product->harga_produk }}</td>
                        <td>{{ $product->berat_produk }}</td>
                        <td>{{ $product->stok_produk }}</td>
                        <td>{{ $product->kategori }}</td>
                        <td><img src="{{ asset('images/images/product' . $product->gambar) }}" width="100"></td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <!-- AKHIR DATA -->
    </main>
</div>
@endsection
