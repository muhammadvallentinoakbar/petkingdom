<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    'name',
    'slug',
    'sku',
    'price',
    'stock',
    'description',
    'thumbnail',
    'category_id',
    'brand_id',
    'supplier_id',
    'weight',
    'sold',
];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function wishlists()
{
    return $this->hasMany(Wishlist::class);
}
}