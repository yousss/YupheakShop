<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageGallery_model extends Model
{
    protected $table = 'tblgallery';
    protected $primaryKey = 'id';
    protected $fillable = ['products_id', 'image'];

    public function product()
    {
        return $this->belongsTo(Products_model::class, "products_id", 'id');
    }
}
