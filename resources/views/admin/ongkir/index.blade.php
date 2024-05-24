@extends('component.main')

@section('content')
<div class="container-fluid">
    <h2 class="text-center" style="color: rgb(81, 143, 201)">Data Tarif Ongkir</h2>
    <main class="container">
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- TOMBOL TAMBAH DATA -->
            <div class="pb-3">
                <a href='{{ route('ongkirs.create') }}' class="btn btn-primary"> + Tambah Data Ongkir </a>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th class="col-md-1">No</th>
                        <th class="col-md-1">Kota</th>
                        <th class="col-md-1">Tarif</th>
                        <th class="col-md-1">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($ongkirs as $ongkir)
                    <tr class="text-center">
                        <td>{{ $no++ }}</td>
                        <td>{{ $ongkir->nama_kota }}</td>
                        <td>{{ $ongkir->tarif }}</td>
                        <td>
                            <a href="{{ route('ongkirs.edit', $ongkir->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('ongkirs.destroy', $ongkir->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus tarif ini?')">Del</button>
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
