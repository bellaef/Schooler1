<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PelangganController extends Controller
{
    public function showPelanggan(): View{
        return view('pelanggan.index');
    }
}
