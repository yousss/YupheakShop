<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    protected $table = 'delivery_address';
    protected $primaryKey = 'id';
    //
    protected $guarded = [];
}
