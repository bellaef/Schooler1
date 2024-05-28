<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class ProfilController extends Controller
{
    public function showProfil(): View{
        return view('admin.profil.index');
    }

    public function edit()
    {
        $user = Auth::user();
        return view('admin.profil.edit', ['user' => $user]);
    }

    /**
     * Update the user profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the user profile.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(): RedirectResponse
    {
        $user = Auth::user();
        $user->delete();

        return redirect()->route('login')->with('success', 'Your account has been deleted.');
    }
}
