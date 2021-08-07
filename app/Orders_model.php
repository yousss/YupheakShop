<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Orders_model extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'users_id',
        'users_email',
        'shipping_charges',
        'coupon_code',
        'coupon_amount',
        'order_status',
        'payment_method',
        'grand_total',
        'total_qty',
        'shipping_address_id'
    ];

    public function orderedItemsDetail()
    {
        return $this->hasMany(OrderedItemDetail::class, 'orders_id', 'id');
    }


    public function shippingAddress()
    {
        return $this->belongsTo(DeliveryAddress::class, 'shipping_address_id', 'id');
    }
}
