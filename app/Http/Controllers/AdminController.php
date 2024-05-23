<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showAdmin(): View{
        return view('admin.dashboard.index');
    }

    public function index(): View
    {
        $users = User::where('role', 'admin')->get();
        return view('admin.admin.index', compact('users'));
    }

    public function create(): View
    {
        return view('admin.admin.create');
    }

    public function store(Request $request): RedirectResponse{
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
        $validatedData['role'] = 'admin';

        User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'Admin berhasil ditambahkan');
    }

    public function edit(User $user): View
    {
        return view('admin.admin.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
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

        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'Data Admin berhasil diperbarui');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Data Admin berhasil dihapus');
    }
    // public function logout(Request $request){
    //     Auth::guard('web')->logout;
    //     $request->session()->invalidate();
    //     return redirect('/login');
    // }
}
