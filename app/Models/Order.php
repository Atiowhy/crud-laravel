<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        "total_price",
        "id_customer",
        "order_code",
        "order_date",
        "order_end_date",
        "order_status",
    ];

    // ORM Object Relational Mapping
    // ONE TO MANY, MANY TO ONE, MANY TO MANY

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'id_customer', 'id');
    }
}
