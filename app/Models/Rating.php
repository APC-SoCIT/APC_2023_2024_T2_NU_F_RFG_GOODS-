<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'account_id',
        'rating_score',
        'rating_comment',
        'created_at',
        'updated_at',
    ];
    
}
