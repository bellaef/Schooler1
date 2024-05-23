<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ongkir;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Ongkir::all();
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

        // if ($request->hasFile('gambar')) {
        //     // Get the original path of the uploaded file
        //     $originalPath = $request->file('gambar')->getPathName();
        //     // Define the destination path in the public directory
        //     $destinationPath = public_path('assets/images/images/product/');
        //     // Define the new filename
        //     $newFilename = $request->file('gambar')->getClientOriginalName();
        //     // Move the file to the destination path
        //     $request->file('gambar')->move($destinationPath, $newFilename);
        //     // Save the relative path to the database
        //     $validatedData['gambar'] = 'images/images/product/' . $newFilename;
        // }

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

        return redirect()->route('ongkirs.index')->with('success', 'Ongkir berhasil diperbarui');
            // $validation['gambar'] = $imageName;
    }

    public function destroy(Ongkir $ongkir): RedirectResponse
    {
        $ongkir->delete();
        return redirect()->route('ongkirs.index')->with('success', 'Ongkir berhasil dihapus');
    }
}
