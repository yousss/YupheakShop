<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_model extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['parent_id', 'name', 'description', 'url', 'status'];

    public function children()
    {
        return $this->hasMany('App\Category_model', 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Products_model::class, 'categories_id');
    }
}
