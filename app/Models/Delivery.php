<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'phone_number',
        'region',
        'state/province',
        'city/municipality',
        'barangay',
        'addressline',
        'address_lat',
        'address_long',
        'priority',
        'eta',
        'shipping_service',
        'shipping_reference_id',
    ];  

}
