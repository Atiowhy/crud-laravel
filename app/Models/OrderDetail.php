<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'id_order',
        'qty',
        'id_service',
        'price_service',
        'subtotal',
    ];
    protected $table = 'orders_detail';

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order', 'id');
    }

    public function paket()
    {
        return $this->belongsTo(Type_of_service::class, 'id_service', 'id');
    }
}
