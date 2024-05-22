<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'nama_produk', 'stok_produk', 'harga_produk', 'berat_produk', 'gambar', 'deskripsi', 'kategori',
    // ];

    protected $guarded = [
        'id',
    ];
}
