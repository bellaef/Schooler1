<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::all();
        return view('admin.produk.index', compact('products'));
    }

    public function create(): View
    {
        return view('admin.produk.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'stok_produk' => 'required|integer',
            'harga_produk' => 'required|integer',
            'berat_produk' => 'required|integer',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required|string',
            'kategori' => 'required|string|max:255',
        ]);

        if ($request->hasFile('gambar')){
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images/images/product'), $imageName);

            $validation['gambar'] = $imageName;
        }

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

        Product::create($validatedData);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit(Product $product): View
    {
        return view('admin.produk.edit', compact('product'));
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'stok_produk' => 'required|integer',
            'harga_produk' => 'required|integer',
            'berat_produk' => 'required|integer',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required|string',
            'kategori' => 'required|string|max:255',
        ]);

        if ($request->hasFile('gambar')){
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images/images/product'), $imageName);

            $validation['gambar'] = $imageName;
        }

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

        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus');
    }
}
