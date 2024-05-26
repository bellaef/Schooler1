<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'ongkir_id', 'tanggal_pembelian', 'total_pembelian',
        'nama_kota', 'tarif', 'alamat_pengiriman', 'alamat_pengirim', 'bukti_transfer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ongkir()
    {
        return $this->belongsTo(Ongkir::class);
    }

    public function detailPembelian()
    {
        return $this->hasMany(Pembelian_produk::class);
    }

    public function calculateTotalPembelian()
    {
        return $this->detailPembelian()->sum('subharga');
    }
}

