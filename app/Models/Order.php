<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrderItem;

class Order extends Model
{
    protected $fillable = [
    'user_id',
    'invoice',
    'subtotal',
    'shipping_cost',
    'discount',
    'total',
    'status',

    // PAYMENT
    'payment_method',
    'payment_status',
    'payment_proof',

    // SHIPPING
    'shipping_status',
    'tracking_number',
    'courier'
];

    /*
    |--------------------------------------------------------------------------
    | RELASI USER
    |--------------------------------------------------------------------------
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI ORDER ITEMS
    |--------------------------------------------------------------------------
    */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}