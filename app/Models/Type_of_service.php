<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type_of_service extends Model
{
    protected $fillable = [
        "service_name",
        "price",
        "description",
    ];
}
