<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian_produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'pembelian_id', 'product_id', 'jumlah', 'nama', 'harga', 'berat', 'subberat', 'subharga'
    ];

    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
