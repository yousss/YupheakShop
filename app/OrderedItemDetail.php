<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderedItemDetail extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Products_model::class, 'products_id', 'id');
    }
}
