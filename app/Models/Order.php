<?php

namespace App\Models;

use App\Models\PaymentStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'payment_method_id',
        'payment_status_id',
    ];

    // Relasi ke pengguna (penyewa)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke item pesanan
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Relasi ke metode pembayaran
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    // Relasi ke status pembayaran
    public function paymentStatus()
    {
        return $this->belongsTo(PaymentStatus::class);
    }
}
