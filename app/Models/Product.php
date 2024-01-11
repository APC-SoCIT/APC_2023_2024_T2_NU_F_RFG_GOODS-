<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'sku',
        'name',
        'price',
        'category_id',
        'desc',
        'min_quantity',
        'max_quantity',
        'reorder_quantity',
        'created_at',
        'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}
