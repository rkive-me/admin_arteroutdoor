<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjang';

    protected $fillable = [
        'barang_id',
        'jumlah_barang',
        'jumlah_harga',
    ];

    public function barang()
    {
        return $this->belongsTo(Product::class, 'barang_id');
    }
}
