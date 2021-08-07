<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products_model extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'categories_id',
        'age', 'tax_included', 'made_in',
        'is_new', 'p_name', 'p_code',
        'p_color', 'description',
        'price', 'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category_model::class, 'categories_id', 'id')->where('status', 1);
    }

    public function images()
    {
        return $this->hasMany(ImageGallery_model::class, 'products_id', 'id');
    }

    public function productAttributes()
    {
        return $this->hasMany(ProductAtrr_model::class, 'products_id', 'id');
    }
}
