@extends('component.main')

@section('content')
<div class="container-fluid">
    <h2 class="text-center" style="color: rgb(81, 143, 201)">Tambah Riwayat Pembelian</h2>
    <form action="{{ route('pembelians.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="user_id">Pelanggan:</label>
            <select class="form-control mb-2" id="user_id" name="user_id" required>
                <option value="">Pilih Pelanggan</option>
                @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="ongkir_id">Pilih Kota:</label>
            <select class="form-control mb-2" id="ongkir_id" name="ongkir_id" required>
                <option value="">Pilih Kota Pengiriman</option>
                @foreach($ongkirs as $ongkir)
                <option value="{{ $ongkir->id }}">{{ $ongkir->nama_kota }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_pembelian">Tanggal Pembelian:</label>
            <input type="date" class="form-control mb-2" id="tanggal_pembelian" name="tanggal_pembelian" required>
        </div>
        <div id="barang-container">
            <!-- Container untuk input dinamis nama dan harga barang -->
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-primary" onclick="addBarang()">Tambah Barang</button>
        </div>
        <div class="form-group">
            <label for="alamat_pengiriman">Alamat Pengiriman:</label>
            <textarea class="form-control mb-2" id="alamat_pengiriman" name="alamat_pengiriman" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="alamat_pengirim">Alamat Pengirim:</label>
            <textarea class="form-control mb-2" id="alamat_pengirim" name="alamat_pengirim" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="bukti_transfer">Bukti Transfer:</label>
            <input type="file" class="form-control-file mb-2" id="bukti_transfer" name="bukti_transfer" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection

@push('scripts')
<script>
    let barangCount = 1;

    function addBarang() {
        const container = document.getElementById('barang-container');
        const input = `
            <div class="form-group">
                <label for="nama_barang_${barangCount}">Nama Barang:</label>
                <input type="text" class="form-control mb-2" id="nama_barang_${barangCount}" name="nama_barang[]" required>
            </div>
            <div class="form-group">
                <label for="harga_barang_${barangCount}">Harga Barang:</label>
                <input type="number" class="form-control mb-2" id="harga_barang_${barangCount}" name="harga_barang[]" required>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', input);
        barangCount++;
    }
</script>
@endpush
