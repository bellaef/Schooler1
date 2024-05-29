@extends('component.main')

@section('content')
<div class="container-fluid">
    <h2 class="text-center" style="color: rgb(81, 143, 201)">Riwayat Penjualan</h2>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    {{-- <a href="{{ route('pembelians.create') }}" class="btn btn-primary">Tambah Pembelian</a> --}}
    <table class="table mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Transaksi</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembelians as $pembelian)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pembelian->user->nama }}</td>
                    <td>{{ $pembelian->tanggal_pembelian }}</td>
                    <td>{{ $pembelian->total_pembelian }}</td>
                    <td>
                        <a href="{{ route('pembelians.show', $pembelian->id) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('pembelians.edit', $pembelian->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('pembelians.destroy', $pembelian->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pembelian ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
