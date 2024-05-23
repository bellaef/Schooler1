<?php
// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\User;
// use Illuminate\View\View;
// use Illuminate\Http\RedirectResponse;
// use Illuminate\Support\Facades\Hash;

// class PelangganController extends Controller
// {

//     public function index(): View
//     {
//         $users = User::where('role', 'pelanggan')->get();
//         return view('admin.pelanggan.index', compact('users'));
//     }

//     public function create(): View
//     {
//         return view('admin.pelanggan.create');
//     }

//     public function store(Request $request): RedirectResponse
//     {
//         $validatedData = $request->validate([
//             'nama' => 'required|string|max:255',
//             'username' => 'required|string|max:255|unique:users',
//             'email' => 'required|string|email|max:255|unique:users',
//             'password' => 'required|string|min:8|confirmed',
//             'telepon' => 'required|string|max:15',
//             'alamat' => 'required|string',
//             'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//         ]);

//         if ($request->hasFile('foto')) {
//             $imageName = time() . '.' . $request->foto->extension();
//             $request->foto->move(public_path('images/images/user'), $imageName);
//             $validatedData['foto'] = $imageName;
//         }

//         $validatedData['password'] = Hash::make($request->password);
//         $validatedData['role'] = 'pelanggan';

//         User::create($validatedData);

//         return redirect()->route('customer.index')->with('success', 'Pelanggan berhasil ditambahkan');
//     }

//     public function edit(User $pelanggan): View
//     {
//         return view('admin.pelanggan.edit', compact('pelanggan'));
//     }

//     public function update(Request $request, User $pelanggan): RedirectResponse
//     {
//         $validatedData = $request->validate([
//             'nama' => 'required|string|max:255',
//             'username' => 'required|string|max:255|unique:users,username,' . $pelanggan->id,
//             'email' => 'required|string|email|max:255|unique:users,email,' . $pelanggan->id,
//             'password' => 'nullable|string|min:8|confirmed',
//             'telepon' => 'required|string|max:15',
//             'alamat' => 'required|string',
//             'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//         ]);

//         if ($request->hasFile('foto')) {
//             $imageName = time() . '.' . $request->foto->extension();
//             $request->foto->move(public_path('images/images/user'), $imageName);
//             $validatedData['foto'] = $imageName;
//         }

//         if ($request->filled('password')) {
//             $validatedData['password'] = Hash::make($request->password);
//         } else {
//             unset($validatedData['password']);
//         }

//         $pelanggan->update($validatedData);

//         return redirect()->route('customer.index')->with('success', 'Data Pelanggan berhasil diperbarui');
//     }

//     public function destroy(User $pelanggan): RedirectResponse
//     {
//         $pelanggan->delete();
//         return redirect()->route('customer.index')->with('success', 'Data Pelanggan berhasil dihapus');
//     }
// }

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class PelangganController extends Controller
{
    public function index(): View
    {
        $users = User::where('role', 'pelanggan')->get();
        return view('admin.pelanggan.index', compact('users'));
    }

    public function create(): View
    {
        return view('admin.pelanggan.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('images/images/user'), $imageName);
            $validatedData['foto'] = $imageName;
        }

        $validatedData['password'] = Hash::make($request->password);
        $validatedData['role'] = 'pelanggan';

        User::create($validatedData);

        return redirect()->route('customer.index')->with('success', 'Pelanggan berhasil ditambahkan');
    }

    public function edit(User $customer): View
    {
        return view('admin.pelanggan.edit', compact('customer'));
    }

    public function update(Request $request, User $customer): RedirectResponse
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $customer->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $customer->id,
            'password' => 'nullable|string|min:8|confirmed',
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('images/images/user'), $imageName);
            $validatedData['foto'] = $imageName;
        }

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->password);
        } else {
            unset($validatedData['password']);
        }

        $customer->update($validatedData);

        return redirect()->route('customer.index')->with('success', 'Data Pelanggan berhasil diperbarui');
    }

    public function destroy(User $customer): RedirectResponse
    {
        $customer->delete();
        return redirect()->route('customer.index')->with('success', 'Data Pelanggan berhasil dihapus');
    }
}
