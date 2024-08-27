<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesan extends Model
{
    use HasFactory;

    protected $table = 'detail_pesan';

    protected $fillable = [
        'pesan_id',
        'nama_barang',
        'jumlah',
        'harga',
        'jumlah_harga',
        'deskripsi',
        'foto',
        'tanggal_awal',
        'tanggal_akhir',
    ];

    public function pesan()
    {
        return $this->belongsTo(Order::class, 'pesan_id');
    }
}
