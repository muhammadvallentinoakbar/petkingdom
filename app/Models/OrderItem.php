<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'subtotal'
    ];

    // =====================
    // ITEM MILIK ORDER
    // =====================
    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class);
    }

    // =====================
    // ITEM TERHUBUNG KE PRODUCT
    // =====================
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }
}