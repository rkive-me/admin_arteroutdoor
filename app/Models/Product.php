<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'product_code',
        'description',
        'image',
        'stock',
        'category_id',
    ];

    // Relasi dengan kategori
    public function category()
    {
        return $this->belongsTo(Kategori::class, 'category_id');
    }

    // Relasi jika ingin mengetahui pesanan di mana produk ini disewa
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
