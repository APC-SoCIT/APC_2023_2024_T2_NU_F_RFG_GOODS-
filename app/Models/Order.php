<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'sku',
        'name',
        'price',
        'category_id',
        'desc',
        'min_qty',
        'max_qty',
        'reorder_pt',
        'created_at',
        'updated_at',
    ];  
    
}
