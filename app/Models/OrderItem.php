<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id', // Mengganti 'item_id' dengan 'product_id'
        'quantity',
        'price',
        'start_date', // Pastikan ada jika digunakan
        'end_date', // Pastikan ada jika digunakan
    ];

    // Relasi ke pesanan
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relasi ke produk
    public function product()
    {
        return $this->belongsTo(Product::class); // Menghubungkan ke model Product
    }
}
