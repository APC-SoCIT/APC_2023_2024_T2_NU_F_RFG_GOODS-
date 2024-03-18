<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryUpdate extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'title',
        'description',
        'created_at',
        'updated_at',
    ];

}
