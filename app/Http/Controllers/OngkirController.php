<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ongkir;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class OngkirController extends Controller
{
    public function index(): View
    {
        $ongkirs = Ongkir::all();
        return view('admin.ongkir.index', compact('ongkirs'));
    }

    public function create(): View
    {
        return view('admin.ongkir.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'nama_kota' => 'required|string|max:255',
            'tarif' => 'required|integer',
        ]);

        Ongkir::create($validatedData);

        return redirect()->route('ongkirs.index')->with('success', 'Data ongkir berhasil ditambahkan');
    }

    public function edit(Ongkir $ongkir): View
    {
        return view('admin.ongkir.edit', compact('ongkir'));
    }

    public function update(Request $request, Ongkir $ongkir): RedirectResponse
    {
        $validatedData = $request->validate([
            'nama_kota' => 'required|string|max:255',
            'tarif' => 'required|integer',
        ]);

        $ongkir->update($validatedData);

        return redirect()->route('ongkirs.index')->with('success', 'Tarif ongkir berhasil diperbarui');
            // $validation['gambar'] = $imageName;
    }

    public function destroy(Ongkir $ongkir): RedirectResponse
    {
        $ongkir->delete();
        return redirect()->route('ongkirs.index')->with('success', 'Tarif Ongkir berhasil dihapus');
    }
}
