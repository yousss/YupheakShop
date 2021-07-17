<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAtrr_model extends Model
{
    protected $table = 'product_att';
    protected $primaryKey = 'id';
    protected $fillable = ['products_id', 'sku', 'size', 'price', 'stock'];

    public function product()
    {
        return $this->belongsTo(Products_model::class, "products_id", 'id');
    }
}
