<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart_model extends Model
{
    protected $table = 'carts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'products_id', 'product_name',
        'product_code', 'product_color', 'size', 'price', 'quantity',
        'user_email', 'session_id', 'product_attribute_id'
    ];

    public function product()
    {
        return $this->belongsTo(Products_model::class, 'products_id', 'id');
    }

    public function productAttribute()
    {
        return $this->belongsTo(ProductAtrr_model::class, 'product_attribute_id', 'id');
    }
}
