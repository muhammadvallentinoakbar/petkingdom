<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity'
    ];

    // =====================
    // RELASI KE PRODUCT
    // =====================
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // =====================
    // RELASI KE USER
    // =====================
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}