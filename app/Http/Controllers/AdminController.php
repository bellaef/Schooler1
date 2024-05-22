<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function showAdmin(): View{
        return view('admin.dashboard.index');
    }

    // public function logout(Request $request){
    //     Auth::guard('web')->logout;
    //     $request->session()->invalidate();
    //     return redirect('/login');
    // }
}
