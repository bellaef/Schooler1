<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Pembelian_produk;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ongkir;
use App\Models\Product;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelians = Pembelian::with('user')->get();
        return view('admin.pembelian.index', compact('pembelians'));
    }

    public function create()
    {
        $users = User::where('role', 'pelanggan')->get();
        $ongkirs = Ongkir::all();
        $products = Product::all();
        return view('admin.pembelian.create', compact('users', 'ongkirs', 'products'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
        'user_id' => 'required|exists:users,id',
        'ongkir_id' => 'required|exists:ongkirs,id',
        'tanggal_pembelian' => 'required|date',
        // Tidak perlu validasi untuk total_pembelian karena akan dihitung berdasarkan harga barang yang diinput
        'alamat_pengiriman' => 'required|string',
        'alamat_pengirim' => 'required|string',
        'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Menghitung total pembelian berdasarkan harga barang yang diinput
        $total_pembelian = 0;
        $harga_barang = $request->input('harga_barang');
        foreach ($harga_barang as $harga) {
            $total_pembelian += $harga;
        }

        // Simpan data pembelian
        $pembelian = Pembelian::create([
        'user_id' => $validatedData['user_id'],
        'ongkir_id' => $validatedData['ongkir_id'],
        'tanggal_pembelian' => $validatedData['tanggal_pembelian'],
        'total_pembelian' => $total_pembelian, // Gunakan total pembelian yang dihitung
        'alamat_pengiriman' => $validatedData['alamat_pengiriman'],
        'alamat_pengirim' => $validatedData['alamat_pengirim'],
        'bukti_transfer' => $validatedData['bukti_transfer'],
    ]);

        // Simpan detail pembelian_produk
        $nama_barang = $request->input('nama_barang');
        foreach ($nama_barang as $key => $nama) {
            Pembelian_produk::create([
                'pembelian_id' => $pembelian->id,
                'nama' => $nama,
                'harga' => $harga_barang[$key],
                // Anda bisa menambahkan properti lainnya sesuai kebutuhan
            ]);
        }


        // Menyimpan file bukti transfer
        if ($request->hasFile('bukti_transfer')) {
            $validatedData['bukti_transfer'] = $request->file('bukti_transfer')->store('images/bukti_transfer', 'public');
        }


        return redirect()->route('pembelians.index')->with('success', 'Pembelian berhasil ditambahkan');
    }

    public function show($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelian_produk = Pembelian_produk::where('pembelian_id', $id)->get();
        return view('admin.pembelian.show', compact('pembelian', 'pembelian_produk'));
    }

    public function edit($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $users = User::where('role', 'pelanggan')->get();
        $ongkirs = Ongkir::all();
        return view('admin.pembelian.edit', compact('pembelian', 'users', 'ongkirs'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'ongkir_id' => 'required|exists:ongkirs,id',
            'tanggal_pembelian' => 'required|date',
            'alamat_pengiriman' => 'required|string',
            'alamat_pengirim' => 'required|string',
            'bukti_transfer' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_barang.*' => 'required|string',
            'harga_barang.*' => 'required|integer',
        ]);

        // Menyimpan file bukti transfer jika ada
        if ($request->hasFile('bukti_transfer')) {
            $validatedData['bukti_transfer'] = $request->file('bukti_transfer')->store('images/bukti_transfer', 'public');
        }

        // Mengupdate entri pembelian
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->update($validatedData);

        // Menghapus detail pembelian_produk yang terkait dengan pembelian
        Pembelian_produk::where('pembelian_id', $id)->delete();

        // Menghitung ulang total pembelian dari harga barang yang diinputkan
        $total_pembelian = 0;
        $nama_barang = $request->input('nama_barang');
        $harga_barang = $request->input('harga_barang');

        foreach ($nama_barang as $key => $nama) {
            $harga = isset($harga_barang[$key]) ? (int)$harga_barang[$key] : 0;
            $total_pembelian += $harga;

            // Menyimpan detail pembelian_produk
            Pembelian_produk::create([
                'pembelian_id' => $pembelian->id,
                'nama_barang' => $nama,
                'harga_barang' => $harga,
            ]);
        }

        // Memperbarui total pembelian pada entri pembelian
        $pembelian->update(['total_pembelian' => $total_pembelian]);

        return redirect()->route('pembelians.index')->with('success', 'Pembelian berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Menghapus pembelian dan detail pembelian_produk yang terkait
        Pembelian::findOrFail($id)->delete();
        Pembelian_produk::where('pembelian_id', $id)->delete();
        return redirect()->route('pembelians.index')->with('success', 'Pembelian berhasil dihapus');
    }
}


